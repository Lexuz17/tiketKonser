<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resend Email</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4 text-primary">Verifikasi Email Anda</h1>
            <p class="lead">Anda belum melakukan verifikasi email. Mohon verifikasi email Anda untuk mengakses fitur-fitur kami.</p>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Kirim Ulang Verifikasi Email</button>
            </form>
        </div>
    </div>
</body>
</html>
