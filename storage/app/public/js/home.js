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
    navigation: {
        nextEl: ".section-company .swiper-button-next",
        prevEl: ".section-company .swiper-button-prev",
    },
    speed: 800,
    effect: "slide",
    mousewheel: {
        enabled: true,
    },
});
