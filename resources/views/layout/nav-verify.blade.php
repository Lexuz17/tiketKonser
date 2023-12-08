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
    <div class="mx-5 d-flex flex-row pt-3  z-3">
        <div class="row row-cols-2 w-75">
            <div class="col-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('storage/image/global/logo.png') }}" alt="" width="130">
                </a>
            </div>
            <div class="col-md-9">
                {{-- Search bar --}}
                <form action="" method="get">
                    <div class="input-group w-100">
                        <input type="text" class="form-control bg-white bg-opacity-10 border-0 text-white-50"
                            placeholder="Cari konser seru di sini" name="event">
                        <button class="btn btn-primary" id="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col d-flex align-items-center">
                <div class="hastag d-flex flex-row my-2">
                    <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#LOKETMusik</a>
                    <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#LOKETPromo</a>
                    <a class="py-2 text-decoration-none me-3 text-white fw-normal" href="#">#Coldplay</a>
                    <a class="py-2 text-decoration-none text-white fw-normal" href="#">#SteveAoki'sCakeParty</a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center ms-auto">
            <div class="my-1">
                <a class="nav-link text-white fw-semibold px-3" href="{{ route('jelajah') }}">
                    <i class="fa-solid fa-compass mx-1"></i> Jelajah
                </a>
            </div>
            <div class="my-1">
                <a class="nav-link text-white fw-semibold px-3" href="{{ route('transactions.index') }}">
                    <i class="fa-solid fa-ticket-simple mx-1"></i> Ticket Saya
                </a>
            </div>

            <div class="my-0 position-relative z-3" id="authProfile">
                <a class="ps-2" href="#">
                    @if (isset($userProfile))
                        <img src="{{ asset('storage/image/avatars/' . $userProfile->gambar) }}" alt="profile-icon"
                            class="rounded-circle border border-2 border-primary object-fit-cover"
                            style="width: 32px; height: 32px;">
                    @else
                        <img src="{{ asset('storage/image/avatars/prof-icon.svg') }}" alt="profile-icon"
                            class="rounded-circle border border-2 border-primary object-fit-cover"
                            style="width: 32px; height: 32px;">
                    @endif
                </a>
                <div class="navbar-auth-dropdown bg-white px-1 py-3 position-absolute end-0 mt-2 rounded-3 oxygen">
                    <div class="navbar-auth-dropdown-menu">
                        <div class="auth-menu-list list-unstyled">
                            <a href="{{ route('jelajah') }}" class="text-decoration-none text-gray-4">
                                <li class="py-2 px-2 mx-2 auth-menu-item rounded-2">
                                    Jelajah
                                </li>
                            </a>
                            <a href="{{ route('transactions.index') }}" class="text-decoration-none text-gray-4 ticket-saya">
                                <li class="py-2 px-2 mx-2 auth-menu-item rounded-2">
                                    Tiket Saya
                                </li>
                            </a>
                            <a href="{{ route('editProfile') }}" class="text-decoration-none text-gray-4">
                                <li class="py-2 px-2 mx-2 auth-menu-item rounded-2">
                                    Informasi Dasar
                                </li>
                            </a>
                        </div>
                        <div class="divider"></div>
                        <form action="/logout" method="get">
                            @csrf
                            <button type="submit" class="ms-3 mt-2 btn btn-outline-danger">
                                <i class="fa-solid fa-sign-out"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div id="search-drop-overlay" class="search-drop-overlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var authProfile = document.getElementById('authProfile');
        var overlay = document.getElementById('search-drop-overlay');

        if (authProfile) {
            authProfile.addEventListener('mouseenter', function() {
                showDropdown();
                showOverlay();
                disableScroll();
            });

            authProfile.addEventListener('mouseleave', function() {
                hideDropdown();
                hideOverlay();
                enableScroll();
            });
        }

        function showDropdown() {
            var dropdown = document.querySelector('.navbar-auth-dropdown');
            dropdown.style.display = 'block';
        }

        function hideDropdown() {
            var dropdown = document.querySelector('.navbar-auth-dropdown');
            dropdown.style.display = 'none';
        }

        function showOverlay() {
            overlay.style.display = 'block';
        }

        function hideOverlay() {
            overlay.style.display = 'none';
        }

        function disableScroll() {
            var scrollY = window.scrollY;
            document.body.style.overflow = 'hidden';
            // Tetapkan posisi scroll agar tidak bergeser
            window.scrollTo(0, scrollY);
        }

        function enableScroll() {
            // Hapus properti overflow hidden untuk mengaktifkan scroll kembali
            document.body.style.overflow = 'auto';
        }
    });
</script>
