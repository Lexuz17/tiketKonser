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

            <div class="my-1">
                <div class="dropdown">
                    <a class="nav-link text-white fw-semibold px-3" href="#">
                        <i class="fa-solid fa-shopping-cart mx-1" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                            <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                            </div>
                        </div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ asset('img') }}/{{ $details['photo'] }}" />
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['product_name'] }}</p>
                                        <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                {{-- <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-0">
                <a class="ps-2" href="#">
                    <img src="{{ asset('storage/image/global/prof-icon.svg') }}" alt="profile-icon" width="32px"
                        class="rounded-circle border border-2 border-primary">
                </a>
            </div>
        </div>
    </div>
</nav>
