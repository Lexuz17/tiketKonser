function validateEmail() {
    var emailInput = document.getElementById('exampleInputEmail1');
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailInput.value.trim()) {
        emailError.textContent = 'Email harus diisi';
        emailInput.classList.add('is-invalid');
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Email tidak valid';
        emailInput.classList.add('is-invalid');
    } else {
        emailError.textContent = '';
        emailInput.classList.remove('is-invalid');
    }
}

function validateForm() {
    var phoneInput = document.getElementById('phoneInput');
    var firstNameInput = document.getElementById('firstNameInput');
    var dobInput = document.getElementById('dobInput');
    var maleCheckbox = document.getElementById('maleCheckbox');
    var femaleCheckbox = document.getElementById('femaleCheckbox');

    var phoneError = document.getElementById('phoneError');
    var firstNameError = document.getElementById('firstNameError');
    var dobError = document.getElementById('dobError');
    var genderError = document.getElementById('genderError');

    if (!phoneInput.value.trim()) {
        phoneError.textContent = 'No Ponsel harus diisi';
        phoneInput.classList.add('is-invalid');
    } else {
        phoneError.textContent = '';
        phoneInput.classList.remove('is-invalid');
    }

    if (!firstNameInput.value.trim()) {
        firstNameError.textContent = 'Nama Depan harus diisi';
        firstNameInput.classList.add('is-invalid');
    } else {
        firstNameError.textContent = '';
        firstNameInput.classList.remove('is-invalid');
    }

    if (!dobInput.value.trim()) {
        dobError.textContent = 'Tanggal Lahir harus diisi';
        dobInput.classList.add('is-invalid');
    } else {
        dobError.textContent = '';
        dobInput.classList.remove('is-invalid');
    }

    if (!maleCheckbox.checked && !femaleCheckbox.checked) {
        genderError.textContent = 'Jenis Kelamin harus dipilih';
    } else {
        genderError.textContent = '';
    }
}
