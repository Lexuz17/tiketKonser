@extends('layout.master')

@section('title', 'jelajah')

@section('content')
    <div class="py-4">
        @if ($eventSearch)
            <div class="show-search fw-normal ps-3 mb-4">
                Hasil pencarian dengan kata kunci: <span class="fw-bold fs-5">{{ $eventSearch }}</span>
            </div>
        @endif
        <div class="d-flex flex-wrap">
            @foreach ($upcomingConcerts as $concert)
                <div class="w-25 ps-3 {{ $loop->iteration > 4 ? 'pt-3' : '' }}">
                    <x-event-card
                        image="{{ asset('storage/image/home/Event/' . $concert->gambar) }}"
                        location="{{ $concert->tempat }}" title="{{ $concert->nama_konser }}"
                        date="{{ $concert->tanggal }}"
                        price="Rp {{ number_format($concert->cheapestTicketPrice, 0, ',', '.') }}"
                        creatorImage="{{ asset($concert->company->logo) }}"
                        creatorName="{{ $concert->company->nama }}" />
                </div>
            @endforeach
        </div>
    </div>

    <div class="my-3 ms-4">
        {{ $upcomingConcerts->withQueryString()->links() }}
    </div>
@endsection
