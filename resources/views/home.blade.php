@extends('layout.master')

@section('title', 'home')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div class="home-wrapper row g-4">

        {{-- Flass notif --}}
        <div class="position-relative d-flex mx-auto text-center justify-content-center">
            <div class="position-absolute w-auto z-3 opacity-100">
                @if(Session::has('status'))
                    <div class="alert alert-success" role='alert'>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>

        {{-- Banner Promosi --}}
        <div id="bannerCarousel" class="carousel slide col-md-12" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-indicators mb-0">
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active rounded-circle"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" class="rounded-circle"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" class="rounded-circle"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3" class="rounded-circle"
                    aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner rounded-4">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/image/home/banner1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/image/home/banner2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/image/home/banner3.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/image/home/banner4.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            {{-- Button Prev & Next --}}
            <button class="carousel-control-prev my-auto shadow rounded-circle" type="button"
                data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left fs-6 text-gray-4"></i>
            </button>
            <button class="carousel-control-next my-auto shadow rounded-circle" type="button"
                data-bs-target="#bannerCarousel" data-bs-slide="next">
                <i class="fa-solid fa-angle-right fs-6 text-gray-4"></i>
            </button>
        </div>

        {{-- Event Pilihan --}}
        <div class="section-event col-md-12 pb-2">
            <div class="section-wrapper">
                <div class="section-title">
                    <div class="fs-4 fw-bold lato text-dark">
                        Event Pilihan
                    </div>
                </div>

                <div class="section-content swiper mySwiper">
                    <div class="slide-content">
                        <div class="swiper-wrapper">
                            @for ($i = 1; $i <= 5; $i++)
                                <x-event-card
                                    image="{{ asset('storage/image/home/event1.jpg') }}"
                                    title="STEVE AOKI'S CAKE PARTY"
                                    date="10 Dec 2023"
                                    price="Rp 971.000"
                                    creatorImage="{{ asset('storage/image/home/creator1.png') }}"
                                    creatorName="PRESTIGE PROMOTIONS"
                                />
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next shadow my-auto" id="nextButton" aria-disabled="false">
                    <i class="fa-solid fa-angle-right fs-6 text-gray-4"></i>
                </div>
                <div class="swiper-button-prev shadow my-auto" id="prevButton" aria-disabled="true">
                    <i class="fa-solid fa-angle-left fs-6 text-gray-4"></i>
                </div>
            </div>
        </div>

        {{-- bgluar --}}
        <div class="bg-luar bg-dark w-100 col-md-12 position-absolute start-0">

        </div>
        {{-- Top selling --}}
        <div class="section-top-selling col-md-12 py-4 bg-dark">
            <div class="section-wrapper">
                <div class="section-title">
                    <div class="fs-4 fw-bold lato text-white">
                        Paling Laku Keras!
                    </div>
                </div>
                <div class="section-content text-white d-grid mb-2">
                    <div class="top-selling-list d-inline-block">
                        {{-- top 1 --}}
                        <div class="top-selling-item d-inline-flex me-4 align-items-center">
                            <div class="top-selling-number text-gray-4 oxygen lh-1 me-2">1</div>
                            <div class="top-selling-thumbnail position-relative rounded-3 overflow-hidden">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                </a>
                                <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="" class="w-100 h-100">
                            </div>
                        </div>
                        {{-- top 2 --}}
                        <div class="top-selling-item d-inline-flex me-4 align-items-center">
                            <div class="top-selling-number text-gray-4 oxygen lh-1 me-2">2</div>
                            <div class="top-selling-thumbnail position-relative rounded-3 overflow-hidden">
                                <a href="2" class="position-absolute w-100 h-100 top-0 start-0">
                                </a>
                                <img src="{{ asset('storage\image\home\event5.jpg') }}" alt="" class="w-100 h-100">
                            </div>
                        </div>
                        {{-- top 3 --}}
                        <div class="top-selling-item d-inline-flex me-4 align-items-center">
                            <div class="top-selling-number text-gray-4 oxygen lh-1 me-2">3</div>
                            <div class="top-selling-thumbnail position-relative rounded-3 overflow-hidden">
                                <a href="3" class="position-absolute w-100 h-100 top-0 start-0">
                                </a>
                                <img src="{{ asset('storage\image\home\event6.jpg') }}" alt="" class="w-100 h-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Campaing / promosi banner --}}
        <div class="section-campaign col-md-12 py-2 position-relative">
            <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
            <img src="{{ asset('storage/image/home/promo1.jpg') }}" alt="" class="w-100 rounded-4">
        </div>

        {{-- Company Favorit --}}
        <div class="section-company col-md-12 pb-2">
            <div class="section-wrapper">
                <div class="section-title">
                    <div class="fs-4 fw-bold lato text-dark">
                        Creator Favorit
                    </div>
                </div>
                <div class="section-content swiper">
                    <div class="company-section-list">
                        <div class="swiper-wrapper">
                            <div class="company-item me-4 swiper-slide">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                <div class="company-avatar">
                                    <img src="{{ asset('storage/image/home/company-1.png') }}" alt="">
                                </div>
                                <div class="company-name">INDONESIAN BASKETBALL LEAGUE</div>
                            </div>
                            <div class="company-item me-4 swiper-slide">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                <div class="company-avatar">
                                    <img src="{{ asset('storage/image/home/company-2.jpg') }}" alt="">
                                </div>
                                <div class="company-name">Ancol Taman Impian</div>
                            </div>
                            <div class="company-item me-4 swiper-slide">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                <div class="company-avatar">
                                    <img src="{{ asset('storage/image/home/company-3.jpg') }}" alt="">
                                </div>
                                <div class="company-name">Hacktiv8</div>
                            </div>
                            <div class="company-item me-4 swiper-slide">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                <div class="company-avatar">
                                    <img src="{{ asset('storage/image/home/company-4.jpg') }}" alt="">
                                </div>
                                <div class="company-name">Comika Entertainment</div>
                            </div>
                            <div class="company-item me-4 swiper-slide">
                                <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                <div class="company-avatar">
                                    <img src="{{ asset('storage/image/home/company-5.png') }}" alt="">
                                </div>
                                <div class="company-name">CK Star Entertainment</div>
                            </div>
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="company-item me-4 swiper-slide">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                    <div class="company-avatar">
                                        <img src="{{ asset('storage/image/home/company-' . $i . '.png') }}" alt="">
                                    </div>
                                    <div class="company-name">Company {{ $i }}</div>
                                </div>
                            @endfor
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="company-item me-4 swiper-slide">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                    <div class="company-avatar">
                                        <img src="{{ asset('storage/image/home/company-' . $i . '.png') }}" alt="">
                                    </div>
                                    <div class="company-name">Company {{ $i }}</div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next shadow my-auto" id="nextButton" aria-disabled="false">
                    <i class="fa-solid fa-angle-right fs-6 text-gray-4"></i>
                </div>
                <div class="swiper-button-prev shadow my-auto" id="prevButton" aria-disabled="true">
                    <i class="fa-solid fa-angle-left fs-6 text-gray-4"></i>
                </div>
            </div>
        </div>

        {{-- Category --}}
        <div class="section-category col-md-12 pb-2">
            <div class="section-container container shadow p-4 rounded-3">
                <div class="section-wrapper">
                    <div class="section-title">
                        <div class="fs-4 fw-bold lato text-dark">
                            Kategori Konser
                        </div>
                    </div>
                    <div class="section-content swiper">
                        <div class="category-list">
                            <div class="swiper-wrapper">
                                @for ($i = 1; $i <= 6; $i++)
                                    <x-category-card
                                        backgroundColor="rgb(220, 20, 140);"
                                        image="{{ asset('storage/image/home/cat1.jpg') }}"
                                        categoryName="Hots"
                                    />
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Populer disuatu daerah --}}
        <div class="section-event col-md-12 pb-2">
            <div class="section-wrapper">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <div class="label-title d-flex flex-wrap column-gap-2 align-items-center fs-4 fw-bold text-dark">
                        <div class="">
                            Populer di
                        </div>
                        <div class="filter-dropdown position-relative">
                            <div class="filter-dropdown-selected d-flex align-items-center justify-content-center position-relative text-primary" id="dropdownToggle">
                                <div class="show-location">
                                    Jakarta
                                </div class="show-location">
                                <i class="fa-solid fa-chevron-down ms-2 mt-1 fs-6"></i>
                            </div>
                            <div class="filter-dropdown-collapse shadow p-3 rounded-3 position-absolute z-2 bg-white" id="dropdownContent">
                                <div class="search-input-container mb-3">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                      </div>
                                </div>
                                <div class="filter-list">
                                    <div class="filter-item align-items-center">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name active">
                                                Jakarta
                                            </div>
                                        </a>
                                    </div>
                                    <div class="filter-item align-items-center">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name">
                                                Bandung
                                            </div>
                                        </a>
                                    </div>
                                    <div class="filter-item align-items-center">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name">
                                                Kediri
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-content swiper mySwiper">
                    <div class="slide-content">
                        <div class="swiper-wrapper">
                            @for ($i = 1; $i <= 9; $i++)
                                <x-event-card
                                    image="{{ asset('storage/image/home/event1.jpg') }}"
                                    title="STEVE AOKI'S CAKE PARTY"
                                    date="10 Dec 2023"
                                    price="Rp 971.000"
                                    creatorImage="{{ asset('storage/image/home/creator1.png') }}"
                                    creatorName="PRESTIGE PROMOTIONS"
                                />
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next shadow my-auto" id="nextButton" aria-disabled="false">
                    <i class="fa-solid fa-angle-right fs-6 text-gray-4"></i>
                </div>
                <div class="swiper-button-prev shadow my-auto" id="prevButton" aria-disabled="true">
                    <i class="fa-solid fa-angle-left fs-6 text-gray-4"></i>
                </div>
            </div>
        </div>

        {{-- Tombol Logout --}}
        <div class="section-logout col-md-12 mx-auto text-center pt-2">
            <form action="/logout" method="get">
                @csrf
                <button type="submit" class="btn btn-outline-danger">
                    Logout
                    <i class="fa-solid fa-sign-out"></i>
                </button>
            </form>
        </div>

        {{-- Jelajah ke lebih banyak konser --}}
        <div class="section-additional col-md-12 mx-auto text-center pt-2">
            <a href="#">
                <button type="button" class="btn btn-outline-primary">
                    Jelajah ke lebih banyak konser
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </a>
        </div>

    </div>

    {{-- swiper js --}}
    <script src="{{ asset('storage/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('storage/js/home.js') }}"></script>

@endsection
