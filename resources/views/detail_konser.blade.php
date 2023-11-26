@extends("layout.master")

@section('title', 'detail-konser')

@section("content")

<link rel="stylesheet" href="{{ asset('css/detail_konser.css') }}">

<div class="mx-5">
    <div class = "d-flex flex-row fs-6  ">
        <a href="/" class="text-decoration-none text-primary"><pre>Home</pre></a>
        <pre>  >  </pre>
        <a href="/" class="text-decoration-none text-primary"><pre>Konser</pre></a>
        <pre>  •  </pre>
        <a href="/" class="text-decoration-none text-primary"><pre>Musik</pre></a>
        <pre>  >  </pre>
        <a href="/" class="text-decoration-none text-dark"><pre>STEVE AOKI'S CAKE PARTY</pre></a>
    </div>


    <div class = "d-flex flex-row mb-5">
        <div class="w-75" >
            <img src="{{ asset('storage/image/home/banner3.jpg') }}" alt="" class=" rounded-1 img-fluid">
        </div>
        <div class = "d-flex flex-column ms-5 shadow p-3 bg-white rounded-4 align-self-start w-25">
            <p class="fs-5 fw-bold">STEVE AOKI'S CAKE PARTY</p>
            <p class="fs-6">10 Dec 2023</p>
            <p class="fs-6">17:00 - 23:00 WIB</p>
            <p class="fs-6">Phantom, PIK 2, Banten</p>
        </div>
    </div>

    <div class = "d-flex flex-row ">
        <div class=" w-75" >
            <div>
                <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">DESKRIPSI</p>
            </div>
            <p class=" fonttitle fw-bold ">
                Get ready to elevate your party experience to a whole new level at "Steve Aoki's Cake Party" – the ultimate celebration of music, sweets, and unforgettable moments, starring none other than the legendary DJ Steve Aoki!  
            </p>
            <p>
                <div class="fonttext">
                    Mark Your Calendar: Sunday, December 10, 2023
                </div>
                <div class="fonttext">
                    Location: PHANTOM - PIK 2
                </div>
            </p>
            <p class="fonttext">
                Prepare for an unforgettable night as we transform PHANTOM - PIK 2 into a realm of Music enchantment! This is not just any event, it's a journey that will leave you craving for more.
            </p>
            <p class="fonttext">
                Our Headliner, the iconic DJ Steve Aoki, renowned for his electrifying performances and infectious music that will have you dancing all night long (Top hits: Munecas, Pursuit of Happiness, Mic Drop, Boneless)
            </p>
            <p class="fonttext">
                But that's not all! Joining the musical extravaganza are Indonesia's finest talents:
            </p>
            <p class="fonttext">
                • Dewa 19 feat. Virzha - Will grace the stage with their timeless hits, creating an atmosphere of pure nostalgia and     musical bliss. (Top Hits: Separuh Nafas, Pupus, Kangen, Arjuna)
            </p>
            <p class="fonttext">
                • Dipha Barus - Get ready to groove to his captivating tunes that will keep the dance floor alive and kicking. (Top Hits: All Good, No One Can Stop Us)
            </p>
            <p class="fonttext">
                • Vernons x Roy - Our resident DJ at PHANTOM, will turn up the heat till the last sweat!
            </p>
            <p class="fonttext">
                • Ungu Band - From 'Melayang' to 'Demi Waktu,' Ungu Band's hits have stood the test of time. Join the journey of a      band that has etched its name in Indonesian music history
            </p>
            <p class="fonttext">
                • Icha Yang - She will be singing your favorite pop/chinese anthem and makes you eargasm to her angelic voice  .
            </p>
            <p class="fonttext">
                The famous cake-throwing from the one and only Steve Aoki, who wants to be caked?!
            </p>
            <p class="fonttext">
                Be prepared for a visual spectacle with state-of-the-art lighting and mesmerizing visuals that will transport you to another dimension. It's a party that will leave you breathless and craving for more!
            </p>
            <p class="fonttext">
                Don't miss out on this epic night of music, celebration, and indulgence. "Steve Aoki's Cake Party" is set to be the event of the year, and tickets are flying off the shelves! Stay tuned for more surprises and updates as we count down to this spectacular night. Secure your spot and let's make memories together at the party of a lifetime! 
            </p>
            <p class="fonttext">
                For more information visit  www.phantomclub.id 
            </p>
            <div>
                <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">
                    Syarat & Ketentuan
                </p>
            </div>
            <p class="fonttitle fw-bold">
                Penukaran Tiket Lokasi & Waktu Penukaran 10 Desember 2023 di Phantom, PIK 2.
            </p>
            <p class="fonttitle fw-bold">
                - Pukul 10.00 - Selesai .
            </p>
            <p>
                <div class="fonttitle fw-bold">
                    Cara Penukaran E-Voucher
                </div>
                <div class="fonttext">
                    - Tunjukkan e-tiket yang telah diterima melalui email dari loket.com kepada petugas di lapangan untuk scan QR Code. Sesuaikan tingkat kecerahan layar ponsel sebelum menunjukkan QR Code. 
                </div>
                <div class="fonttext">
                    - Setelah QR Code sukses terverifikasi, customer akan mendapatkan wristband yang dapat digunakan untuk memasuki venue.
                </div>
                <div class="fonttext">
                    - Customer disarankan mematuhi seluruh protokol kesehatan selama event berlangsung.
                </div>
            </p>
            <p>
                <div class="fonttitle fw-bold">
                    Syarat & Ketentuan Umum
                </div>
                <div class="fonttext">
                    - Harga sudah termasuk pajak & admin fee.
                </div>
                <div class="fonttext">
                    - Tiket yang sudah dibeli tidak dapat dikembalikan.
                </div>
                <div class="fonttext">
                    - Tiket yang sudah dibeli tidak dapat diganti jadwalnya
                </div>
                <div class="fonttext">
                    - Pembeli wajib mengisi data diri pribadi saat memesan.
                </div>
                <div class="fonttext">
                    - Penjualan tiket sewaktu-waktu dapat dihentikan atau dimulai sesuai dengan kebijakan dari promotor
                </div>
                <div class="fonttext">
                    - Pengunjung wajib menjaga protokol kesehatan yang berlaku.
                </div>
                <div class="fonttext">
                    - Dilarang membawa senjata tajam dan senjata api
                </div>
            </p>
            </p>
            <p>
                <div div class="fonttitle fw-bold">
                    E-tiket
                </div>
                <div class="fonttext">
                    - E-tiket tidak dapat diuangkan.
                </div>
            </p>
            <div>
                <p class="text-decoration-none text-primary text-center fontxlarge fw-bold">TIKET</p>
            </div>
            <div class ="bg-light p-3 mb-5 rounded-4">
                <div class="border-bottom border-secondary border-3">
                    <p class="fonttitle">
                       Entrance Fee - Presale 1
                    </p>
                    <p>
                        Sudah Termasuk Pajak dan Adm
                    </p>
                    <p class ="text-primary">
                        Berakhir 07 November 2023 • 23:00 WIB
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-between pt-3 ">
                    <p class="fw-bold fonttitle ">
                        Rp 777.000
                    </p>
                    <p class="fw-bold text-primary  fonttitle">
                        SOLD OUT
                    </p>
                </div>
            </div>
            <div class ="bg-light p-3 mb-5 rounded-4">
                <div class="border-bottom border-secondary border-3">
                    <p class="fonttitle">
                       Entrance Fee - Presale 2
                    </p>
                    <p>
                        Sudah Termasuk Pajak dan Adm
                    </p>
                    <p class ="text-primary">
                    Berakhir 22 November 2023 • 23:00 WIB
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-between pt-3 ">
                    <p class="fw-bold fonttitle ">
                        Rp 971.000
                    </p>
                    <p class="fw-bold text-primary  fonttitle">
                        SALE ENDED
                    </p>
                </div>
            </div>
            <div class ="bg-light p-3 mb-5 rounded-4">
                <div class="border-bottom border-secondary border-3">
                    <p class="fonttitle">
                       Entrance Fee - Presale 3
                    </p>
                    <p>
                        Sudah Termasuk Pajak dan Adm
                    </p>
                    <p class ="text-primary">
                    Berakhir 09 December 2023 • 23:00 WIB
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-between pt-3 ">
                    <p class="fw-bold fonttitle ">
                        Rp 1.294.000
                    </p>
                    <div>
                        <button type="button" class="btn btn-outline-primary me-3 rounded-5  buttonsize">-</button>
                        0
                        <button type="button" class="btn btn-outline-primary ms-3 rounded-5 buttonsize">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex ms-5 flex-column align-self-start w-25 sticky-top">
            <div class = " shadow p-3 bg-white rounded-4">
                <div>
                <p class="fs-6 border-bottom border-2 pb-3 border-secondary  ">Kamu belum memilih tiket. Silakan pilih lebih dulu di tab menu TIKET.</p>
                </div>
                <div class="d-flex flex-row pt-2 ">
                <p class="fs-6 fontxlarge me-5 ">Harga Mulai Dari</p>
                <p class="fs-6 fw-bold fontxlarge ">Rp 777.000</p>
                </div>
                <button type="button" class="btn btn-primary w-100">Beli Tiket</button>
            </div>
            <div class="pt-3 fs-6 ">
                Bagikan Event
            </div>
            <div class="d-flex flex-row">
                <div class="pe-2">
                    <!-- <img src="{{ asset('storage/image/detail/facebook.png') }}" alt="" class="rounded-4 img-fluid widthimage" > -->
                    facebook
                </div>
                <div class="pe-2">
                    twitter
                    <!-- <img src="{{ asset('storage/image/detail/twitter.jpg') }}" alt="" class="rounded-4 img-fluid widthimage" > -->
                </div>
                <div class="pe-2">
                    Ig
                </div>
            </div>
        </div>
    </div>

    {{-- Button Prev & Next --}}
    <div class="controls">
        <div class="prev">

        </div>
        <div class="next">

        </div>
    </div>
</div>

<!-- ref:
https://www.loket.com/event/steve-aoki-s-cake-party-yoo -->

@endsection
