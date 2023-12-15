<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('storage/image/global/logo-icon.png') }}" type="x-icon">
    {{-- Custom Local Boostrap --}}
    <link rel="stylesheet" href="   {{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- swiper.css --}}
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/61b0df038c.js" crossorigin="anonymous"></script>
    {{-- Master --}}
    <script src="{{ asset('storage/js/master.js') }}"></script>
</head>

<body class="lato min-vh-100">

    {{-- Navbar Verify --}}
    @if (auth()->check())
        @include('layout.nav-verify')
    @endif

    {{-- Navbar Guest --}}
    @if (auth()->guest())
        @include('layout.nav-guest')
    @endif


    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer position-sticky top-100">
        <footer class="bg-dark text-white pt-5 pb-5 main-footer">
            <div class="container d-flex flex-wrap justify-content-center">
                <div class="mx-5 px-4">
                    <p class="fw-bold">Tentang KonserKita</p>
                    <ul class="list-unstyled mb-0 fw-light">
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Masuk</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Biaya</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Lihat Event</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">FAQ</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Syarat dan Ketentuan</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Laporan Kesalahan</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Sistem</a>
                        </li>
                    </ul>
                </div>
                <div class="mx-5 px-4">
                    <p class="fw-bold">Rayakan Eventmu</p>
                    <ul class="list-unstyled mb-0 fw-light">
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Coldplay</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Itzy</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">FIFA U-17 World Cup</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">AESPA Birthday</a>
                        </li>
                    </ul>
                </div>
                <div class="mx-5 px-4">
                    <p class="fw-bold">Lokasi Event</p>
                    <ul class="list-unstyled mb-0 fw-light">
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Jakarta</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Bandung</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Yogyakarta</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Surabaya</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Solo</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Medan</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Bali</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Semua Kota</a>
                        </li>
                    </ul>
                </div>
                <div class="mx-5 px-4">
                    <p class="fw-bold">Inspirasi Event</p>
                    <ul class="list-unstyled mb-0 fw-light">
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Festival</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Konser</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">OLahraga</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Workshop & Seminar</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Teater & Drama</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Atraksi</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Semua Kategori</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Sosial media Link --}}
            <div class="container d-flex flex-wrap justify-content-center mt-5">
                <a href="#!">
                    <i class="fa-brands fa-square-facebook text-white fs-3 mx-3"></i>
                </a>
                <a href="#!">
                    <i class="fa-brands fa-instagram text-white fs-3 mx-3"></i>
                </a>
                <a href="#!">
                    <i class="fa-brands fa-twitter text-white fs-3 mx-3"></i>
                </a>
                <a href="#!">
                    <i class="fa-brands fa-linkedin text-white fs-3 mx-3"></i>
                </a>
                <a href="#!">
                    <i class="fa-brands fa-youtube text-white fs-3 mx-3"></i>
                </a>
            </div>
        </footer>
        <footer class="second-footer text-center bg-primary">
            <div class="container d-flex align-items-center justify-content-center py-4">
                <p class="mb-0">
                    <a href="#" class="text-decoration-none text-white mx-2">Tentang Kami</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Blog</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Karir</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Kebijakan Privasi</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Kebijakan Cookie</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Panduan</a>
                    <span class="titik text-white">•</span>
                    <a href="#" class="text-decoration-none text-white mx-2">Hubungi Kami</a>
                </p>
            </div>
        </footer>
    </div>


</body>

</html>
