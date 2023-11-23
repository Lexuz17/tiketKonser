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
