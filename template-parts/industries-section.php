<section class="industries-section">
    <?php
    $pageId = get_the_ID();
    if (get_field('products_section_title', $pageId)) : ?>
        <h3 class="section-title text-center">
            <?php the_field('products_section_title', $pageId); ?>
        </h3>
    <?php endif; ?>

    <?php
    $products_posts = get_field('products_to_display', $pageId);
    if ($products_posts) : ?>
        <div class="posts-wrapper">
            <?php foreach ($products_posts as $post) :
                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>
                <div class="single-product product-card">
                    <h4 class="product-card__title"><?php the_title(); ?></h4>
                    <div class="product-card__image-wrapper">
                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'medium'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <a href="<?php the_permalink(); ?>" class="td-btn td-btn-primary product-card__link"><?php _e('Learn More', 'tdcomm'); ?></a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
</section>