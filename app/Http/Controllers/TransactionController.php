<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Transaction;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function getEventData(Request $request)
    {
        $userId = Auth::id();
        $transactions = Transaction::where('user_id', $userId)->get();
        $dataKonserLalu = [];
        $dataKonserAktif = [];
        $today = now();

        foreach ($transactions as $transaction) {
            $firstTicket = $transaction->tickets->first();

            if ($firstTicket) {
                $ticketId = $firstTicket->id;

                $concert = Concert::whereHas('tickets', function ($query) use ($ticketId) {
                    $query->where('id', $ticketId);
                })->first();

                if ($concert) {
                    $tanggalKonser = $concert->tanggal;

                    // Bandingkan dengan tanggal saat ini
                    if ($tanggalKonser < $today) {
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

    // Menampilkan data transkasi
    public function index()
    {
        $userId = Auth::id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        return view('transaction.transaction_history', compact('userProfile'));
    }

    // Menampilkan detail transaksinya.
    public function show(Request $request)
    {
        dd($request->all());
        return view('transaction.index');
        // return view('transactions.show', ['transaction' => $transaction]);
    }

    // Menampilkan formulir untuk mengonfirmasi pembayaran
    public function confirmPayment($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.confirm-payment', ['transaction' => $transaction]);
    }

    // Menyimpan konfirmasi pembayaran ke dalam database
    public function storePaymentConfirmation(Request $request, $id)
    {
        // Logika untuk menyimpan konfirmasi pembayaran
        // ...

        return redirect()->route('transactions.show', $id)->with('success', 'Konfirmasi pembayaran berhasil!');
    }

    // Menampilkan formulir pembuatan transaksi baru -> ini gak perlu
    public function create()
    {
        return view('transactions.create');
    }

    // Menyimpan transaksi baru ke dalam database
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
}
