
import Swiper from 'swiper';
import 'swiper/css';
jQuery(document).ready(function ($) {
    const swiper = new Swiper('.swiper-home', {
        loop: true,
        autoplay: {
            delay: 1000,
            pauseOnMouseEnter: true,
        },
        slidesPerView: 1,
        spaceBetween: 0,

    });
});