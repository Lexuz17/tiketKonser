// Navbar
$(document).ready(function() {
    // Menggunakan jQuery untuk menanggapi peristiwa focus dan blur
    $('.form-control').focus(function() {
        $(this).addClass('bg-opacity-100');
        $(this).addClass('text-black');
    }).blur(function() {
        $(this).removeClass('bg-opacity-100');
        $(this).removeClass('text-black');
    });
});
