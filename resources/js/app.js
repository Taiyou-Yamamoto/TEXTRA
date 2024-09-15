import './bootstrap';
import Swiper from 'swiper';
import Alpine from 'alpinejs';
import { Navigation, Pagination, Scrollbar, FreeMode, Keyboard, EffectCoverflow, Parallax } from 'swiper/modules';
import 'swiper/css/bundle';
import 'swiper/css';

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
});
