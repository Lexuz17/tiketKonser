var swiperEvent = new Swiper(".slide-content", {
    slidesPerView: 4,
    centeredSlides: false,
    slidesPerGroupSkip: 0,
    grabCursor: true,
    keyboard: {
        enabled: true,
    },
    breakpoints: {
        769: {
            slidesPerView: 4,
            slidesPerGroup: 4,
        },
    },
    navigation: {
        nextEl: ".section-event .swiper-button-next",
        prevEl: ".section-event .swiper-button-prev",
    },
    speed: 800,
    effect: "slide",
});

var swiperCompany = new Swiper(".company-section-list", {
    slidesPerView: 10,
    centeredSlides: false,
    slidesPerGroupSkip: 0,
    grabCursor: true,
    keyboard: {
        enabled: true,
    },
    breakpoints: {
        769: {
            slidesPerView: 10,
            slidesPerGroup: 10,
        },
    },
    navigation: {
        nextEl: ".section-company .swiper-button-next",
        prevEl: ".section-company .swiper-button-prev",
    },
    speed: 800,
    effect: "slide",
});

var swiperCategory = new Swiper(".category-list", {
    slidesPerView: 8,
    centeredSlides: false,
    slidesPerGroupSkip: 0,
    grabCursor: true,
    keyboard: {
        enabled: true,
    },
    breakpoints: {
        769: {
            slidesPerView: 8,
            slidesPerGroup: 8,
        },
    },
    speed: 800,
    effect: "slide",
    mousewheel: {
        enabled: true,
    },
});

document.getElementById('dropdownToggle').addEventListener('click', function() {
    var dropdownContent = document.getElementById('dropdownContent');
    if (dropdownContent.style.display === 'none' || dropdownContent.style.display === '') {
        dropdownContent.style.display = 'block';
    } else {
        dropdownContent.style.display = 'none';
    }
});

// ini buat list selected location
var locationItems = document.querySelectorAll('.filter-item .location-name');
locationItems.forEach(function(item) {
    item.addEventListener('click', function() {
        // hapus .active
        locationItems.forEach(function(item) {
            item.classList.remove('active');
        });
        // Add .active di class yg di select
        this.classList.add('active');
        // Update text
        var selectedLocation = this.textContent;
        document.getElementById('dropdownToggle').querySelector('.show-location').textContent = selectedLocation;
        // tutup dropdown
        document.getElementById('dropdownContent').style.display = 'none';

        // raw logic untuk menyaring card berdasarkan lokasi
        filterCardsByLocation(selectedLocation, 'popularEventsSwiper');
    });
});

function filterCardsByLocation(selectedLocation, swiperId) {
    var cards = document.querySelectorAll('#' + swiperId + ' .card-event');
    cards.forEach(function(card) {
        var cardLocation = card.getAttribute('data-location').trim();
        selectedLocation = selectedLocation.trim();

        if (selectedLocation === 'Semua' || selectedLocation === cardLocation) {
            card.style.display = 'block';
        } else {
            console.log(cardLocation + '=' + selectedLocation);
            card.style.display = 'none';
        }
    });
}

document.getElementById('searchLocationInput').addEventListener('input', function() {
    var searchValue = this.value.trim().toLowerCase();
    var locationItems = document.querySelectorAll('.filter-item');

    locationItems.forEach(function(item) {
        var locationName = item.querySelector('.location-name').textContent.toLowerCase();

        // Cek apakah nama lokasi mengandung nilai pencarian
        if (locationName.includes(searchValue)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// for search
// document.getElementById('searchInput').addEventListener('input', function() {
//     var searchValue = this.value.trim().toLowerCase();
//     var cards = document.querySelectorAll('.card-event');

//     cards.forEach(function(card) {
//         var cardTitle = card.querySelector('.description-title').textContent.toLowerCase();
//         var cardLocation = card.getAttribute('data-location').toLowerCase();

//         // cek judul atau lokasi kartu mengandung nilai pencarian
//         if (cardTitle.includes(searchValue) || cardLocation.includes(searchValue)) {
//             card.style.display = 'block';
//         } else {
//             card.style.display = 'none';
//         }
//     });
// });

