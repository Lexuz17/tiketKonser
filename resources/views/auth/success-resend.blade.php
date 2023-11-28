<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email Berhasil</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <img src="{{ asset('storage/image/global/email-success.svg') }}" alt="Email Icon" width="450px" class="img-fluid mb-4" >
            <h1 class="display-4 text-primary">Verifikasi Email Anda Telah Berhasil</h1>
            <p class="lead">Anda dapat mengklik tombol/link yang tertera di email untuk menyelesaikan proses verifikasi.</p>
            <p class="mb-4">Jika Anda masih belum mendapatkan email verifikasi, harap periksa folder Spam atau Junk. Jika Anda masih mengalami masalah, Anda dapat mengirim ulang email verifikasi dengan menekan tombol di bawah ini.</p>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Kirim Ulang Verifikasi Email</button>
            </form>
        </div>
    </div>
</body>
</html>
