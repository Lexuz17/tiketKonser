@extends('layout.master-dashboard')

@section('title', 'Tiket Saya')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="tabs-nav">
        <div class="main-text tab tab-active fw-semibold ">
            Event Aktif
        </div>
        <div class="main-text tab fw-semibold ">
            Event Lalu
        </div>
    </div>

    <div class="tabs-content">

    </div>

    <script src="{{ asset('storage/js/transaction_history.js') }}"></script>

@endsection
