jQuery(document).ready(function ($) {
    // $("#page").css("padding-top", $("#masthead").outerHeight());
    // $(window).scroll(function () {
    //     var sticky = $("#masthead .top-bar"),
    //         scroll = $(window).scrollTop();

    //     if (scroll >= 100) {
    //         sticky.slideUp();
    //         if ($(window).width() > 768) {
    //             $("#to-top").slideDown();
    //         }
    //         $("#masthead").addClass("sticky");
    //     } else {
    //         sticky.slideDown();
    //         if ($(window).width() > 768) {
    //             $("#to-top").slideUp();
    //         }
    //         $("#masthead").removeClass("sticky");
    //     }
    // });
    if ($('#masthead .main-navigation li.current-menu-item a')) {
        $('#masthead .main-navigation li.current-menu-item > a').addClass('active');
        $('#masthead .main-navigation li.current_page_ancestor > a').addClass('active');
    }

    $('#menu-trigger').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('overflow-hidden');
        $(this).toggleClass('active');
        $('#masthead .main-navigation').toggleClass('active');
    })
    moveHeaderBtn();
    function moveHeaderBtn() {
        let theBtn = $('#masthead .td-btn');
        let locationTar = $('#masthead #primary-menu');
        if ($(window).width() < 768) {
            let resultEl = '<li>' + theBtn[0].outerHTML + '</li>';
            locationTar.append(resultEl);
            $('#masthead nav #primary-menu li a').removeClass('td-btn td-btn-primary-invert');
            // remove the original button
            theBtn.remove();
        } else {
            theBtn.prependTo(locationTar);
        }


    }

    if ($(window).width() < 768) {
        let menuItemsWithChildren = $('#masthead nav #primary-menu li.menu-item-has-children');
        // Add span to menu items with children
        menuItemsWithChildren.append('<span class="material-symbols-outlined sub-menu-trigger">expand_more</span>');

        $('.sub-menu-trigger').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $(this).parent().find('.sub-menu').slideToggle();
        })

        $('#page.site').css('padding-top', $('#masthead').outerHeight());
    }
});
