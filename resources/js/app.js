import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    speed: 700,

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: false,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    observer: true,
    observeParents: true,
    watchSlidesProgress: true,

    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },

    on: {
        init: function () {
            this.pagination.render();
            this.pagination.update();
        },
        slideChange: function () {
            this.pagination.update();
        }
    }
});