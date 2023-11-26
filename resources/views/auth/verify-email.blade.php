<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('storage/image/global/email-verify.jpg') }}" alt="" width="300px">
        <h1 class="mb-4 fw-bold">Verify your email!</h1>
        <p class="lead">Email verifikasi sudah dikirim ke email Anda. Silakan klik link/buttonnya.</p>
    </div>
</body>
</html>
