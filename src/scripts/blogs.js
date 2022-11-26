jQuery(document).ready(function ($) {
    if ($('.blog-posts-wrapper .blog-card__title').length) {
        // Get the height of all titles and find the tallest one
        var tallestTitle = 0;
        $('.blog-posts-wrapper .blog-card__title').each(function () {
            var thisHeight = $(this).height();
            if (thisHeight > tallestTitle) {
                tallestTitle = thisHeight;
            }
        });
        // Set the height of all titles to the tallest one
        $('.blog-posts-wrapper .blog-card__title').css('min-height', tallestTitle / 10 + 'rem');
    }
})