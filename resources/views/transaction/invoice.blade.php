@extends('layout.master-dashboard')

@section('title', 'Tiket Saya')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">

    <div class="page-layout on-detail container pb-5    ">
        <div class="invoice-to-list d-inline-block">
            <a href="{{ route('transactions.index') }}"
                class="router-link-active d-flex align-items-center text-decoration-none text-primary">
                <i class="fa-solid fa-arrow-left me-3"></i>
                Kembali
            </a>
        </div>
        <div class="invoice-container d-grid gap-4">
            <div class="invoice-payment bg-white rounded-4 d-grid">
                <div class="invoice-payment-success p-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="payment-success-figure rounded-3">
                        @php
                            $randomImageNumber = rand(1, 6);
                            $randomImage = 'yay' . $randomImageNumber . '.jpg';
                        @endphp
                        <img class="w-100  h-100 object-fit-cover rounded-3"
                            src="{{ asset('storage/image/yay/'.$randomImage) }}" alt="Terimakasih">
                    </div>
                    <label class="payment-success-label fw-semibold mt-2">Terima kasih atas pesananmu</label>
                </div>
                <div class="invoice-payment-description p-4 position-relative">
                    <div class="invoice-success-cta rounded-3 p-3">
                        <div class="success-cta-desc fs-7">
                            Klik tombol dibawah untuk langsung <br> mencetak e-voucher.
                        </div>
                        <div class="success-cta-link mt-3 d-grid gap-2">
                            <button class="btn btn-primary fs-6 fw-medium">
                                <span> Lihat E-Voucher </span>
                            </button>
                        </div>
                    </div>
                    <div class="invoice-payment-shares rounded-2 p-3 mt-3">
                        <div class="shares-header fw-semibold">
                            Bagikan Event
                        </div>
                        <div class="shares-info mt-2 text-gray-4">
                            Yuk ajak teman-temanmu dengan membagikan event ini di media sosialmu.
                        </div>
                        <div class="shares-social d-flex mt-3">
                            <a href="https://www.facebook.com" target="_blank" class="shares-social-item facebook">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank" class="shares-social-item twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="https://web.whatsapp.com" target="_blank" class="shares-social-item whatsapp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" class="shares-social-item">
                                <i class="fa-solid fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-summary rounded-4">
                <div class="invoice-summary-header p-3 d-flex align-items-center justify-content-between">
                    <div class="invoice-code">
                        Kode Pesanan: <span class="fw-medium">{{ $transaction->id }}</span>
                    </div>
                    <div class="invoice-expired-date text-gray-3">
                        {{ \Carbon\Carbon::parse($transaction->tanggal . ' ' . $transaction->waktu)->format('d M Y H:i') }}
                    </div>
                </div>
                <div class="invoice-summary-content p-4">
                    <div class="event-detail">
                        <div class="event-detail-banner position-relative mb-0">
                            <div class="event-banner-thumbnail d-block">
                                <img class="w-100 h-100 object-fit-cover"
                                    src="{{ asset('storage/image/home/Event/'.$concert->gambar) }}"
                                    alt="{{ $concert->nama_konser }}">
                            </div>
                        </div>
                        <div class="event-detail-info">
                            <div class="event-description d-flex flex-column justify-content-center">
                                <div class="event-header">
                                    {{ $concert->nama_konser }}
                                </div>
                                <div class="event-info">
                                    <div class="event-date">
                                        <i class="text-gray-3 fa-regular fa-calendar"></i>
                                        <label> {{ \Carbon\Carbon::parse($concert->tanggal)->format('d M Y') }}</label>
                                    </div>
                                    <div class="event-time">
                                        <i class="text-gray-3 fa-regular fa-clock"></i>
                                        <label> {{ \Carbon\Carbon::parse($concert->waktu_start)->format('H:i').' - '.  \Carbon\Carbon::parse($concert->waktu_end)->format('H:i')}} </label>
                                    </div>
                                    <div class="event-venue">
                                        <i class="text-gray-3 fa-solid fa-location-dot"></i>
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
                            @foreach ($transaction->tickets as $ticket)
                                <div class="ticket-item">
                                    <div class="ticket-item-desc text-gray-3">
                                        <label>{{ $ticket->kategori }}</label> <span>{{ $ticket->pivot->jumlah_ticket }} Tiket</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ticket-booker">
                        <div class="ticket-booker-name text-black mb-1 fw-normal text-capitalize">
                            {{ $transaction->nama_lengkap }}
                        </div>
                        <div class="ticket-booker-email text-gray-4">
                            {{ $transaction->email }}
                        </div>
                        <div class="ticket-booker-phone text-gray-4">
                            {{ $transaction->no_telp }}
                        </div>
                    </div>
                    <div class="schedule-info">
                        <div class="schedule-header">
                            Info Jadwal &amp; Lokasi
                        </div>
                        <div class="schedule-list">
                            <div class="schedule-item">
                                <div class="schedule-item-schedule text-gray-4">
                                    <div class="item">
                                        <i class="fa-regular me-1 fa-calendar"></i>
                                        <label> {{ \Carbon\Carbon::parse($concert->tanggal)->format('d M Y') }}</label>
                                    </div>
                                    <div class="item">
                                        <i class="fa-regular me-1 fa-clock"></i>
                                        <label> {{ \Carbon\Carbon::parse($concert->waktu_start)->format('H:i').' - '.  \Carbon\Carbon::parse($concert->waktu_end)->format('H:i')}} </label>
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid me-2 fa-location-dot"></i>
                                        {{ $concert->tempat }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-detail">
                        <div class="order-header">
                            Detail Pembayaran
                        </div>
                        <div class="order-list">
                            <div class="order-item">
                                <div class="order-item-desc">
                                    <label>Kode Pesanan</label>
                                    <span>{{ $transaction->id }}</span>
                                </div>
                                <div class="order-item-desc">
                                    <label>Metode Pembayaran</label>
                                    <span>{{ $transaction->metode_pembayaran }}</span>
                                </div>
                                <div class="divider divider-dashed"></div>
                                <div class="order-item-desc">
                                    <label>Total Harga Tiket</label>
                                    <span>Rp {{ number_format($transaction->total_harga_detail, 0, ',', '.') }}</span>
                                </div>
                                <div class="divider divider-dashed"></div>
                                <div class="order-item-desc payment-total">
                                    <label>Total Bayar</label>
                                    <span>Rp {{ number_format($transaction->total_harga_detail, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
