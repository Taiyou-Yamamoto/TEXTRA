import './bootstrap';
import Swiper from 'swiper';
import Alpine from 'alpinejs';
import { Navigation, Pagination, Scrollbar, FreeMode, Keyboard, EffectCoverflow, Parallax } from 'swiper/modules';
import 'swiper/css/bundle';
import 'swiper/css';
import Typed from 'typed.js';

window.Alpine = Alpine;
Alpine.start();

// Swiperのインスタンスを作成
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            clickable: true,
        },
        parallax: true,
        modules: [Navigation, Pagination, Scrollbar, FreeMode, Keyboard, Parallax, EffectCoverflow],
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },
        freeMode: true,  

        keyboard: {
            enabled: true,
        },
        spaceBetween: 100,
        slidesPerView: 2,
        centeredSlides: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 10,
            stretch: 1,
            scale: 1,
            depth: 100,
            modifier: 2,
            slideShadows: true,
        },
    });

    const typed = new Typed('#typed', {
        strings: ['こんにちは','ここは言葉の保管庫','TEXTRA'],
        typeSpeed: 80,
        startDelay: 1000,
        fadeOutDelay: 500,
        fadeOutClass: 'typed-fade-out',
        backSpeed: 70,
        loop: false,
        fadeOut: true,
        fadeOutDelay: 1500
    });
});
