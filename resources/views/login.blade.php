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
    <link rel="shortcut icon" href="{{ asset('storage/image/global/logo-icon.png') }}" type="x-icon">
    {{-- Boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/61b0df038c.js" crossorigin="anonymous"></script>
    {{-- login.js --}}
    <script src="{{ asset('storage/js/login.js') }}"></script>
</head>

<body>
    <div class="auth-member my-3 mx-1">
        <div class="auth-member-brand text-center mb-5">
            <a href="/" class="">
                <img src="{{ asset('storage/image/global/logo-purple.png') }}" width="122px" alt="">
            </a>
        </div>
        <div class="container">
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
                            <p>Gabung dan rasakan kemudahan bertransaksi dan mengelola event di KonserKita.</p>
                        </div>
                    </div>
                </div>
                <div class="auth-member-content col-md-6 d-flex justify-content-center align-items-center mt-5">
                    <div class="container align-items-center">
                        <div class="auth-title-login text-center">
                            <div class="fs-4 fw-semibold">
                                Masuk ke akunmu
                            </div>
                            <div class="label fs-6 text-gray-4">
                                Tidak punya akun KonserKita?
                                <a href="/register" class="text-decoration-none">
                                    <span class="text-dark fw-bold">
                                        Daftar
                                    </span>
                                </a>
                            </div>
                        </div>
                        <form action="/login" method="post">
                            @csrf
                            <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 60%">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-gray-4">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                                    <div id="emailError" class="text-danger"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label text-gray-4">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                    <div id="passwordError" class="text-danger"></div>
                                </div>

                                @if (session('status') == 'error')
                                    <div class="mb-3">
                                        <div class="alert alert-danger">
                                            {{ session('message') }}
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary w-100">
                                    Masuk
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
