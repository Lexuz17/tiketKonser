<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    {{-- Custom Local Boostrap --}}
    <link rel="stylesheet" href="   {{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    {{-- Boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/61b0df038c.js" crossorigin="anonymous"></script>
    {{-- editProfile.js --}}
    <script src="{{ asset('storage/js/editProfile.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="auth-title text-center">
            <div class="fs-4 fw-semibold">
                Update Profilmu
            </div>
        </div>
        <div class="auth-content container shadow mt-4 py-3 px-4 rounded-4" style="width: 65%">
            <div class="auth-content-form personal-info">
                <form action="/user-update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- pfp --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <label for="uploadInput" class="image-profile position-relative profile-input">
                                <img id="previewImage" src="{{ asset('storage/image/avatars/' . $user_origin->gambar) }}" alt="" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="fs-6 position-absolute bottom-0 end-0">
                                    <div class="d-flex justify-content-center align-items-center bg-upload bg-primary rounded-circle p-2">
                                        <i class="fa-solid fa-arrow-up-from-bracket text-gray-1"></i>
                                    </div>
                                </div>
                                <input type="file" id="uploadInput" style="display: none;" name="pfp" onchange="previewImage()">
                            </label>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="phoneInput" class="form-label text-gray-4">Email: </label>
                        <span class="form-control-static text-gray-3">{{ $user_email }}</span>
                    </div>

                    {{-- noTelp --}}
                    <div class="mb-3">
                        <label for="phoneInput" class="form-label text-gray-4">No Ponsel</label>
                        <em class="text-danger">*</em>
                        <input type="tel" name="noTelp" class="form-control" id="phoneInput" value="{{ $user_origin -> no_telp }}" required>
                        <div id="phoneError" class="text-danger"></div>
                    </div>
                    {{-- firstName--}}
                    <div class="mb-3">
                        <label for="firstNameInput" class="form-label text-gray-4 mb-0">Nama Depan</label>
                        <em class="text-danger">*</em>
                        <div class="fs-label text-gray-3 mb-2">
                            Sesuai di KTP/Passpor/SIM
                        </div>
                        <input type="text" class="form-control" id="firstNameInput" name="firstName" value="{{ $user_origin -> nama_depan }}" required>
                        <div id="firstNameError" class="text-danger"></div>
                    </div>
                    {{-- lastName --}}
                    <div class="mb-3">
                        <label for="lastNameInput" class="form-label text-gray-4">Nama Belakang</label>
                        <input type="text" class="form-control" id="lastNameInput" name="lastName" value="{{ $user_origin -> nama_belakang }}" required>
                    </div>
                    {{-- dob --}}
                    <div class="mb-3">
                        <label for="dobInput" class="form-label text-gray-4">Tanggal Lahir</label>
                        <em class="text-danger">*</em>
                        <input type="date" class="form-control" id="dobInput" name="dob" value="{{ $user_origin -> dob }}" required>
                        <div id="dobError" class="text-danger"></div>
                    </div>
                    {{-- Gender --}}
                    <div class="mb-3">
                        <label class="form-label text-gray-4">Jenis Kelamin</label>
                        <em class="text-danger">*</em>
                        <div class="gender-list d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="maleRadio" value="laki-laki" {{ $user_origin->gender == 'laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="maleRadio">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="perempuan" {{ $user_origin->gender == 'perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="femaleRadio">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div id="genderError" class="text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('storage/js/editProfile.js') }}"></script>
</body>
</html>
