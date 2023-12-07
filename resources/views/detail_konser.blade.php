@extends('layout.master')

@section('title', 'detail-konser')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/detail_konser.css') }}">
    <script src="{{ asset('storage/js/detail.js') }}"></script>
    <script src="https://kit.fontawesome.com/95b8fa2528.js" crossorigin="anonymous"></script>

    <div class="mx-5">
        <div class="alert notif-lebihdarimax alert-danger w-25" role="alert"></div>
        <div class="alert notif-gblhZero alert-danger w-25" role="alert">
            <span class="fa fa-exclamation-circle me-3"></span>Anda harus membeli setidaknya satu tiket.
        </div>

        <div class = "d-flex flex-row fs-6  ">
            <a href="/" class="text-decoration-none text-primary">
                <pre>Home</pre>
            </a>
            <pre>  >  </pre>
            <a href="/" class="text-decoration-none text-primary">
                <pre>Konser</pre>
            </a>
            <pre>  •  </pre>
            <a href="/" class="text-decoration-none text-primary">
                <pre>Musik</pre>
            </a>
            <pre>  >  </pre>
            <a href="/" class="text-decoration-none text-dark">
                <pre>{{ $selectedConcert->nama_konser }}</pre>
            </a>
        </div>

        <div class = "d-flex flex-row top-section">
            <div class="width-left">
                <img src="{{ asset('storage/image/home/Event/' . $selectedConcert->gambar) }}" alt=""
                    class=" rounded-3 img-fluid w-100 mb-5">
                <div class="fonttext">
                    Mark Your Calendar: {{ date('d F Y', strtotime($selectedConcert->tanggal)) }}
                </div>
                <div class="fonttext">
                    Location: {{ $selectedConcert->tempat }}
                </div>
            </div>
            <div class="width-right">
                <div class="top-card-right ms-5 shadow p-4 bg-white rounded-4 d-flex flex-column">
                    <div class="d-flex flex-column align-self-start">
                        <div class="fs-5 fw-bold mb-3">{{ $selectedConcert->nama_konser }}</div>
                        <div class="d-flex flex-row align-items-center mb-2 mt-3">
                            <i class="fa-solid fa-calendar-days me-2" style="color: #9477e1;"></i>
                            <div class="fs-6">{{ date('d F Y', strtotime($selectedConcert->tanggal)) }}</div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-2">
                            <i class="fa-solid fa-clock me-2" style="color: #9477e1; font-size:14px;"></i>
                            <div class="fs-6">
                                {{ \Carbon\Carbon::parse($selectedConcert->waktu_start)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($selectedConcert->waktu_end)->format('H:i') }}
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <i class="fa-solid fa-location-dot me-2 pe-1" style="color: #9477e1;"></i>
                            <div class="fs-6">{{ $selectedConcert->tempat }}</div>
                        </div>
                    </div>
                    <div class="mt-auto companyShow">
                        <div class="d-flex pt-2">
                            <div class="image-section me-3 overflow-hidden"
                                style="width: 48px; height: 48px; border-radius: 50%;">
                                <img src="{{ $selectedCompanyData['logo'] }}" alt="" width="100%" height="100%"
                                    style="object-fit: cover;">
                            </div>
                            <div class="content-section">
                                <div class="text-gray-3 fs-label">
                                    Diselenggarakan oleh
                                </div>
                                <a href="#" class="text-decoration-none text-gray-4 fw-semibold fs-6">
                                    {{ Str::limit($selectedCompanyData['nama'], 15, '...') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('transactions.store') }}" method="post" onsubmit="return validateForm()">
            @csrf
            @foreach ($selectedConcert->tickets as $ticket)
                <input type="hidden" name="selected_tickets[{{ $ticket->id }}]" value="0">
            @endforeach
            <input type="hidden" id="total_quantity" value="0">
            <input type="hidden" name="total_amount" id="total_amount" value="0">
            <div class="d-flex flex-row mb-5 form-section">
                <div class="width-left">
                    <div class="position-sticky top-0 w-100 bg-white pt-2 pb-1 z-1" id="stickyContainer">
                        <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">
                            Deskripsi
                        </p>
                    </div>
                    <div class="my-2">
                        {{ $selectedConcert->desc }}
                    </div>
                    <div class="position-sticky top-0 w-100 bg-white pt-2 pb-1 z-2" id="stickyContainer">
                        <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">
                            Syarat & Ketentuan
                        </p>
                    </div>
                    <div class="my-2">
                        <p class="fonttitle fw-bold">
                            Penukaran Tiket Lokasi & Waktu Penukaran {{ date('d F Y', strtotime($selectedConcert->tanggal)) }}
                            di {{ $selectedConcert->tempat }}.
                        </p>

                        <div class="fonttitle fw-bold">
                            Cara Penukaran E-Voucher
                        </div>
                        <div class="fonttext mb-4">
                            - Tunjukkan e-tiket yang telah diterima melalui email dari loket.com kepada petugas di lapangan
                            untuk scan QR Code. Sesuaikan tingkat kecerahan layar ponsel sebelum menunjukkan QR Code.
                            <br>
                            - Setelah QR Code sukses terverifikasi, customer akan mendapatkan wristband yang dapat digunakan
                            untuk memasuki venue.
                            <br>
                            - Customer disarankan mematuhi seluruh protokol kesehatan selama event berlangsung.
                        </div>

                        <div class="fonttitle fw-bold">
                            Syarat & Ketentuan Umum
                        </div>
                        <div class="fonttext mb-4">
                            - Harga sudah termasuk pajak & admin fee.
                            <br>
                            - Tiket yang sudah dibeli tidak dapat dikembalikan.
                            <br>
                            - Tiket yang sudah dibeli tidak dapat diganti jadwalnya
                            <br>
                            - Pembeli wajib mengisi data diri pribadi saat memesan.
                            <br>
                            - Penjualan tiket sewaktu-waktu dapat dihentikan atau dimulai sesuai dengan kebijakan dari promotor
                            <br>
                            - Pengunjung wajib menjaga protokol kesehatan yang berlaku.
                            <br>
                            - Dilarang membawa senjata tajam dan senjata api
                        </div>

                        <div class="fonttitle fw-bold">
                            E-tiket
                        </div>
                        <div class="fonttext">
                            - E-tiket tidak dapat diuangkan.
                        </div>
                    </div>

                    <div class="position-sticky top-0 w-100 bg-white pt-2 z-3">
                        <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">TIKET</p>
                    </div>
                    <div class="ticketList">
                        @foreach ($selectedConcert->tickets as $ticket)
                            @php
                                $ticketStatus = $ticket->tanggal_selesai_penjualan < now() || $ticket->jumlah_tersedia === 0 ? 'ticket-details-disable' : 'ticket-details';
                            @endphp
                            <div class="{{ $ticketStatus }} py-3 px-4 mb-4 rounded-3 position-relative">
                                <div class="ticket-info">
                                    <div class="title fonttitle">{{ $ticket->kategori }}</div>
                                    <div class="description my-2 text-gray-4">Sudah Termasuk Pajak dan Adm</div>
                                    <div class="date-time d-flex align-items-center mb-2">
                                        <i class="fa-solid fa-clock" style="color: #9477e1; font-size: 14px;"></i>
                                        <div class="text-primary ms-2">Berakhir
                                            {{ date('d F Y', strtotime($ticket->tanggal_selesai_penjualan)) }} • 23:00 WIB
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-price d-flex flex-row justify-content-between pt-3">
                                    <p class="fw-bold title">Rp {{ number_format($ticket->harga, 0, ',', '.') }}</p>
                                    <div class="buy-controller-container" id-ticket="{{ $ticket->id }}"
                                        data-ticket="{{ json_encode($ticket) }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="width-right">
                    <div class="d-flex ms-5 flex-column align-self-start sticky-top" style="top: 50px;">
                        <div class = "shadow p-3 bg-white rounded-4">
                            <div class="cart-now" id="cartNowContainer" cheapest-price="{{ $cheapest = $selectedConcert->tickets->pluck('cheapestTicketPrice')->first() }}">
                                {{-- Ini di JS. --}}
                            </div>
                            <button type="submit" class="btn btn-primary w-100 spaced-button mb-2">Beli Tiket</button>
                        </div>
                        <div class="mt-4 fs-6 ">
                            Bagikan Event
                        </div>
                        <div class="d-flex flex-row mt-3 mb-5">
                            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                                <div class="me-4 icon">
                                    <i class="fa-brands fa-facebook-f iconsize text-black"></i>
                                </div>
                            </a>
                            <a href="https://twitter.com/x" target="_blank" rel="noopener noreferrer">
                                <div class="me-4 icon">
                                    <i class="fa-brands fa-x-twitter iconsize text-black"></i>
                                </div>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                                <div class="me-4 icon">
                                    <i class="fa-brands fa-instagram iconsize text-black"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
