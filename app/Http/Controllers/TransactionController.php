<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionCreateRequest;
use App\Models\Concert;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\UserProfile;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    // fuction buat pull data di fetch. -> done
    public function getEventData(Request $request)
    {
        $userId = Auth::id();
        // Ini agar pas ditampilih itu dari yg terkahir transaksi.
        $transactions = Transaction::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->orderBy('waktu', 'desc')
            ->get();

        $dataKonserLalu = [];
        $dataKonserAktif = [];
        $today = now()->setTimezone('Asia/Jakarta');

        foreach ($transactions as $transaction) {
            $tanggalTransaksi = $transaction->tanggal;
            $waktuTransaksi =$transaction->waktu;
            $firstTicket = $transaction->tickets->first();

            if ($firstTicket) {
                $ticketId = $firstTicket->id;

                $concert = Concert::whereHas('tickets', function ($query) use ($ticketId) {
                    $query->where('id', $ticketId);
                })->first();

                $tanggalKonser = $concert->tanggal;

                if ($concert) {
                    // Bandingkan dengan tanggal saat ini
                    if ($tanggalKonser < $today) {
                        // ini logic jadi kalau yg lalu g da yg pending, otomatis failed
                        if (
                            $transaction->status_pembayaran === 'Pending') {
                            $transaction->status_pembayaran = 'Failed';
                            $transaction->save();
                        }
                        // Konser sudah lalu
                        $dataKonserLalu[] = [
                            'transaction_id' => $transaction->id,
                            'concert_name' => $concert->nama_konser,
                            'concert_gambar' => $concert->gambar,
                            'tanggal_konser' => $tanggalKonser,
                            'total_tiket' => $transaction->total_ticket,
                            'tanggal_transaction' => $transaction->tanggal,
                            'status_pembayaran' => $transaction->status_pembayaran,
                        ];
                    } else {
                        // Logic buat update status pembayarannya
                        if (
                            $transaction->status_pembayaran === 'Pending' &&
                            ($tanggalTransaksi . ' ' . $waktuTransaksi <= $today->toDateTimeString())
                        ) {
                            $transaction->status_pembayaran = 'Failed';
                            $transaction->save();
                        }
                        // Konser masih aktif
                        $dataKonserAktif[] = [
                            'transaction_id' => $transaction->id,
                            'concert_name' => $concert->nama_konser,
                            'concert_gambar' => $concert->gambar,
                            'tanggal_konser' => $tanggalKonser,
                            'total_tiket' => $transaction->total_ticket,
                            'tanggal_transaction' => $transaction->tanggal,
                            'status_pembayaran' => $transaction->status_pembayaran,
                        ];
                    }
                }
            }
        }

        $event = $request->input('event');

        if ($event === 'lalu') {
            $data = $dataKonserLalu;
        } elseif ($event === 'aktif') {
            $data = $dataKonserAktif;
        } else {
            $data = []; // Atur nilai default jika diperlukan
        }

        return response()->json(['data' => $data]);
    }

    // store new transaction.
    public function storeHalf(Request $request)
    {
        $userId = Auth::id();

        $totalQuantity = 0;
        foreach ($request->input('selected_tickets') as $ticketId => $quantity) {
            $totalQuantity += $quantity;
        }

        $transaction = Transaction::create([
            'user_id' => $userId,
            'total_ticket' => $totalQuantity,
            'total_harga_detail' => $request->total_amount,
        ]);

        foreach($request->input('selected_tickets') as $ticketId => $quantity){
            // cek yg quantitynya lbh dari 1
            if($quantity > 0){
                $ticket = Ticket::findOrFail($ticketId);
                $transaction->tickets()->attach($ticketId, [
                    'jumlah_ticket' => $quantity,
                    'jumlah_harga_detail' => $quantity * $ticket->harga,
                ]);
            }
        }

        // {{ route('transactions.store', ['id' => $selectedConcert->id]) }}
        return redirect()->route('transactions.confirm', ['id' => $transaction->id]);
    }

    // show confirm transaction
    public function getConfirmTransaction($id){
        $userId = Auth::id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        $transaction = Transaction::with('tickets')->findOrFail($id);
        if ($transaction->user_id !== $userId || $transaction->status_pembayaran !== null) {
            abort(404);
        }
        $selectedConcert = $transaction->tickets->first()->concert;
        return view('transaction.confirm_transaction', compact('userProfile', 'selectedConcert','transaction'));
    }

    // Ini buat update dari yg storeHalf.
    public function storeFull(TransactionCreateRequest $request, $id){
        $nowJakarta = Carbon::now('Asia/Jakarta');

        $transaction = Transaction::findOrFail($id);
        // Update transaction
        $transaction->update([
            'tanggal' => $nowJakarta->toDateString(),
            'waktu' => $nowJakarta->addMinutes(30)->toTimeString(),
            'nama_lengkap' => $request->nama_lengkap,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'nomor_ktp' => $request->nomor_ktp,
            'metode_pembayaran' => $request->payment_method,
            'status_pembayaran' => 'Pending',
        ]);

        $payment = new Payment([
            'metode_pembayaran' => $request->payment_method
        ]);

        $transaction->payment()->save($payment);

        return redirect()->route('transactions.confirm-payment', ['id' => $id]);
    }

    // Menampilkan semua data transkasi -> done
    public function index()
    {
        $userId = Auth::id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        Transaction::whereNull('status_pembayaran')->delete();

        return view('transaction.transaction_history', compact('userProfile'));
    }

    // Menampilkan detail transaksinya. -> ini kek invoice gt hanya bs digunakan oleh yg paymentnya success -> done
    public function show($id)
    {
        $userId = Auth::id();
        $userProfile = UserProfile::where('user_id', $userId)->first();

        try {
            $transaction = Transaction::where('id', $id)
                ->where('user_id', $userId)
                ->first();

            $firstTicket = $transaction->tickets->first();
            $concert_id = $firstTicket->concert_id;
            $concert = Concert::findOrFail($concert_id);

            if ($transaction && $transaction->status_pembayaran === 'Success') {
                return view('transaction.invoice', compact('userProfile', 'transaction', 'concert'));
            } else {
                return redirect()->route('transactions.index');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('transactions.index');
        }
    }

    // Menampilkan formulir untuk mengonfirmasi pembayaran -> done
    public function confirmPayment($id)
    {
        $userId = Auth::id();
        // Ambil transaction yg punya user id ini
        $userProfile = UserProfile::where('user_id', $userId)->first();
        $transaction = Transaction::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $firstTicket = $transaction->tickets->first();
        $concert_id = $firstTicket->concert_id;
        $concert = Concert::findOrFail($concert_id);

        if ($transaction->status_pembayaran === 'Pending') {
            return view('transaction.confirm-payment', compact('userProfile', 'transaction', 'concert'));
        } else {
            abort(404);
        }
    }

    // Menyimpan konfirmasi pembayaran ke dalam database, Jadi dari yang halaman confirmPayment kl tombol dipencet itu kesini -> done
    public function storePaymentConfirmation($id)
    {
        $today = now()->setTimezone('Asia/Jakarta');
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->route('transactions.confirm-payment', $id)->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaction->update(['status_pembayaran' => 'Success', 'tanggal' => $today->toDateString(), 'waktu' => $today->toTimeString()]);
        Session::flash('success', 'Yay, Konfirmasi pembayaran berhasil!');
        return redirect()->route('transactions.index');
    }

    public function debug(){
    }
}
