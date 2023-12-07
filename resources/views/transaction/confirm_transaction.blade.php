@extends('layout.master')

@section('title', 'transaction')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/confirm-transaction.css') }}">

    <form id="transactionForm" action="{{ route('transactions.storeFull', ['id' => $transaction->id]) }}" method="post"
        onsubmit="return validateForm()">
        @csrf
        <div class="wrapper">
            <div class="content-left me-5" style="width: 60%">
                <div class="uk-section uk-padding-remove">
                    <div class="uk-section-title">
                        <h4 class="fw-bold">Detail Pemesanan</h4>
                    </div>
                    <div class="card1 mt-3">
                        <div class="card-content">
                            <div class="card-row">
                                <div class="event-image">
                                    <img src="{{ asset('storage/image/home/Event/' . $selectedConcert->gambar) }}"
                                        alt="STEVE AOKI'S CAKE PARTY">
                                </div>
                                <div class="event-details">
                                    <p class="fs-6 fw-bolder">{{ $selectedConcert->nama_konser }}</p>
                                    <div class="event-info">
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-calendar-days" style="color: #9e9e9e;"></i>
                                            <span>{{ date('d F Y', strtotime($selectedConcert->tanggal)) }}</span>
                                        </div>
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-clock" style="color: #9e9e9e;"></i>
                                            <span>
                                                {{ \Carbon\Carbon::parse($selectedConcert->waktu_start)->format('H:i') }}
                                                -
                                                {{ \Carbon\Carbon::parse($selectedConcert->waktu_end)->format('H:i') }}
                                                WIB
                                            </span>
                                        </div>
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-location-dot" style="color: #9e9e9e;"></i>
                                            <span>{{ $selectedConcert->tempat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="card-row">
                                <div class="ticket-type fw-semibold ">
                                    <span>Jenis Tiket</span>
                                </div>
                                <div class="ticket-detail fw-semibold ">
                                    <span class="price-label">Harga</span>
                                    <span>Jumlah</span>
                                </div>
                            </div>
                            <hr class="my-2">
                            @foreach ($transaction->tickets as $ticket)
                                <div class="card-row">
                                    <div class="ticket-type">
                                        <i class="fa-solid fa-ticket fa-2x"
                                            style="color: #9477e1; margin-right:15px; transform: rotate(-15deg);"></i>
                                        <span>{{ $ticket->kategori }}</span>
                                    </div>
                                    <div class="ticket-details" style="display: flex; align-items: center;">
                                        <span class="formated-price">Rp
                                            {{ number_format($ticket->harga, 0, ',', '.') }}</span>
                                        <span class="amount">x{{ $ticket->pivot->jumlah_ticket }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="uk-section uk-padding-remove">
                    <div class="uk-section-title">
                        <h4 class="fw-bold">
                            Detail Pemesan
                        </h4>
                    </div>
                    <div class="card mt-3">
                        <div class="card-content">
                            <div class="personal-form">
                                <div id="order-detail-60845666" class="single-form">
                                    <div id="attendee_input_60845666" class="field-list pb-3">
                                        {{-- nama_lengkap --}}
                                        <div class="field-item">
                                            <label for="inputName" class="form-label mb-0">Nama Lengkap</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="nameHelpBlock" class="form-text mb-0 mt-0 text-gray-3">
                                                Gunakan nama yang tertera di KTP/Paspor.
                                            </div>
                                            <input type="name" value="{{ old('nama_lengkap') }}" name="nama_lengkap"
                                                id="inputName" class="form-control" aria-describedby="nameHelpBlock">
                                            @error('nama_lengkap')
                                                <div class="error-message text-danger fs-label">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- no_telp --}}
                                        <div class="field-item">
                                            <div class="uk-margin-small-bottom">
                                                <div class="d-flex d-flex-middle uk-position-relative mt-3">
                                                    <label class="uk-form-label uk-text-capitalize">Nomor Ponsel</label>
                                                    <em class="required" style="color: #f0506e;">* </em>
                                                </div>
                                                <input id="input-telephone-60857302"
                                                    class="form-control input-number input-nomor-handphone" type="tel"
                                                    vtype="phone" value="{{ old('no_telp') }}" data-field="telephone" data-validate="telephone"
                                                    name="no_telp">
                                                @error('no_telp')
                                                    <div class="error-message text-danger fs-label">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- email --}}
                                        <div class="field-item">
                                            <label for="inputEmail" class="form-label mt-3 mb-0">Email</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="emailHelpBlock" class="form-text mt-0 text-gray-3">
                                                E-tiket akan dikirim ke email kamu.
                                            </div>
                                            <input type="email" id="inputEmail" class="form-control"
                                                aria-describedby="emailHelpBlock" value="{{ old('email') }}" name="email">

                                            @error('email')
                                                <div class="error-message text-danger fs-label">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- nomor_ktp --}}
                                        <div class="field-item">
                                            <label for="inputKTP" class="form-label mt-3 mb-0">Nomor KTP</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="ktpHelpBlock" class="form-text mt-0 text-gray-3">
                                                Harap masukkan nomor KTP.
                                            </div>
                                            <input type="text" id="inputKTP" class="form-control"
                                                aria-describedby="ktpHelpBlock" value="{{ old('nomor_ktp') }}" name="nomor_ktp">
                                            @error('nomor_ktp')
                                                <div class="error-message text-danger fs-label">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin uk-margin-remove-bottom pt-3">
                        <div
                            class="alert alert-warning uk-alert-rounded uk-alert-small d-flex align-items-center d-flex-middle uk-margin-remove">
                            <i class="fa-solid fa-circle-exclamation" style="color: #faa05a;"></i>
                            <label class="ms-2 uk-text-normal uk-margin-small-left">Pastikan datamu sudah
                                benar.</label>
                        </div>
                    </div>
                </div>
                <div class="uk-section uk-padding-remove">
                    <div class="c-divider c-divider-big"></div>
                    <div id="payment-method" class="uk-section uk-padding-remove">
                        <div class="uk-section-title">
                            <h4 class="fw-bold">Metode Pembayaran</h4>
                        </div>
                        @error('payment_method')
                            <div class="error-message text-danger fs-label mt-2">{{ $message }}</div>
                        @enderror
                        <div class="payment-method">
                            <div class="payment-method-list uk-width-1-1 uk-margin" id="list-payment-id">
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative"
                                    style="order: -2;">
                                    <input class="position-absolute top-0 end-0" type="radio" id="gopay"
                                        name="payment_method" onclick="hideShowDiv(1)" value="Gopay">
                                    <img src="{{ asset('storage/image/payment/gopay.png') }}"
                                        class="uk-position-center gopay">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative"
                                    style="order: -1;">
                                    <input class="position-absolute top-0 end-0" type="radio" id="bca"
                                        name="payment_method" onclick="hideShowDiv(2)" value="Bca">
                                    <img src="{{ asset('storage/image/payment/bca.png') }}"
                                        class="uk-position-center bca">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative">
                                    <input class="position-absolute top-0 end-0" type="radio" id="bank-transfer"
                                        name="payment_method" onclick="hideShowDiv(3)" value="Bank Transfer">
                                    <img src="{{ asset('storage/image/payment/bank-transfer.jpg') }}"
                                        class="uk-position-center bank-transfer">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative">
                                    <input class="position-absolute top-0 end-0" type="radio" id="linkAja"
                                        name="payment_method" onclick="hideShowDiv(4)" value="LinkAja!">
                                    <img src="{{ asset('storage/image/payment/link-aja.png') }}"
                                        class="uk-position-center linkaja">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative">
                                    <input class="position-absolute top-0 end-0" type="radio" id="indomaret"
                                        name="payment_method" onclick="hideShowDiv(5)" value="Indomaret">
                                    <img src="{{ asset('storage/image/payment/indomaret.png') }}"
                                        class="uk-position-center indomaret">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative">
                                    <input class="position-absolute top-0 end-0" type="radio" id="shopeepayqris"
                                        name="payment_method" onclick="hideShowDiv(7)" value="Shopeepay Qris">
                                    <img src="{{ asset('storage/image/payment/shopeepayqris.png') }}"
                                        class="uk-position-center shopeepayqris">
                                </label>
                                <label
                                    class="image-radio d-flex align-items-center justify-content-center position-relative">
                                    <input class="position-absolute top-0 end-0" type="radio" id="creditcard"
                                        name="payment_method" onclick="hideShowDiv(8)" value="Credit Card">
                                    <img src="{{ asset('storage/image/payment/visa-mastercard.jpg') }}"
                                        class="uk-position-center rounded-3">
                                </label>
                            </div>

                            <div class="payment-method-info">
                                <div class="how-to" id="how-to-67" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        GoPay
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran uang elektronik melalui aplikasi Gojek
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-34" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        Virtual Account BCA
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Layanan pembayaran transfer dari rekening bank BCA melalui ATM, mobile, atau
                                        internet
                                        banking.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-18" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        Bank Transfer (Virtual Account)
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Layanan pembayaran transfer dari rekening lokal bank apapun melalui ATM Bersama /
                                        Prima
                                        /
                                        Alto.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-82" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        LinkAja
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran uang elektronik melalui aplikasi LinkAja
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-85" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        Indomaret
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Indomaret
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-87" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        ShopeePay
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran dilakukan dengan cara klik direct link ke Aplikasi Shopee.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-88" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        ShopeePay QRIS
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran dilakukan dengan cara scan QRIS menggunakan Aplikasi Shopee.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-6" style="">
                                    <p
                                        class="payment-method-info-title mb-1 fw-bold uk-margin-small-top uk-margin-small-bottom">
                                        Credit / Debt Card
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Layanan pembayaran menggunakan kartu kredit/debit yang berlogo VISA/MasterCard, dari
                                        semua
                                        Bank baik lokal maupun internasional.
                                    </p>
                                </div>
                            </div>
                            <div id="applied-promo-info" class="applied-promo-info-container"></div>
                            <div class="payment-method-loader">
                                <div class="c-spinner">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-right mt-3">
                <div class="content-right-sticky position-sticky top-0 end-0 p-4">
                    <div class="card mt-1 px-4">
                        <div class="summary mt-1">
                            <div class="summary-title">
                                <h4 class="fw-bold ">Detail Harga</h4>
                            </div>
                            <div class="summary-list">
                                <div class="summary-item d-flex justify-content-between mb-3">
                                    <label>Total Harga Tiket</label>
                                    <label> Rp {{ number_format($transaction->total_harga_detail, 0, ',', '.') }}</label>
                                </div>
                            </div>
                            <div class="summary-total py-4 d-flex justify-content-between"
                                style="border-top-style: dashed; border-bottom-style: dashed; border-top-width: 1px; border-bottom-width: 1px;">
                                <label class="fw-bold">Total Bayar</label>
                                <label id="total-price" class="formated-price fw-bold fs-5">Rp
                                    {{ number_format($transaction->total_harga_detail, 0, ',', '.') }}</label>
                            </div>
                        </div>
                        <div class="agreement">
                            <div class="agreement-container">
                                <label class="d-flex align-items-center">
                                    <div class="uk-width-auto d-flex">
                                        <input id="agreement-tnc" name="agreement_tnc"
                                            class="uk-input rounded-2 uk-checkbox uk-padding-remove uk-margin-remove no-rounded"
                                            type="checkbox">
                                    </div>
                                    <div class="uk-width-expand uk-margin-small-left ms-3 text-gray-4">
                                        <span class="uk-text-light">
                                            Saya setuju dengan <a href="/" class="text-decoration-none"
                                                target="_blank">Syarat &amp; Ketentuan</a>
                                            yang berlaku di Loket.com.
                                            <em class="text-danger">*</em>
                                        </span>
                                    </div>
                                </label>
                                @error('agreement_tnc')
                                    <div class="error-message text-danger fs-label">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" onclick="return validateForm(event)">Bayar
                            Tiket</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('storage/js/paymentMethod.js') }}"></script>
@endsection
