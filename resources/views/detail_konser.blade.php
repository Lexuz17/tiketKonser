@extends("layout.master")

@section('title', 'detail-konser')

@section("content")

<link rel="stylesheet" href="{{ asset('css/detail_konser.css') }}">

<div class="h">
    <h6>Biawak Salto</h6>
    
    <div class="list">
        <div class="item">
            <img src="{{ asset('storage/image/home/banner1.jpg') }}" alt="" class="w-100 rounded-4 img-fluid">
        </div>
        <div class="item">
            <img src="{{ asset('storage/image/home/banner2.jpg') }}" alt="" class="w-100 rounded-4 img-fluid">
        </div>
        <div class="item">
            <img src="{{ asset('storage/image/home/banner3.jpg') }}" alt="" class="w-100 rounded-4 img-fluid">
        </div>
        <div class="item">
            <img src="{{ asset('storage/image/home/banner4.jpg') }}" alt="" class="w-100 rounded-4 img-fluid">
        </div>
    </div>

    {{-- Button Prev & Next --}}
    <div class="controls">
        <div class="prev">

        </div>
        <div class="next">

        </div>
    </div>
</div>

ref:
https://www.loket.com/event/steve-aoki-s-cake-party-yoo

@endsection
