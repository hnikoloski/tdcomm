
import Swiper, { Autoplay, Pagination } from 'swiper';

jQuery(document).ready(function ($) {
    if ($('.swiper-home')) {
        const swiper = new Swiper('.swiper-home', {
            loop: true,
            modules: [Autoplay],
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 1000,
        });
    }

    if ($('.swiper-industries')) {
        const industriesSwiper = new Swiper('.swiper-industries', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
            speed: 1000,
            modules: [Pagination, Autoplay],
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    if ($('.swiper-partners')) {
        const industriesSwiper = new Swiper('.swiper-partners', {
            modules: [Autoplay],
            autoplay: {
                delay: 2000,
            },
            speed: 1000,
            slidesPerView: '3.5',
            centeredSlides: true,
            loop: true,
            loopedSlides: 2,
            spaceBetween: convertPxToRem(30),
        });
    }

    function convertPxToRem(px) {
        // get the root font size
        const rootFontSize = parseFloat(
            getComputedStyle(document.documentElement).fontSize
        );
        // convert px to rem
        return px / rootFontSize;
    }
});