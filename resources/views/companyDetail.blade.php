@extends('layout.master')

@section('title', 'detail-company')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/company.css') }}">

    <div class="organizer-wrapper d-flex flex-wrap">
        <div class="first-column w-100">
            <div class="banner">
                <div class="hero-banner"></div>
            </div>
        </div>
        <div class="second-left-column">
            <div class="left-side position-relative p-3 me-3">
                <div class="left-side-inner">
                    <div class="about-organizer">
                        <div class="d-flex align-items-center flex-wrap ps-2">
                            <div class="first-column">
                                <img class="logo-avatar rounded-1 "
                                    src="{{ $company->logo }}" alt="">
                            </div>
                            <div class="second-column mt-2">
                                <div class="brand fw-bold fs-5">
                                    {{ $company->nama }}
                                </div>
                                <div class="since text-gray-4 fs-label">
                                    <span class="text-black">Member sejak: </span>{{ $company->since }}
                                </div>
                                <div class="desc text-gray-4 mt-4 fs-label">
                                    <span class="text-black">Desc: </span>{{ $company->desc }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-organizer"></div>
            </div>
        </div>
        <div class="second-right-column py-3 d-flex" style="width:77%;">
            <div class="event-list-container w-100">
                <div class="first-selector">
                    <ul id="organizer-event-tabs" class="event-list m-0 p-0 mb-4 fw-semibold " uk-switcher="">
                        <li class="" onclick="onChangeEventTabs('active')" data-index="0">
                            <a class="events-tabs selected text-decoration-none" href="javascript:void(0);">Event Aktif</a>
                        </li>
                        <li class="ps-4" onclick="onChangeEventTabs('past')" data-index="1">
                            <a class="events-tabs text-decoration-none" href="javascript:void(0);">Event Lalu</a>
                        </li>
                    </ul>
                </div>

                <div class="card-event-list">
                    <div id="active-events">
                        <div class="d-flex flex-wrap">
                            @forelse ($activeConcerts as $concert)
                                <div class="pe-3 {{ $loop->iteration > 3 ? 'pt-4' : '' }}" style="width: 33%">
                                    <x-event-card image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                        location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                                        date="{{ $concert->tanggal }}"
                                        price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                                        creatorImage="{{ asset($concert->company->logo) }}"
                                        creatorName="{{ $concert->company->nama }}" />
                                </div>
                            @empty
                                <div class="event-not-found mx-auto align-items-center justify-content-center">
                                    <div class="content">
                                        <img class="" src="{{ asset('storage/image/company/empty.png') }}"
                                            alt="">
                                        <div class="fw-bolder fs-4">Tidak ada konser aktif</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div id="past-events">
                        <div class="d-flex flex-wrap">
                            @forelse ($pastConcerts as $concert)
                                <div class="pe-3 {{ $loop->iteration > 3 ? 'pt-4' : '' }}" style="width: 33%">
                                    <x-event-card image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                                        location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                                        date="{{ $concert->tanggal }}"
                                        price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                                        creatorImage="{{ asset($concert->company->logo) }}"
                                        creatorName="{{ $concert->company->nama }}" />
                                </div>
                            @empty
                                <div class="event-not-found mx-auto align-items-center justify-content-center">
                                    <div class="content">
                                        <img class="" src="{{ asset('storage/image/company/empty.png') }}"
                                            alt="">
                                        <div class="fw-bolder fs-4">Tidak ada konser aktif</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('storage/js/companyDetail.js') }}"></script>
@endsection
