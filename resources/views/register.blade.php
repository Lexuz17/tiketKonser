<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- Custom Local Boostrap --}}
    <link rel="stylesheet" href="   {{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    {{-- Boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/61b0df038c.js" crossorigin="anonymous"></script>
    {{-- login.js --}}
    <script src="{{ asset('storage/js/register.js') }}"></script>
</head>

<body>
    <div class="auth-member my-3 mx-1">
        <div class="auth-member-brand text-center mb-5">
            <a href="/" class="">
                <img src="{{ asset('storage/image/global/logo-loket-blue.svg') }}" alt="">
            </a>
        </div>
        <div class="register container">
            <div class="row">
                <div class="auth-member-character col-md-6 d-flex justify-content-center align-items-center mt-5">
                    <div class="auth-member-figure d-flex flex-column align-items-center">
                        <div class="auth-member-figure-icon">
                            <img src="{{ asset('storage/image/global/login.svg') }}" alt="">
                        </div>
                        <div class="auth-member-figure-label text-center">
                            <div class="fw-bold mb-2">
                                Tidak lagi ketinggalan event atau konser favoritmu
                            </div>
                            <p>Gabung dan rasakan kemudahan bertransaksi dan mengelola event di Loket.</p>
                        </div>
                    </div>
                </div>
                <div class="auth-member-content col-md-6 d-flex justify-content-center align-items-center mt-4">
                    {{-- Ini tahap 1 --}}
                    <div class="container align-items-center">
                        <div class="auth-title-login text-center">
                            <div class="fs-4 fw-semibold">
                                Buat akun Loket kamu
                            </div>
                            <div class="label fs-6 text-gray-4">
                                Sudah punya akun?
                                <a href="/login" class="text-decoration-none">
                                    <span class="text-dark fw-bold">
                                        Masuk
                                    </span>
                                </a>
                            </div>
                        </div>
                        {{-- <form action="register" method="post" onsubmit="return validateForm()"> --}}
                        <form action="register" method="post">
                            @csrf
                            <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 60%">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-gray-4">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                    <div id="emailError" class="text-danger"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label text-gray-4">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                    <div id="passwordError" class="text-danger"></div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- ini tahap 2 --}}
                    <div class="container align-items-center d-none">
                        <div class="auth-title text-center">
                            <div class="fs-4 fw-semibold">
                                Lengkapi Profilmu
                            </div>
                        </div>
                        <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 65%">
                            <div class="auth-content-form personal-info">
                                <form action="register" method="post">
                                    @csrf
                                    {{-- pfp --}}
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <label for="uploadInput" class="image-profile position-relative profile-input">
                                                <img src="{{ asset('storage/image/global/prof-icon.svg') }}" alt="" class="w-100">
                                                <div class="fs-6 position-absolute bottom-0 end-0">
                                                    <div class="d-flex justify-content-center align-items-center bg-upload bg-primary rounded-circle">
                                                        <i class="fa-solid fa-arrow-up-from-bracket text-gray-1"></i>
                                                    </div>
                                                </div>
                                                <input type="file" id="uploadInput" style="display: none;" name="pfp">
                                            </label>
                                        </div>
                                    </div>
                                    {{-- noTelp --}}
                                    <div class="mb-3">
                                        <label for="phoneInput" class="form-label text-gray-4">No Ponsel</label>
                                        <em class="text-danger">*</em>
                                        <input type="tel" name="noTelp" class="form-control" id="phoneInput" aria-describedby="phoneHelp">
                                        <div id="phoneError" class="text-danger"></div>
                                    </div>
                                    {{-- firstName--}}
                                    <div class="mb-3">
                                        <label for="firstNameInput" class="form-label text-gray-4 mb-0">Nama Depan</label>
                                        <em class="text-danger">*</em>
                                        <div class="fs-label text-gray-3 mb-2">
                                            Sesuai di KTP/Passpor/SIM
                                        </div>
                                        <input type="text" class="form-control" id="firstNameInput" name="firstName" aria-describedby="firstNameHelp">
                                        <div id="firstNameError" class="text-danger"></div>
                                    </div>
                                    {{-- lastName --}}
                                    <div class="mb-3">
                                        <label for="lastNameInput" class="form-label text-gray-4">Nama Belakang</label>
                                        <input type="text" class="form-control" id="lastNameInput" name="lastName" aria-describedby="lastNameHelp">
                                    </div>
                                    {{-- dob --}}
                                    <div class="mb-3">
                                        <label for="dobInput" class="form-label text-gray-4">Tanggal Lahir</label>
                                        <em class="text-danger">*</em>
                                        <input type="date" class="form-control" id="dobInput" name="dob">
                                        <div id="dobError" class="text-danger"></div>
                                    </div>
                                    {{-- Gender --}}
                                    <div class="mb-3">
                                        <label class="form-label text-gray-4">Jenis Kelamin</label>
                                        <em class="text-danger">*</em>
                                        <div class="gender-list d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="maleRadio" value="male">
                                                <label class="form-check-label" for="maleRadio">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="female">
                                                <label class="form-check-label" for="femaleRadio">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div id="genderError" class="text-danger"></div>
                                    </div>
                                    {{-- button --}}
                                    <a href="/" onclick="validateForm()">
                                        <div class="btn btn-primary w-100">
                                            Simpan
                                        </div>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
