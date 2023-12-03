<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- Custom Local Boostrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/61b0df038c.js" crossorigin="anonymous"></script>
    {{-- side Nav --}}
    <link rel="stylesheet" href="{{ asset('css/master-dashboard.css') }}">
</head>
<body>

<div class="dashboard d-flex">
    <div id='dashboard-sidebar' class="dashboard-sidebar-container">
        <a href="/">
            <div class="dashboard-sidebar-logo bg-dark d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/image/global/logo-loket-white.png') }}" alt="">
            </div>
        </a>
        <div class="nav-list-menu">
            <ul class="nav-parent-item list-group pt-3 pb-2">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }} list-group-item bg-transparent border-0" id="jelajahKonser">
                    <a class="nav-link fw-semibold px-3" href="/">
                        <i class="fa-solid fa-compass mx-1"></i> Jelajah Konser
                    </a>
                </li>
                <li class="nav-item {{ Request::is('transactions*') ? 'active' : '' }} list-group-item bg-transparent border-0" id="ticketSaya">
                    <a class="nav-link fw-semibold px-3" href="{{ route('transactions.index') }}">
                        <i class="fa-solid fa-ticket-simple mx-1"></i> Tiket Saya
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-list-menu">
            <ul class="nav-parent-item list-group rounded-0 py-2">
                <div class="title fs-7 text-gray-3">Akun</div>
                <li class="nav-item {{ Request::is('user-edit') ? 'active' : '' }} mt-1 list-group-item bg-transparent border-0" id="informasiDasar">
                    <a class="nav-link fw-semibold px-3" href="{{ route('editProfile') }}">
                        <i class="fa-solid fa-id-badge mx-1"></i> Informasi Dasar
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="dashboard-content" class="dashboard-content min-vh-100 flex-grow-1">
        <div class="dashboard-top-header">
            <div class="d-flex justify-content-between  align-items-center">
                <div class="navbar-left fs-5 fw-medium text-gray-4">
                    @yield('title')
                </div>
                <div class="navbar-auth ms-auto ">
                    <div class="name-section rounded-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/image/Avatars/'.$userProfile->gambar) }}" alt="">
                        <div class="name oxygen">{{ $userProfile->nama_depan .' '. $userProfile->nama_belakang }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-real">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
