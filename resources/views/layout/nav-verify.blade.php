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
        <div class="row row-cols-2 w-75">
            <div class="col-2">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/image/global/logo-loket-white.png') }}" alt="" width="130">
                </a>
            </div>
            <div class="col-md-9">
                <form action="" method="get">
                    <div class="input-group w-100">
                        <input type="text" class="form-control bg-white bg-opacity-10 border-0 text-white-50"
                            placeholder="Cari konser seru di sini" name="event">
                        <button class="btn btn-primary" id="button-addon2">
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
                <a class="nav-link text-white fw-semibold px-3" href="#">
                    <i class="fa-solid fa-compass mx-1"></i> Jelajah
                </a>
            </div>
            <div class="my-1">
                <a class="nav-link text-white fw-semibold px-3" href="#">
                    <i class="fa-solid fa-ticket-simple mx-1"></i> Ticket Saya
                </a>
            </div>
            <div class="my-0">
                <a class="ps-2" href="#">
                    @if(isset($userProfile))
                        <img src="{{ asset('storage/image/avatars/' . $userProfile->gambar) }}" alt="profile-icon" class="rounded-circle border border-2 border-primary object-fit-cover" style="width: 32px; height: 32px;">
                    @else
                        <img src="{{ asset('storage/image/avatars/prof-icon.svg')}}" alt="profile-icon" class="rounded-circle border border-2 border-primary object-fit-cover" style="width: 32px; height: 32px;">
                    @endif
                </a>
            </div>
        </div>
    </div>
</nav>
