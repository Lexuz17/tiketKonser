$(document).ready(function () {
    $('#uploadInput').change(function () {
        previewImage();
    });

    $('#userForm').submit(function (e) {
        $('#uploadInput').remove();
    });

    function previewImage() {
        var input = document.getElementById('uploadInput');
        var preview = document.getElementById('previewImage');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
});
