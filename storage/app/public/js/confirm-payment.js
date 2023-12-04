// countdown.js

document.addEventListener("DOMContentLoaded", function() {
    var targetTime = new Date(document.getElementById('countdown-container').dataset.targetTime);
    var sudahBayarBtn = document.getElementById('sudahBayarBtn');

    function updateCountdown() {
        const now = new Date();
        const timeDifference = targetTime - now;

        if (timeDifference > 0) {
            const hours = Math.floor(timeDifference / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            document.getElementById('hour').innerText = formatTime(hours);
            document.getElementById('minute').innerText = formatTime(minutes);
            document.getElementById('second').innerText = formatTime(seconds);
            sudahBayarBtn.disabled = false;
        } else {
            document.getElementById('hour').innerText = '00';
            document.getElementById('minute').innerText = '00';
            document.getElementById('second').innerText = '00';
            document.getElementById('batal').innerHTML = `
            <div class="text-center alert-danger alert">
                <div class="tittle fw-bold">Pesanan dibatalkan</div>
                <div class="desc">Kamu telah melewati batas waktu pembayaran.</div>
            </div>`;
            clearInterval(countdownInterval);
            sudahBayarBtn.disabled = true;
        }
    }

    // Format agar selalu 2 digit
    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }

    // Jalankan updateCountdown setiap detik
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Jalankan updateCountdown secara langsung saat halaman dimuat
    updateCountdown();
});
