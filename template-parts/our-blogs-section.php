<section class="our-blogs-section">
    <?php
    $pageId = get_the_ID();
    if (get_field('blog_section_title', $pageId)) : ?>
        <h3 class="section-title text-center">
            <?php the_field('blog_section_title', $pageId); ?>
        </h3>
    <?php endif; ?>

    <?php
    $products_posts = get_field('blog_posts', $pageId);
    if ($products_posts) : ?>
        <div class="posts-wrapper">
            <?php foreach ($products_posts as $post) :
                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>
                <div class="single-blog blog-card">
                    <h4 class="blog-card__title"><?php the_title(); ?></h4>
                    <div class="blog-card__image-wrapper">
                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <a href="<?php the_permalink(); ?>" class="blog-card__link"><?php _e('Learn more', 'tdcomm'); ?></a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
</section>