@extends('layout.master')

@section('title', 'home')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div class="home-wrapper row g-4">
        {{-- Flass notif --}}
        <div class="position-relative d-flex mx-auto text-center justify-content-center">
            <div class="position-absolute w-auto z-3 opacity-100">
                @if (Session::has('status'))
                    <div class="alert alert-success" role='alert'>
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>

        @if(isset($eventSearch))
            {{-- Event search show --}}
            <div class="search-event-section">
                <div class="search-event-header">
                    <div class="new-search-page">
                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                            <div class="first-column">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="middle-column ps-4 fs-4 fw-bold flex-grow-1">
                                Event dengan kata "{{ $eventSearch }}"
                            </div>
                            <div class="right-column">
                                <a class="show-all text-decoration-none " href="{{ route('jelajah') }}">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-event mt-4 search-event-slider">
                    <div class="section-wrapper">
                        <div class="section-content swiper mySwiper">
                            <div class="slide-content">
                                <div class="swiper-wrapper">
                                    @foreach ($sortedUpcomingConcerts as $concert)
                                        <x-event-card image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                            location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                                            date="{{ $concert->tanggal }}"
                                            price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                                            creatorImage="{{ asset($concert->company->logo) }}"
                                            creatorName="{{ $concert->company->nama }}" />
                                    @endforeach
                                    <div class="card-event any-event rounded-3 swiper-slide shadow d-flex justify-content-center align-items-center" style="display: block;">
                                        <a class="text-decoration-none w-100" href="/discover?event={{ $eventSearch }}">
                                            <div class="text-center text-black align-items-center fw-bold">
                                                <i class="fa-solid fa-circle-info fs-4"></i>
                                                <div>
                                                    Lihat Event Lainnya
                                                </div>
                                            </div>
                                        </a>
                                    </div>

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

            </div>
        @else
            {{-- Banner Promosi --}}
            <div id="bannerCarousel" class="carousel slide col-md-12" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-indicators mb-0">
                    @php $i = 0; @endphp
                    @foreach ($randomConcertsBanner as $concert)
                        @if ($concert->banner)
                            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $i }}"
                                class="{{ $i === 0 ? 'active' : '' }} rounded-circle custom-z-index"
                                aria-label="Slide {{ $i + 1 }}"></button>
                            @php $i++; @endphp
                        @endif
                    @endforeach
                </div>

                <div class="carousel-inner rounded-4">
                    @php $i = 0; @endphp
                    @foreach ($randomConcertsBanner as $concert)
                        @if ($concert->banner)
                            <div class="carousel-item{{ $i === 0 ? ' active' : '' }}">
                                <img src="{{ asset('storage/image/home/Banner/' . $concert->banner) }}" class="d-block w-100"
                                    alt="{{ $concert->nama_konser }}">
                            </div>
                            @php $i++; @endphp
                        @endif
                    @endforeach
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
                                @foreach ($sortedUpcomingConcertsUnique as $concert)
                                    <x-event-card image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                        location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                                        date="{{ $concert->tanggal }}"
                                        price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                                        creatorImage="{{ asset($concert->company->logo) }}"
                                        creatorName="{{ $concert->company->nama }}" />
                                @endforeach
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
            <div class="bg-luar bg-dark w-100 col-md-12 position-absolute start-0"></div>

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
                            @foreach ($favoriteConcerts as $concert)
                                <div class="top-selling-item d-inline-flex me-4 align-items-center">
                                    <div class="top-selling-number text-gray-4 oxygen lh-1 me-2">{{ $loop->iteration }}</div>
                                    <div class="top-selling-thumbnail position-relative rounded-3 overflow-hidden">
                                        <a href="/event/{{ rtrim(str_replace(' ', '-', $concert->nama_konser), '.') }}"
                                            class="position-absolute w-100 h-100 top-0 start-0">
                                        </a>
                                        <img src="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                            alt="{{ $concert->nama_konser }}" class="w-100 h-100">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Campaing / promosi banner --}}
        <div class="section-campaign col-md-12 py-2 position-relative">
            <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
            <img src="{{ asset('storage/image/home/Promo/promo1.jpg') }}" alt="" class="w-100 rounded-4">
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
                            @foreach ($companiesShow as $company)
                                <div class="company-item me-4 swiper-slide">
                                    <a href="{{ route('company.index', ['id' => $company->id]) }}" class="position-absolute w-100 h-100 top-0 start-0 z-1"></a>
                                    <div class="company-avatar">
                                        <img src="{{ $company->logo }}" alt="">
                                    </div>
                                    <div class="company-name">{{ $company->nama }}</div>
                                </div>
                            @endforeach
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
                                @foreach ($categoriesShow as $category)
                                    <x-category-card backgroundColor="{{ $category->warna }}"
                                        image="{{ asset('storage/image/home/Category/' . $category->gambar) }}"
                                        categoryName="{{ $category->name }}" />
                                @endforeach
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
                            <div class="filter-dropdown-selected d-flex align-items-center justify-content-center position-relative text-primary"
                                id="dropdownToggle">
                                <div class="show-location">
                                    Semua
                                </div class="show-location">
                                <i class="fa-solid fa-chevron-down ms-2 mt-1 fs-6"></i>
                            </div>
                            <div class="filter-dropdown-collapse shadow p-3 rounded-3 position-absolute z-2 bg-white"
                                id="dropdownContent">
                                <div class="search-input-container mb-3">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                        <input type="text" class="form-control" placeholder="Cari lokasi" id="searchLocationInput">
                                    </div>
                                </div>
                                <div class="filter-list">
                                    <div class="filter-item align-items-center">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name">
                                                Semua
                                            </div>
                                        </a>
                                    </div>
                                    @foreach ($uniquePlaces as $place)
                                        <div class="filter-item align-items-center">
                                            <a class="d-inline-flex text-decoration-none location">
                                                <i class="fa-solid fa-location-dot location text-primary"></i>
                                                <div class="location-name">
                                                    {{ $place }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popularEventsSwiper" class="section-content swiper mySwiper">
                    <div class="slide-content">
                        <div class="swiper-wrapper">
                            @foreach ($sortedUpcomingConcerts as $concert)
                                <x-event-card image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                    location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                                    date="{{ $concert->tanggal }}"
                                    price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                                    creatorImage="{{ asset($concert->company->logo) }}"
                                    creatorName="{{ $concert->company->nama }}" />
                            @endforeach
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

        {{-- Jelajah ke lebih banyak konser --}}
        <div class="section-additional col-md-12 mx-auto text-center pt-2">
            <a href="{{ route('jelajah') }}">
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
