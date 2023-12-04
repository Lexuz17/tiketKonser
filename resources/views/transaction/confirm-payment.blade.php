@extends('layout.master')

@section('title', 'confirm-payment')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/confirm-payment.css') }}">

    <div class="page-layout on-detail container">
        <div class="invoice-to-list d-inline-block">
            <a href="{{ route("transactions.index") }}" class="router-link-active d-flex align-items-center text-decoration-none">
                <i class="fa-solid fa-arrow-left me-3"></i>
                Kembali
            </a>
        </div>
        <div class="invoice-container">
            <div class="invoice-payment">
                <div class="invoice-payment-timer">
                    <div class="countdown">
                        <div class="countdown-wrapper">
                            <div class="countdown-title">
                                Sisa Waktu Pembayaran
                            </div>
                            <div class="countdown-timer" id="countdown-container" data-target-time="{{ $transaction->tanggal.'T'.$transaction->waktu }}">
                                <div class="countdown-timer-section">
                                    <span id="hour" class="section-time"></span>
                                    <span class="section-label">jam</span>
                                </div>
                                <div class="countdown-timer-section">
                                    <span id="minute" class="section-time"></span>
                                    <span class="section-label">menit</span>
                                </div>
                                <div class="countdown-timer-section">
                                    <span id="second" class="section-time"></span>
                                    <span class="section-label">detik</span>
                                </div>
                            </div>
                            <div class="notif-batal" id="batal">

                            </div>
                            <div class="countdown-label">
                                Selesaikan pembayaranmu sebelum
                                <strong class="due-date">
                                    {{ \Carbon\Carbon::parse($transaction->tanggal . ' ' . $transaction->waktu)->format('d M Y H:i') }}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-payment-description">
                    <div class="invoice-payment-detail">
                        <div class="invoice-payment-item payment-method">
                            <div class="invoice-payment-icon">
                                <i class="ai ai-wallet"></i>
                            </div>
                            <div class="invoice-payment-value">
                                <i class="fa-solid fa-wallet fs-5 me-2 text-dark"></i>
                                {{ $transaction->metode_pembayaran }}
                            </div>
                        </div>
                        <div class="invoice-payment-item">
                            <div class="invoice-payment-label">
                                Kode Pesanan
                            </div>
                            <div class="invoice-payment-value">
                                {{ $transaction->id }}
                            </div>
                        </div>
                        <div class="invoice-payment-item">
                            <div class="invoice-payment-label">
                                No. Virtual Account
                            </div>
                            <div class="invoice-payment-value virtual-account d-flex justify-content-between">
                                <span>4485824511603</span>
                                <i class="fa-regular fa-copy text-gray-3 fs-5"></i>
                            </div>
                        </div>
                        <div class="invoice-payment-item">
                            <div class="invoice-payment-label">
                                Total Pembayaran
                            </div>
                            <div class="invoice-payment-value amount">
                                Rp {{ number_format($transaction->total_harga_detail, 0, ',', '.') }}
                                <i class="ai ai-expand-more"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary" id="sudahBayarBtn">
                            Sudah Bayar
                        </button>
                    </div> <!---->
                </div>
            </div>
            <div class="invoice-summary">
                <div class="invoice-summary-header">
                    <div class="invoice-code">
                        Kode Pesanan:
                        <span>{{ $transaction->id }}</span>
                    </div>
                    <div class="invoice-expired-date">
                        {{ \Carbon\Carbon::parse($transaction->tanggal . ' ' . $transaction->waktu)->format('d M Y H:i') }}
                    </div>
                </div>
                <div class="invoice-summary-content">
                    <div class="event-detail">
                        <div class="event-detail-banner">
                            <div class="event-banner-thumbnail">
                                <img src="{{ asset('storage/image/home/Event/'.$concert->gambar) }}" alt="{{ $concert->nama_konser }}">
                            </div>
                        </div>
                        <div class="event-detail-info">
                            <div class="event-description">
                                <div class="event-header">
                                    {{ $concert->nama_konser}}
                                </div>
                                <div class="event-info">
                                    <div class="event-date">
                                        <i class="text-gray-3 fa-regular fa-calendar me-1"></i>
                                        <label> {{ \Carbon\Carbon::parse($concert->tanggal)->format('d M Y') }} </label>
                                    </div>
                                    <div class="event-time">
                                        <i class="text-gray-3 fa-regular fa-clock me-1 "></i>
                                        <label> {{ $concert->waktu_start }} - {{ $concert->waktu_end }} </label>
                                    </div>
                                    <div class="event-venue">
                                        <i class="text-gray-3 fa-solid fa-location-dot me-2"></i>
                                        <label> {{ $concert->tempat }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ticket-reserved">
                        <div class="ticket-header">
                            Jenis Tiket
                        </div>
                        <div class="ticket-list">
                            <div class="ticket-item">
                                @foreach ($transaction->tickets as $ticket)
                                    <div class="ticket-item-desc">
                                        <label>{{ $ticket->kategori }}</label>
                                        <span class="text-gray-3">{{ $ticket->pivot->jumlah_ticket }} Tiket</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="ticket-booker">
                        <div class="ticket-booker-name">
                            {{ $transaction->nama_lengkap }}
                        </div>
                        <div class="ticket-booker-email">
                            {{ $transaction->email }}
                        </div>
                        <div class="ticket-booker-phone">
                            {{ $transaction->no_telp }}
                        </div>
                    </div>
                    <div class="payment-guide">
                        <div class="payment-guide-header">
                            Petunjuk Pembayaran
                        </div>
                        <div class="payment-guide-content">
                            <ol class="guide- text-gray-4">
                                <li>Catat nomor Virtual Account yang Anda dapat.</li>
                                <li>Gunakan channel <b>BCA</b> untuk menyelesaikan pembayaran.</li>
                                <li>Masukkan <b>PIN Anda.</b></li>
                                <li>Pilih <b>Transfer ke BCA Virtual Account.</b></li>
                                <li>Masukkan nomor Virtual Account yang Anda dapat sebelumnya.</li>
                                <li>Pastikan detail pembayaran Anda benar &amp; masukkan item pembayaran
                                    yang akan dibayar.</li>
                                <li>Pembayaran Anda dengan BCA VA selesai.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('storage/js/confirm-payment.js') }}"></script>
@endsection
