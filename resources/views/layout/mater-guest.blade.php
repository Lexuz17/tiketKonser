<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
    {{-- Navbar --}}
    {{-- <div class="fixed-top"> --}}
    <div class="bg-primary nav1 d-none d-sm-block">
        <ul class="fw-medium list-unstyled me-5 d-flex justify-content-end py-2 m-0">
            <li class="me-4">
                <a class="text-white text-decoration-none" aria-current="page" href="#">Tentang Loket</a>
            </li>
            <li class="me-4">
                <a class="text-white text-decoration-none" href="#">Mulai Jadi Event Creator</a>
            </li>
            <li class="me-4">
                <a class="text-white text-decoration-none" href="#">Biaya</a>
            </li>
            <li class="me-4">
                <a class="text-white text-decoration-none" href="#">Blog</a>
            </li>
            <li class="">
                <a class="text-white text-decoration-none" href="#">Hubungi Kami</a>
            </li>
        </ul>
    </div>
    <nav class="bg-dark nav2 shadow">
        <div class="mx-5 d-flex flex-row pt-3">
            <div class="row row-cols-2 w-75 ">
                <div class="col-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('storage/image/global/logo-loket-white.png') }}" alt=""
                            width="130">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="input-group w-100">
                        <input type="text" class="form-control bg-white bg-opacity-10 border-0 text-white-50"
                            placeholder="Cari konser seru di sini" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col d-flex align-items-center">
                    <div class="hastag d-flex flex-row my-2">
                        <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#LOKETMusik</a>
                        <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#LOKETPromo</a>
                        <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#Coldplay</a>
                        <a class="py-2 text-decoration-none text-white fw-normal"
                            href="#">#SteveAoki'sCakeParty</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center ms-auto guest">
                <div class="mt-2 px-2">
                    <a class="nav-link text-white fw-semibold" href="#">
                        <i class="fa-solid fa-calendar-plus"></i> Buat Event
                    </a>
                </div>
                <div class="mt-2 px-2">
                    <a class="nav-link text-white fw-semibold" href="#">
                        <i class="fa-solid fa-compass mx-1"></i> Jelajah
                    </a>
                </div>
                <div class="px-2">
                    <a href="/register">
                        <button type="button" class="btn btn-outline-primary">Daftar</button>
                    </a>
                </div>
                <div class="">
                    <a href="/login">
                        <button type="button" class="btn btn-primary">Masuk</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    {{-- </div> --}}


    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer position-sticky top-100">
        <footer class="bg-dark text-white pt-5 pb-5 main-footer">
            <div class="container d-flex flex-wrap justify-content-center">
                <div class="mx-5 px-4">
                    <p class="fw-bold">Tentang Loket</p>
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
