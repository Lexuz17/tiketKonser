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

                        <form action="register" method="post">
                            @csrf
                            <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 60%">

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-gray-4">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        aria-describedby="emailHelp" value="{{ old('email') }}">
                                    <div id="emailError" class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label text-gray-4">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                    <div id="passwordError" class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="exampleInputPassword2" class="form-label text-gray-4">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
