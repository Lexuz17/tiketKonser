@extends('layout.master')

@section('title', 'transaction')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Transaction</title>

        <style>
            .wrapper {
                display: flex;
                flex-direction: row;
                /* justify-content: center;
                                                        align-items: center; */
            }

            .card1 {
                border: 1px solid #ccc;
                border-radius: 8px;
                /* overflow: hidden; */
                margin-bottom: 45px;
                margin-right: 1%;
                padding: 5px;
            }

            .card2 {
                border: 1px solid #ccc;
                border-radius: 8px;
                /* overflow: hidden; */
                margin-bottom: 45px;
                margin-right: 1%;
                padding: 5px;
            }

            .personal-form {
                padding: 5px;
            }

            .card-content {
                padding: 10px;
                padding-bottom: 2px;
            }

            .card-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }

            .event-image img {
                width: 260px;
                height: auto;
                border-radius: 8px;
                display: block;
            }

            .event-details {
                flex: 1;
                margin-left: 20px;
            }

            .event-info-item {
                display: flex;
                align-items: center;
                margin-bottom: 5px;
            }

            .event-info-item i {
                margin-right: 5px;
                /* Tambahkan style ikon sesuai kebutuhan */
            }

            .ticket-type {
                display: flex;
                align-items: center;
            }

            .ticket-detail .price-label {
                padding-right: 25px;
            }

            .ticket-detail span {
                margin-right: 10px;
            }

            .ticket-details .formated-price {
                margin-right: 75px;
            }

            .ticket-details .amount {
                margin-right: 10px;
            }

            .uk-position-relative {
                position: relative !important;
            }

            .uk-width-expand {
                -webkit-box-flex: 1;
                -ms-flex: 1;
                flex: 1;
                min-width: 1px;
            }

            .personal-form .phone-container .c-input {
                border-radius: 0 8px 8px 0;
            }

            .c-input {
                width: 100%;
                display: flex;
                align-items: center;
                padding: 12px 16px;
                border: 1px solid #e8e8e8;
                border-radius: 8px;
                font-size: .875rem;
                color: #151416;
                background-color: #fff;
                box-sizing: border-box;
                font-family: BasierCircle, sans-serif !important;
                line-height: 22px;
            }

            .c-divider-big {
                height: 7px;
                background-color: #f5f7fa;
                width: 58%;
            }

            @media screen and (min-width: 680px) .content-left .payment-method-list {
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 24px;
            }

            .image-radio {
                border: 2px solid #ccc;
                border-radius: 10px;
                margin: 25px;
                padding: 10px;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .image-radio:hover {
                border-color: #555;
                transform: translateY(-5px);
            }

            .payment-container {
                display: block;
                position: relative;
            }

            .payment-container img {
                max-width: 100%;
                height: auto;
                display: block;
                margin: 0 auto;
            }

            .phone-wrapper {
                display: flex;
                flex-direction: row;
            }

            .personal-form .phone-container .c-select {
                border-right-width: 0;
                border-radius: 8px 0 0 8px;
            }

            .c-select {
                border-radius: 8px;
                position: relative;
                padding: 12px 42px 12px 16px;
                border: 1px solid #e8e8e8;
                background-color: #fff;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-image: url(data:image/svg+xml;charset=utf-8;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPScxNicgaGVpZ2h0PScxNicgZmlsbD0nbm9uZSc+PHBhdGggZmlsbC1ydWxlPSdldmVub2RkJyBjbGlwLXJ1bGU9J2V2ZW5vZGQnIGQ9J00xMS41MjYgNS41M2EuNjY3LjY2NyAwIDAxLjk0OC45MzlsLTMuOTI4IDMuOTY5YS43NjYuNzY2IDAgMDEtMS4wOS4wMDFsLTMuOTMtMy45N2EuNjY3LjY2NyAwIDExLjk0OC0uOTM4TDggOS4wOTRsMy41MjYtMy41NjN6JyBmaWxsPScjOEU5MTlCJy8+PC9zdmc+);
                background-repeat: no-repeat, repeat;
                background-position: right 12px top 50%, 0 0;
                background-size: 24px auto, 100%;
                color: #151416;
                cursor: pointer;
                outline: none;
                font-family: BasierCircle, sans-serif !important;
                line-height: 22px;
                font-size: .875rem;
            }

            /* .c-input {
                width: 216%;
                display: flex;
                align-items: center;
                padding: 12px 16px;
                border: 1px solid #e8e8e8;
                border-radius: 8px;
                font-size: .875rem;
                color: #151416;
                background-color: #fff;
                box-sizing: border-box;
                font-family: BasierCircle, sans-serif !important;
                line-height: 23px;
            } */

            //Warning
            .uk-alert-warning {
                background-color: #fff9e0;
            }

            .uk-alert-border-radius,
            .uk-alert-rounded {
                border-radius: 8px;
            }

            .uk-alert {
                position: relative;
                margin-bottom: 20px;
                padding: 15px 28px 15px 22px;
                background: #fffe90;
                color: #666;
            }

            .uk-margin-remove {
                margin: 0 !important;
            }

            //Content Right
            @media screen and (min-width: 1000px) .content-right-sticky .card {
                padding: 24px;
                box-shadow: 0 1px 3px #fff;
                box-shadow: 0 4px 8px rgba(30, 44, 106, .1);
                border-radius: 8px;
            }

            .content-right-sticky .card {
                padding: 10px 0 0;
                box-shadow: unset;
                display: grid;
                grid-template-rows: 1fr;
                grid-row-gap: 24px;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="content-left">
                <div class="uk-section uk-padding-remove">
                    <div class="uk-section-title">
                        <h4 class="fw-bold">Detail Pemesanan</h4>
                    </div>
                    <div class="card1">
                        <div class="card-content">
                            <div class="card-row">
                                <div class="event-image">
                                    <img src="https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/banner/20231114103230_6552ea4e55d52.jpg"
                                        alt="STEVE AOKI'S CAKE PARTY">
                                </div>
                                <div class="event-details">
                                    <p class="fs-6 fw-bold">STEVE AOKI'S CAKE PARTY</p>
                                    <div class="event-info">
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-calendar-days" style="color: #9e9e9e;"></i>
                                            <span>10 Dec 2023 - 10 Dec 2023</span>
                                        </div>
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-clock" style="color: #9e9e9e;"></i>
                                            <span>17:00 - 23:00 WIB</span>
                                        </div>
                                        <div class="event-info-item">
                                            <i class="fa-solid fa-location-dot" style="color: #9e9e9e;"></i>
                                            <span>Phantom, PIK 2, Banten</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="card-row">
                                <div class="ticket-type">
                                    <span>Jenis Tiket</span>
                                </div>
                                <div class="ticket-detail">
                                    <span class="price-label">Harga</span>
                                    <span>Jumlah</span>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="card-row">
                                <div class="ticket-type">
                                    <i class="fa-solid fa-ticket fa-2x" style="color: #3ba6e8; margin-right:15px;"></i>
                                    <span>Entrance Fee - Presale 3</span>
                                </div>
                                <div class="ticket-details" style="display: flex; align-items: center;">
                                    <span class="formated-price"><b>Rp 1.294.000</b></span>
                                    <span class="amount">x1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-section uk-padding-remove">
                    <div class="uk-section-title">
                        <h4 class="fw-bold">
                            Detail Pemesan
                        </h4>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="personal-form">
                                <div id="order-detail-60845666" class="single-form">
                                    <div id="attendee_input_60845666" class="field-list">
                                        <div class="field-item m-auto ">
                                            <label for="inputName" class="form-label mb-0">Nama Lengkap</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="nameHelpBlock" class="form-text mb-0 mt-0">
                                                Gunakan nama yang tertera di KTP/Paspor.
                                            </div>
                                            <input type="name" id="inputName" class="form-control form-control-xl"
                                                aria-describedby="nameHelpBlock">
                                        </div>
                                        <div class="field-item">
                                            <div class="uk-margin-small-bottom">
                                                <div class="uk-flex uk-flex-middle uk-position-relative mt-3">
                                                    <label class="uk-form-label uk-text-capitalize">Nomor Ponsel</label>
                                                    <em class="required" style="color: #f0506e;">* </em>
                                                </div>
                                                <div class="uk-flex">
                                                    <label class="gray uk-text-small uk-flex uk-flex-middle">
                                                        <div class="uk-width-auto">
                                                            <input id="receive_wa_notif" name="receive_wa_notif"
                                                                class="uk-checkbox" type="checkbox">
                                                            <label id="notifHelpBlock" class="form-text">
                                                                Kirim notifikasi pesanan via WhatsApp
                                                            </label>
                                                        </div>
                                                    </label>
                                                    <span class="uk-margin-small-left tooltip-info"
                                                        uk-tooltip="Terdapat biaya tambahan yang disematkan pada biaya layanan."
                                                        style="font-size: 12px;" title="" aria-expanded="false">
                                                        <i class="fa-solid fa-circle-info" style="color: #216ef2;"></i>
                                                    </span>
                                                </div>

                                                <div class="phone-wrapper">
                                                    <select name="country_code" id="country_code-60857302"
                                                        class="c-select">
                                                        <option value="+93">🇦🇫 +93</option>
                                                        <option value="+358">🇦🇽 +358</option>
                                                        <option value="+355">🇦🇱 +355</option>
                                                        <option value="+213">🇩🇿 +213</option>
                                                        <option value="+1684">🇦🇸 +1684</option>
                                                        <option value="+376">🇦🇩 +376</option>
                                                        <option value="+244">🇦🇴 +244</option>
                                                        <option value="+1264">🇦🇮 +1264</option>
                                                        <option value="+672">🇦🇶 +672</option>
                                                        <option value="+1268">🇦🇬 +1268</option>
                                                        <option value="+54">🇦🇷 +54</option>
                                                        <option value="+374">🇦🇲 +374</option>
                                                        <option value="+297">🇦🇼 +297</option>
                                                        <option value="+61">🇦🇺 +61</option>
                                                        <option value="+43">🇦🇹 +43</option>
                                                        <option value="+994">🇦🇿 +994</option>
                                                        <option value="+1242">🇧🇸 +1242</option>
                                                        <option value="+973">🇧🇭 +973</option>
                                                        <option value="+880">🇧🇩 +880</option>
                                                        <option value="+1246">🇧🇧 +1246</option>
                                                        <option value="+375">🇧🇾 +375</option>
                                                        <option value="+32">🇧🇪 +32</option>
                                                        <option value="+501">🇧🇿 +501</option>
                                                        <option value="+229">🇧🇯 +229</option>
                                                        <option value="+1441">🇧🇲 +1441</option>
                                                        <option value="+975">🇧🇹 +975</option>
                                                        <option value="+591">🇧🇴 +591</option>
                                                        <option value="+387">🇧🇦 +387</option>
                                                        <option value="+267">🇧🇼 +267</option>
                                                        <option value="+47">🇧🇻 +47</option>
                                                        <option value="+55">🇧🇷 +55</option>
                                                        <option value="+246">🇮🇴 +246</option>
                                                        <option value="+673">🇧🇳 +673</option>
                                                        <option value="+359">🇧🇬 +359</option>
                                                        <option value="+226">🇧🇫 +226</option>
                                                        <option value="+257">🇧🇮 +257</option>
                                                        <option value="+855">🇰🇭 +855</option>
                                                        <option value="+237">🇨🇲 +237</option>
                                                        <option value="+1">🇨🇦 +1</option>
                                                        <option value="+238">🇨🇻 +238</option>
                                                        <option value="+ 345">🇰🇾 + 345</option>
                                                        <option value="+236">🇨🇫 +236</option>
                                                        <option value="+235">🇹🇩 +235</option>
                                                        <option value="+56">🇨🇱 +56</option>
                                                        <option value="+86">🇨🇳 +86</option>
                                                        <option value="+61">🇨🇽 +61</option>
                                                        <option value="+61">🇨🇨 +61</option>
                                                        <option value="+57">🇨🇴 +57</option>
                                                        <option value="+269">🇰🇲 +269</option>
                                                        <option value="+242">🇨🇬 +242</option>
                                                        <option value="+243">🇨🇩 +243</option>
                                                        <option value="+682">🇨🇰 +682</option>
                                                        <option value="+506">🇨🇷 +506</option>
                                                        <option value="+225">🇨🇮 +225</option>
                                                        <option value="+385">🇭🇷 +385</option>
                                                        <option value="+53">🇨🇺 +53</option>
                                                        <option value="+357">🇨🇾 +357</option>
                                                        <option value="+420">🇨🇿 +420</option>
                                                        <option value="+45">🇩🇰 +45</option>
                                                        <option value="+253">🇩🇯 +253</option>
                                                        <option value="+1767">🇩🇲 +1767</option>
                                                        <option value="+1849">🇩🇴 +1849</option>
                                                        <option value="+593">🇪🇨 +593</option>
                                                        <option value="+20">🇪🇬 +20</option>
                                                        <option value="+503">🇸🇻 +503</option>
                                                        <option value="+240">🇬🇶 +240</option>
                                                        <option value="+291">🇪🇷 +291</option>
                                                        <option value="+372">🇪🇪 +372</option>
                                                        <option value="+251">🇪🇹 +251</option>
                                                        <option value="+500">🇫🇰 +500</option>
                                                        <option value="+298">🇫🇴 +298</option>
                                                        <option value="+679">🇫🇯 +679</option>
                                                        <option value="+358">🇫🇮 +358</option>
                                                        <option value="+33">🇫🇷 +33</option>
                                                        <option value="+594">🇬🇫 +594</option>
                                                        <option value="+689">🇵🇫 +689</option>
                                                        <option value="+262">🇹🇫 +262</option>
                                                        <option value="+241">🇬🇦 +241</option>
                                                        <option value="+220">🇬🇲 +220</option>
                                                        <option value="+995">🇬🇪 +995</option>
                                                        <option value="+49">🇩🇪 +49</option>
                                                        <option value="+233">🇬🇭 +233</option>
                                                        <option value="+350">🇬🇮 +350</option>
                                                        <option value="+30">🇬🇷 +30</option>
                                                        <option value="+299">🇬🇱 +299</option>
                                                        <option value="+1473">🇬🇩 +1473</option>
                                                        <option value="+590">🇬🇵 +590</option>
                                                        <option value="+1671">🇬🇺 +1671</option>
                                                        <option value="+502">🇬🇹 +502</option>
                                                        <option value="+44">🇬🇬 +44</option>
                                                        <option value="+224">🇬🇳 +224</option>
                                                        <option value="+245">🇬🇼 +245</option>
                                                        <option value="+592">🇬🇾 +592</option>
                                                        <option value="+509">🇭🇹 +509</option>
                                                        <option value="+0">🇭🇲 +0</option>
                                                        <option value="+379">🇻🇦 +379</option>
                                                        <option value="+504">🇭🇳 +504</option>
                                                        <option value="+852">🇭🇰 +852</option>
                                                        <option value="+36">🇭🇺 +36</option>
                                                        <option value="+354">🇮🇸 +354</option>
                                                        <option value="+91">🇮🇳 +91</option>
                                                        <option value="+62" selected="">🇮🇩 +62</option>
                                                        <option value="+98">🇮🇷 +98</option>
                                                        <option value="+964">🇮🇶 +964</option>
                                                        <option value="+353">🇮🇪 +353</option>
                                                        <option value="+44">🇮🇲 +44</option>
                                                        <option value="+972">🇮🇱 +972</option>
                                                        <option value="+39">🇮🇹 +39</option>
                                                        <option value="+1876">🇯🇲 +1876</option>
                                                        <option value="+81">🇯🇵 +81</option>
                                                        <option value="+44">🇯🇪 +44</option>
                                                        <option value="+962">🇯🇴 +962</option>
                                                        <option value="+7">🇰🇿 +7</option>
                                                        <option value="+254">🇰🇪 +254</option>
                                                        <option value="+686">🇰🇮 +686</option>
                                                        <option value="+850">🇰🇵 +850</option>
                                                        <option value="+82">🇰🇷 +82</option>
                                                        <option value="+383">🇽🇰 +383</option>
                                                        <option value="+965">🇰🇼 +965</option>
                                                        <option value="+996">🇰🇬 +996</option>
                                                        <option value="+856">🇱🇦 +856</option>
                                                        <option value="+371">🇱🇻 +371</option>
                                                        <option value="+961">🇱🇧 +961</option>
                                                        <option value="+266">🇱🇸 +266</option>
                                                        <option value="+231">🇱🇷 +231</option>
                                                        <option value="+218">🇱🇾 +218</option>
                                                        <option value="+423">🇱🇮 +423</option>
                                                        <option value="+370">🇱🇹 +370</option>
                                                        <option value="+352">🇱🇺 +352</option>
                                                        <option value="+853">🇲🇴 +853</option>
                                                        <option value="+389">🇲🇰 +389</option>
                                                        <option value="+261">🇲🇬 +261</option>
                                                        <option value="+265">🇲🇼 +265</option>
                                                        <option value="+60">🇲🇾 +60</option>
                                                        <option value="+960">🇲🇻 +960</option>
                                                        <option value="+223">🇲🇱 +223</option>
                                                        <option value="+356">🇲🇹 +356</option>
                                                        <option value="+692">🇲🇭 +692</option>
                                                        <option value="+596">🇲🇶 +596</option>
                                                        <option value="+222">🇲🇷 +222</option>
                                                        <option value="+230">🇲🇺 +230</option>
                                                        <option value="+262">🇾🇹 +262</option>
                                                        <option value="+52">🇲🇽 +52</option>
                                                        <option value="+691">🇫🇲 +691</option>
                                                        <option value="+373">🇲🇩 +373</option>
                                                        <option value="+377">🇲🇨 +377</option>
                                                        <option value="+976">🇲🇳 +976</option>
                                                        <option value="+382">🇲🇪 +382</option>
                                                        <option value="+1664">🇲🇸 +1664</option>
                                                        <option value="+212">🇲🇦 +212</option>
                                                        <option value="+258">🇲🇿 +258</option>
                                                        <option value="+95">🇲🇲 +95</option>
                                                        <option value="+264">🇳🇦 +264</option>
                                                        <option value="+674">🇳🇷 +674</option>
                                                        <option value="+977">🇳🇵 +977</option>
                                                        <option value="+31">🇳🇱 +31</option>
                                                        <option value="+599"> +599</option>
                                                        <option value="+687">🇳🇨 +687</option>
                                                        <option value="+64">🇳🇿 +64</option>
                                                        <option value="+505">🇳🇮 +505</option>
                                                        <option value="+227">🇳🇪 +227</option>
                                                        <option value="+234">🇳🇬 +234</option>
                                                        <option value="+683">🇳🇺 +683</option>
                                                        <option value="+672">🇳🇫 +672</option>
                                                        <option value="+1670">🇲🇵 +1670</option>
                                                        <option value="+47">🇳🇴 +47</option>
                                                        <option value="+968">🇴🇲 +968</option>
                                                        <option value="+92">🇵🇰 +92</option>
                                                        <option value="+680">🇵🇼 +680</option>
                                                        <option value="+970">🇵🇸 +970</option>
                                                        <option value="+507">🇵🇦 +507</option>
                                                        <option value="+675">🇵🇬 +675</option>
                                                        <option value="+595">🇵🇾 +595</option>
                                                        <option value="+51">🇵🇪 +51</option>
                                                        <option value="+63">🇵🇭 +63</option>
                                                        <option value="+64">🇵🇳 +64</option>
                                                        <option value="+48">🇵🇱 +48</option>
                                                        <option value="+351">🇵🇹 +351</option>
                                                        <option value="+1939">🇵🇷 +1939</option>
                                                        <option value="+974">🇶🇦 +974</option>
                                                        <option value="+40">🇷🇴 +40</option>
                                                        <option value="+7">🇷🇺 +7</option>
                                                        <option value="+250">🇷🇼 +250</option>
                                                        <option value="+262">🇷🇪 +262</option>
                                                        <option value="+590">🇧🇱 +590</option>
                                                        <option value="+290">🇸🇭 +290</option>
                                                        <option value="+1869">🇰🇳 +1869</option>
                                                        <option value="+1758">🇱🇨 +1758</option>
                                                        <option value="+590">🇲🇫 +590</option>
                                                        <option value="+508">🇵🇲 +508</option>
                                                        <option value="+1784">🇻🇨 +1784</option>
                                                        <option value="+685">🇼🇸 +685</option>
                                                        <option value="+378">🇸🇲 +378</option>
                                                        <option value="+239">🇸🇹 +239</option>
                                                        <option value="+966">🇸🇦 +966</option>
                                                        <option value="+221">🇸🇳 +221</option>
                                                        <option value="+381">🇷🇸 +381</option>
                                                        <option value="+248">🇸🇨 +248</option>
                                                        <option value="+232">🇸🇱 +232</option>
                                                        <option value="+65">🇸🇬 +65</option>
                                                        <option value="+421">🇸🇰 +421</option>
                                                        <option value="+386">🇸🇮 +386</option>
                                                        <option value="+677">🇸🇧 +677</option>
                                                        <option value="+252">🇸🇴 +252</option>
                                                        <option value="+27">🇿🇦 +27</option>
                                                        <option value="+211">🇸🇸 +211</option>
                                                        <option value="+500">🇬🇸 +500</option>
                                                        <option value="+34">🇪🇸 +34</option>
                                                        <option value="+94">🇱🇰 +94</option>
                                                        <option value="+249">🇸🇩 +249</option>
                                                        <option value="+597">🇸🇷 +597</option>
                                                        <option value="+47">🇸🇯 +47</option>
                                                        <option value="+268">🇸🇿 +268</option>
                                                        <option value="+46">🇸🇪 +46</option>
                                                        <option value="+41">🇨🇭 +41</option>
                                                        <option value="+963">🇸🇾 +963</option>
                                                        <option value="+886">🇹🇼 +886</option>
                                                        <option value="+992">🇹🇯 +992</option>
                                                        <option value="+255">🇹🇿 +255</option>
                                                        <option value="+66">🇹🇭 +66</option>
                                                        <option value="+670">🇹🇱 +670</option>
                                                        <option value="+228">🇹🇬 +228</option>
                                                        <option value="+690">🇹🇰 +690</option>
                                                        <option value="+676">🇹🇴 +676</option>
                                                        <option value="+1868">🇹🇹 +1868</option>
                                                        <option value="+216">🇹🇳 +216</option>
                                                        <option value="+90">🇹🇷 +90</option>
                                                        <option value="+993">🇹🇲 +993</option>
                                                        <option value="+1649">🇹🇨 +1649</option>
                                                        <option value="+688">🇹🇻 +688</option>
                                                        <option value="+256">🇺🇬 +256</option>
                                                        <option value="+380">🇺🇦 +380</option>
                                                        <option value="+971">🇦🇪 +971</option>
                                                        <option value="+44">🇬🇧 +44</option>
                                                        <option value="+1">🇺🇸 +1</option>
                                                        <option value="+598">🇺🇾 +598</option>
                                                        <option value="+998">🇺🇿 +998</option>
                                                        <option value="+678">🇻🇺 +678</option>
                                                        <option value="+58">🇻🇪 +58</option>
                                                        <option value="+84">🇻🇳 +84</option>
                                                        <option value="+1284">🇻🇬 +1284</option>
                                                        <option value="+1340">🇻🇮 +1340</option>
                                                        <option value="+681">🇼🇫 +681</option>
                                                        <option value="+967">🇾🇪 +967</option>
                                                        <option value="+260">🇿🇲 +260</option>
                                                        <option value="+263">🇿🇼 +263</option>
                                                    </select>
                                                    <input id="input-telephone-60857302"
                                                        class="c-input input-number input-nomor-handphone"
                                                        type="tel" vtype="phone" data-field="telephone"
                                                        data-validate="telephone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field-item ">
                                            <label for="inputEmail" class="form-label mt-3 mb-0">Email</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="nameHelpBlock" class="form-text mt-0">
                                                E-tiket akan dikirim ke email kamu.
                                            </div>
                                            <input type="email" id="inputEmail" class="form-control"
                                                aria-describedby="emailHelpBlock">
                                        </div>
                                        <div class="field-item ">
                                            <label for="inputKTP" class="form-label mt-3 mb-0">Nomor KTP</label>
                                            <em class="required" style="color: #f0506e;">* </em>
                                            <div id="ktpHelpBlock" class="form-text mt-0">
                                                Harap masukkan nomor KTP.
                                            </div>
                                            <input type="KTP" id="inputKTP" class="form-control"
                                                aria-describedby="ktpHelpBlock">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-margin uk-margin-remove-bottom">
                        <div
                            class="uk-alert uk-alert-warning uk-alert-rounded uk-alert-small uk-flex uk-flex-middle uk-margin-remove">
                            <i class="fa-solid fa-circle-exclamation" style="color: #e7d508;"></i>
                            <label class="uk-text-normal uk-margin-small-left">Pastikan datamu sudah
                                benar.</label>
                        </div>
                    </div>
                </div>
                <div class="uk-section uk-padding-remove">
                    <div class="c-divider c-divider-big"></div>
                    <div id="payment-method" class="uk-section uk-padding-remove">
                        <div class="uk-section-title mt-">
                            <h3>Metode Pembayaran</h3>
                        </div>
                        <div class="payment-method">
                            <form class="payment-method-list uk-width-1-1 uk-margin" id="list-payment-id">
                                <label class="image-radio" style="order:-2;" data-payment-id="67">
                                    <input type="hidden" id="fee-67" value="0">
                                    <input type="radio" id="lsa-payment-67" name="payment-method" value="67">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="\storage\app\public\image\home\PaymentMethod\method1.jpg"
                                            class="uk-position-center gopay">
                                    </span>
                                    <input type="hidden" class="payment-name" name="67" value="Gopay">
                                </label> <label class="image-radio" style="order:-1;" data-payment-id="34">
                                    <input type="hidden" id="fee-34" value="5000">
                                    <input type="radio" id="lsa-payment-34" name="payment-method" value="34">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/bca.png" class="uk-position-center bca">
                                    </span>
                                    <input type="hidden" class="payment-name" name="34" value="BCA">
                                </label> <label class="image-radio" data-payment-id="18">
                                    <input type="hidden" id="fee-18" value="5000">
                                    <input type="radio" id="lsa-payment-18" name="payment-method" value="18">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/bank-transfer.jpg"
                                            class="uk-position-center bank transfer">
                                    </span>
                                    <input type="hidden" class="payment-name" name="18" value="Bank Transfer">
                                </label> <label class="image-radio" data-payment-id="82">
                                    <input type="hidden" id="fee-82" value="3000">
                                    <input type="radio" id="lsa-payment-82" name="payment-method" value="82">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/logo-linkaja.png" class="uk-position-center linkaja">
                                    </span>
                                    <input type="hidden" class="payment-name" name="82" value="Linkaja">
                                </label> <label class="image-radio" data-payment-id="85">
                                    <input type="hidden" id="fee-85" value="5000">
                                    <input type="radio" id="lsa-payment-85" name="payment-method" value="85">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/indomaret-v2.png" class="uk-position-center indomaret">
                                    </span>
                                    <input type="hidden" class="payment-name" name="85" value="Indomaret">
                                </label> <label class="image-radio uk-hidden" id="payment_shopee_app_span"
                                    data-payment-id="87">
                                    <input type="hidden" id="fee-87" value="0">
                                    <input type="radio" id="lsa-payment-87" name="payment-method" value="87">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/logo-shopeepay.png" class="uk-position-center shopeepay">
                                    </span>
                                    <input type="hidden" class="payment-name" name="87" value="Shopeepay">
                                </label> <label class="image-radio" data-payment-id="88">
                                    <input type="hidden" id="fee-88" value="0">
                                    <input type="radio" id="lsa-payment-88" name="payment-method" value="88">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/logo-shopeepay-qris.png?v=1"
                                            class="uk-position-center shopeepay">
                                    </span>
                                    <input type="hidden" class="payment-name" name="88" value="Shopeepay">
                                </label> <label class="image-radio" style="order:1;" data-payment-id="6">
                                    <input type="hidden" id="fee-6" value="5000">
                                    <input type="radio" id="lsa-payment-6" name="payment-method" value="6">
                                    <span class="uk-position-relative payment-container">
                                        <div class="payment-promo-badge coupon"></div>
                                        <span class="payment-checked-info"></span>
                                        <img src="/images/bank/visa-mastercard-logo.jpg"
                                            class="uk-position-center credit card">
                                    </span>
                                    <input type="hidden" class="payment-name" name="6" value="Credit Card">
                                </label>
                            </form>
                            <div class="payment-method-info">
                                <div class="how-to" id="how-to-67" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        GoPay
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran uang elektronik melalui aplikasi Gojek
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-34" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        Virtual Account BCA
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Layanan pembayaran transfer dari rekening bank BCA melalui ATM, mobile, atau
                                        internet
                                        banking.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-18" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
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
                                <div class="how-to" id="how-to-82" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        LinkAja
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran uang elektronik melalui aplikasi LinkAja
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-85" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        Indomaret
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Indomaret
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-87" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        ShopeePay
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran dilakukan dengan cara klik direct link ke Aplikasi Shopee.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-88" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
                                        ShopeePay QRIS
                                    </p>
                                    <p
                                        class="payment-method-info-description uk-margin-remove-top uk-margin-remove-bottom gray uk-text-small line-height-small">
                                        Pembayaran dilakukan dengan cara scan QRIS menggunakan Aplikasi Shopee.
                                    </p>
                                </div>
                                <div class="how-to" id="how-to-6" style="display:none;">
                                    <p class="payment-method-info-title uk-margin-small-top uk-margin-small-bottom">
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
                        <div id="error-payment-id" class="error uk-text-small" style="display: none;"></div>
                    </div>
                </div>
            </div>
            <div class="content-right mt-2">
                <div class="content-right-sticky position-sticky top-0 end-0 p-4">
                    <div class="card mt-1 px-4">
                        <div class="summary mt-1">
                            <div class="summary-title">
                                <h3>Detail Harga</h3>
                            </div>
                            <div class="summary-list">
                                <div class="summary-item">
                                    <label>Total Harga Tiket</label>
                                    <label> Rp 1.294.000</label>
                                </div>
                                <div class="summary-item">
                                    <label>Biaya Layanan</label>
                                    <label id="convenience-fee" class="formated-price"><b>Rp 0</b></label>
                                </div>
                                <div id="promo-discount-wrapper" class="summary-item uk-hidden">
                                    <label>Diskon</label>
                                    <label id="promo-discount-value">0</label>
                                </div>
                            </div>
                            <div class="summary-total">
                                <label>Total Bayar</label>
                                <label id="total-price" class="formated-price">Rp 1.294.000</label>
                            </div>
                        </div>
                        <div class="agreement">
                            <div class="agreement-container">
                                <label class="uk-flex uk-flex-middle">
                                    <div class="uk-width-auto uk-flex">
                                        <input id="agreement-tnc" name="agreement-tnc"
                                            class="uk-input uk-checkbox uk-padding-remove uk-margin-remove no-rounded"
                                            type="checkbox">
                                    </div>
                                    <div class="uk-width-expand uk-margin-small-left">
                                        <span class="uk-text-light">
                                            Saya setuju dengan <a href="/terms" target="_blank">Syarat &amp;
                                                Ketentuan</a>
                                            yang berlaku di Loket.com.
                                            <em>*</em>
                                        </span>
                                    </div>
                                </label>
                                <div id="error-tnc" class="alert-info uk-margin-small-top uk-text-small">
                                    Syarat dan ketentuan harus disetujui
                                </div>
                            </div>
                        </div>
                        <div class="submit-checkout mb-2">
                            <div class="submit-checkout-container">
                                <div class="submit-checkout-summary">
                                    <label>Total 1 tiket</label>
                                    <label id="total-price-mobile" class="formated-price">Rp 1.294.000</label>
                                </div>
                                <button id="confirm-payment"
                                    class="c-button c-button-primary submit-checkout-button uk-width-1-1">Bayar
                                    Tiket</button>
                            </div>
                            <div class="submit-checkout-loader">
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ref:https://www.loket.com/order/yry/personal-information --}}
    </body>

    </html>
@endsection
