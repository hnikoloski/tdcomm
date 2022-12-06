<section class="products-section products-section-opt-two">
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

                <a href="<?php the_permalink(); ?>" class="single-product">
                    <div class="img-wrapper">
                        <?php
                        $icon = get_field('featured_icon_secondary', $post->ID) ? get_field('featured_icon_secondary', $post->ID) : get_field('featured_icon', $post->ID);
                        ?>
                        <img src="<?= $icon; ?>" alt="<?php the_title() ?>">
                    </div>
                    <h2 class="product-title"><?php the_title(); ?></h2>
                </a>
            <?php endforeach; ?>
        </div>

        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php if (get_field('products_section_image', $pageId)) : ?>
        <div class="products-section__image-wrapper">
            <img src="<?= get_field('products_section_image', $pageId); ?>" alt="Products section image">
        </div>
    <?php endif; ?>
</section>