@extends("layout.master")

@section('title', 'home')

@section("content")

<div class="section-banner">
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

@endsection
