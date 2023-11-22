@extends('layout.master')

@section('title', 'home')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div class="home-wrapper row g-4">

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
                            {{-- Card 1 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event1.jpg') }}" alt="event1" class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title">STEVE AOKI'S CAKE PARTY</div>
                                    <div class="description-date text-gray-3 py-1">10 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 971.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator1.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">PRESTIGE
                                                PROMOTIONS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 2 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event2.jpg') }}" alt="event1" class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">Didangdutin Fest</div>
                                    <div class="description-date text-gray-3 py-1">17 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 249.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator2.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Micproject</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 3 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event3.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title text-truncate">KONSER KEMANUSIAAN UNTUK
                                        GAZA
                                    </div>
                                    <div class="description-date text-gray-3 py-1">21 Nov - 13 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 100.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator3.png') }}" width="32px"
                                                    height="32px" alt="M BLOC FOUNDATION" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">M BLOC FOUNDATION
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 4 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 5 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event1.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">STEVE AOKI'S CAKE PARTY</div>
                                    <div class="description-date text-gray-3 py-1">10 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 971.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator1.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">PRESTIGE
                                                PROMOTIONS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 6 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event2.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">Didangdutin Fest</div>
                                    <div class="description-date text-gray-3 py-1">17 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 249.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator2.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Micproject</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 7 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event3.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title text-truncate">KONSER KEMANUSIAAN UNTUK
                                        GAZA
                                    </div>
                                    <div class="description-date text-gray-3 py-1">21 Nov - 13 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 100.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator3.png') }}" width="32px"
                                                    height="32px" alt="M BLOC FOUNDATION" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">M BLOC FOUNDATION
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 8 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 9 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <img src="{{ asset('storage/image/home/company-4.png') }}" alt="">
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
                                @for ($i = 1; $i <= 2; $i++)
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(220, 20, 140);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat1.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            K-Pop
                                        </div>
                                    </div>
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(233, 20, 41);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat3.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            Musik Indonesia
                                        </div>
                                    </div>
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(0, 100, 80);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat6.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            Indie
                                        </div>
                                    </div>
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(83, 122, 161);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat4.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            Metal
                                        </div>
                                    </div>
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(96, 129, 8);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat5.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            Jazz
                                        </div>
                                    </div>
                                    <div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style='background-color: rgb(30, 50, 100);'>
                                        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
                                        <div class="category-img end-0 bottom-0">
                                            <img src="{{ asset('storage/image/home/cat2.jpg') }}" alt="" class="object-fit-cover">
                                        </div>
                                        <div class="category-label text-white fw-bold p-2">
                                            Anime
                                        </div>
                                    </div>
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
                        <div class="filter-dropdown">
                            <div class="filter-dropdown-selected d-flex align-items-center justify-content-center position-relative text-primary">
                                <div>
                                    Jakarta
                                </div>
                                <i class="fa-solid fa-chevron-down ms-2 mt-1 fs-6"></i>
                            </div>
                            <div class="filter-dropdown-collapse">
                                <div class="search-input-container">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                      </div>
                                </div>
                                <div class="filter-list">
                                    <div class="filter-item">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name">
                                                Jakarta
                                            </div>
                                        </a>
                                    </div>
                                    <div class="filter-item">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name">
                                                Bandung
                                            </div>
                                        </a>
                                    </div>
                                    <div class="filter-item">
                                        <a class="d-inline-flex text-decoration-none location">
                                            <i class="fa-solid fa-location-dot location text-primary"></i>
                                            <div class="location-name active">
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
                            {{-- Card 1 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event1.jpg') }}" alt="event1" class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title">STEVE AOKI'S CAKE PARTY</div>
                                    <div class="description-date text-gray-3 py-1">10 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 971.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator1.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">PRESTIGE
                                                PROMOTIONS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 2 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event2.jpg') }}" alt="event1" class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">Didangdutin Fest</div>
                                    <div class="description-date text-gray-3 py-1">17 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 249.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator2.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Micproject</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 3 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event3.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title text-truncate">KONSER KEMANUSIAAN UNTUK
                                        GAZA
                                    </div>
                                    <div class="description-date text-gray-3 py-1">21 Nov - 13 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 100.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator3.png') }}" width="32px"
                                                    height="32px" alt="M BLOC FOUNDATION" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">M BLOC FOUNDATION
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 4 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 5 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event1.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">STEVE AOKI'S CAKE PARTY</div>
                                    <div class="description-date text-gray-3 py-1">10 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 971.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator1.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">PRESTIGE
                                                PROMOTIONS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 6 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event2.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">Didangdutin Fest</div>
                                    <div class="description-date text-gray-3 py-1">17 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 249.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator2.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Micproject</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 7 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event3.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title text-truncate">KONSER KEMANUSIAAN UNTUK
                                        GAZA
                                    </div>
                                    <div class="description-date text-gray-3 py-1">21 Nov - 13 Dec 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 100.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator3.png') }}" width="32px"
                                                    height="32px" alt="M BLOC FOUNDATION" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">M BLOC FOUNDATION
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 8 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Card 9 --}}
                            <div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow ">
                                <div class="card-event-thumbnail">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <img src="{{ asset('storage\image\home\event4.jpg') }}" alt="event1"
                                        class="w-100">
                                </div>
                                <div class="card-event-description p-3">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0">
                                    </a>
                                    <div class="description-title ">INQUISITIVE</div>
                                    <div class="description-date text-gray-3 py-1">25 Nov - 26 Nov 2023</div>
                                    <div class="description-price">
                                        <span class="final-price fw-bold">Rp 550.000</span>
                                    </div>
                                </div>
                                <div class="card-event-creator px-3 py-2">
                                    <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>

                                    <div class="d-grid gap-2">
                                        <div class="d-flex align-items-center">
                                            <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                                                <img src="{{ asset('storage/image/home/creator4.png') }}" width="32px"
                                                    height="32px" alt="PRESTIGE PROMOTIONS" class="">
                                            </div>
                                            <div class="creator-name text-uppercase text-gray-4 fs-label">Bengkel Space
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    {{-- swiper js --}}
    <script src="{{ asset('storage/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('storage/js/home.js') }}"></script>

@endsection
