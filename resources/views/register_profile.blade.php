<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new user</title>
    {{-- Custom Local Boostrap --}}
    <link rel="shortcut icon" href="{{ asset('storage/image/global/logo-icon.png') }}" type="x-icon">
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
    {{-- {{ $user_profile }} --}}
    <div class="auth-member my-3 mx-1">
        <div class="auth-member-brand text-center mb-5">
            <a href="/" class="">
                <img src="{{ asset('storage/image/global/logo-purple.png') }}" width="122px" alt="">
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
                                Tidak lagi ketinggalan konser favoritmu
                            </div>
                            <p>Gabung dan rasakan kemudahan bertransaksi dan mengelola event di KonserKita.</p>
                        </div>
                    </div>
                </div>
                <div class="auth-member-content col-md-6 d-flex justify-content-center align-items-center mt-4">
                    {{-- ini tahap 2 --}}
                    <div class="container align-items-center">
                        <div class="auth-title text-center">
                            <div class="fs-4 fw-semibold">
                                Lengkapi Profilmu
                            </div>
                        </div>
                        <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 65%">
                            <div class="auth-content-form personal-info">
                                <form action="user-add" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- pfp --}}
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <label for="uploadInput" class="image-profile position-relative profile-input">
                                                <img id="previewImage" src="{{ asset('storage/image/avatars/prof-icon.svg') }}" alt="" class="w-100 overflow-hidden rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                                <div class="fs-6 position-absolute bottom-0 end-0">
                                                    <div class="d-flex justify-content-center align-items-center bg-upload bg-primary rounded-circle">
                                                        <i class="fa-solid fa-arrow-up-from-bracket text-gray-1"></i>
                                                    </div>
                                                </div>
                                                <input type="file" id="uploadInput" style="display: none;" name="pfp" onchange="previewImage()">
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    {{-- noTelp --}}
                                    <div class="mb-3">
                                        <label for="phoneInput" class="form-label text-gray-4">No Ponsel</label>
                                        <em class="text-danger">*</em>
                                        <input type="tel" name="noTelp" class="form-control" id="phoneInput"
                                            aria-describedby="phoneHelp" value="{{ old('noTelp') }}">
                                        <div id="phoneError" class="text-danger">
                                            @error('noTelp')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- firstName --}}
                                    <div class="mb-3">
                                        <label for="firstNameInput" class="form-label text-gray-4 mb-0">Nama
                                            Depan</label>
                                        <em class="text-danger">*</em>
                                        <div class="fs-label text-gray-3 mb-2">
                                            Sesuai di KTP/Passpor/SIM
                                        </div>
                                        <input type="text" class="form-control" id="firstNameInput" name="firstName"
                                            value="{{ old('firstName') }}">
                                        <div id="firstNameError" class="text-danger">
                                            @error('firstName')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- lastName --}}
                                    <div class="mb-3">
                                        <label for="lastNameInput" class="form-label text-gray-4">Nama Belakang</label>
                                        <em class="text-danger">*</em>
                                        <input type="text" class="form-control" id="lastNameInput" name="lastName"
                                            value="{{ old('lastName') }}" aria-describedby="lastNameHelp">
                                        <div id="lastNameError" class="text-danger">
                                            @error('lastName')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- dob --}}
                                    <div class="mb-3">
                                        <label for="dobInput" class="form-label text-gray-4">Tanggal Lahir</label>
                                        <em class="text-danger">*</em>
                                        <input type="date" class="form-control" id="dobInput" name="dob"
                                            value="{{ old('dob') }}">
                                        <div id="dobError" class="text-danger">
                                            @error('dob')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Gender --}}
                                    <div class="mb-3">
                                        <label class="form-label text-gray-4">Jenis Kelamin</label>
                                        <em class="text-danger">*</em>
                                        <div class="gender-list d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleRadio" value="laki-laki"
                                                    {{ old('gender') === 'laki-laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="maleRadio">
                                                    Laki-laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleRadio" value="perempuan"
                                                    {{ old('gender') === 'perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="femaleRadio">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div id="genderError" class="text-danger">
                                            @error('gender')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('storage/js/register_profile.js') }}"></script>
</body>

</html>
