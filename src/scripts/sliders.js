
import Swiper, { Autoplay, Pagination } from 'swiper';
import { Fancybox } from "@fancyapps/ui";
jQuery(document).ready(function ($) {
    if ($('.swiper-home')) {
        const swiper = new Swiper('.swiper-home', {
            loop: false,
            modules: [Autoplay],
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 1000,
            runCallbacksOnInit: true,

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


    // create swiper for the gallery
    function createSlider(slider, slidesToShow, spaceBetween) {
        let gallerySwiper = new Swiper(slider, {
            slidesPerView: slidesToShow,
            spaceBetween: spaceBetween,
            centeredSlides: true,
            loop: true,
            loopedSlides: 2,
            // Same height for all slides
            autoHeight: false,
            onInit: function (sw) {
                // If slidesPerView is same as number of slides, hide navigation AllowTouchMove
                if (sw.slides.length <= slidesToShow) {
                    sw.allowTouchMove = false;
                    sw.navigation.destroy();
                    sw.pagination.destroy();
                }
            },



        });

    }

    if ($('.tdcomm-slider-block .gallery-slider').length) {

        // Loop through each gallery and create a slider
        $('.tdcomm-slider-block .gallery-slider').each(function () {
            let sliderId = '#' + $(this).attr('id');
            let slidesToShow = $(this).attr('data-slides-to-show');
            let spaceBetween = $(this).attr('data-space-between');
            // Convert to number
            slidesToShow = parseInt(slidesToShow);
            spaceBetween = parseInt(spaceBetween);
            createSlider(sliderId, slidesToShow, spaceBetween);
        });


    }
});