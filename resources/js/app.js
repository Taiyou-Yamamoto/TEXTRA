import './bootstrap';
import Swiper from 'swiper';
import Alpine from 'alpinejs';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Alpine = Alpine;

Alpine.start();


// Swiperのインスタンスを作成
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper', {
        // direction: 'vertical',
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        modules: [Navigation, Pagination],
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
});
