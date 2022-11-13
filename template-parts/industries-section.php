<section class="industries-section">
    <?php
    $pageId = get_the_ID();
    if (get_field('industries_section_title', $pageId)) : ?>
        <h3 class="section-title text-center">
            <?php the_field('industries_section_title', $pageId); ?>
        </h3>
    <?php endif; ?>

    <?php
    $industries_posts = get_field('industries_to_display', $pageId);
    if ($industries_posts) : ?>
        <div class="swiper swiper-industries">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($industries_posts as $post) :
                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>
                    <div class="swiper-slide single-industry industry-card">
                        <div class="industry-card__image-wrapper">
                            <img src="<?= get_the_post_thumbnail_url($post->ID, 'medium'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="industry-card__content-wrapper">
                            <h4 class="industry-card__title"><?php the_title(); ?></h4>
                            <p class="industry-card__excerpt">
                                <?= get_the_excerpt($post->ID); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="td-btn td-btn-primary industry-card__link"><?php _e('Read more', 'tdcomm'); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
</section>