<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Transaction;
use App\Models\UserProfile;
use Carbon\Carbon;
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
        $transactions = Transaction::where('user_id', $userId)->get();
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
                            ($tanggalTransaksi <= $today->toDateString() && $waktuTransaksi < $today->toTimeString())
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

    // Ini nanti buat view athe punya.
    public function confrimTransaction(Request $request)
    {
        dd($request->all());
    }

    // Menampilkan data transkasi -> done
    public function index()
    {
        $userId = Auth::id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        return view('transaction.transaction_history', compact('userProfile'));
    }

    // Menampilkan detail transaksinya. -> ini kek invoice gt
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

    // Menampilkan formulir pembuatan transaksi baru -> ini gak perlu
    public function create()
    {
        return view('transactions.create');
    }

    // Nanti buat Menyimpan transaksi baru ke dalam database
    public function store(Request $request)
    {
        dd($request->all());
        // Validasi input dari formulir
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Membuat transaksi baru
        Transaction::create([
            'amount' => $request->amount,
            'description' => $request->description,
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function debug(){
        $userId = Auth::id();
        $transactions = Transaction::where('user_id', $userId)->get();
        $dataKonserLalu = [];
        $dataKonserAktif = [];
        $today = now()->setTimezone('Asia/Jakarta');

        foreach ($transactions as $transaction) {
            $tanggalTransaksi = $transaction->tanggal;
            $waktuTransaksi = $transaction->waktu;
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
                            ($tanggalTransaksi <= $today->toDateString() && $waktuTransaksi < $today->toTimeString())
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
    }
}
