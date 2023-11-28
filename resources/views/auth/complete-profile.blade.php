<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete Your Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4 text-primary">Lengkapi Profil Anda</h1>
            <p class="lead">Anda belum melengkapi profil. Mohon lengkapi profil Anda untuk mengakses fitur-fitur kami.</p>
            <form action="{{ route('addProfile') }}" method="get">
                <button type="submit" class="btn btn-primary btn-lg">Lengkapi Profil</button>
            </form>
        </div>
    </div>
</body>
</html>
