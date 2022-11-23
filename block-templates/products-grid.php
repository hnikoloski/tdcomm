<?php

/**
 * Products Grid Block Template.
 */

$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'products-grid-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heroTitle             = get_field('products_per_page') ?: -1;
$imageToShow           = get_field('image_to_show') ?: 'icon';
$theBtnText            = get_field('the_btn_text') ?: 'View';
?>

<div <?= $anchor; ?>class="<?= esc_attr($class_name); ?>">
    <?php
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => $heroTitle,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div class="products-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $theProductId = get_the_ID();
                if ($imageToShow == 'icon') {
                    $theProductImage = get_field('featured_icon', $theProductId);
                } else {
                    // Get featured image
                    $theProductImage = get_the_post_thumbnail_url($theProductId, 'medium');
                }

                ?>
                <div class="product-card">
                    <h3 class="product-card__title"><?php the_title(); ?></h3>
                    <div class="product-card__image">
                        <img src="<?php echo $theProductImage; ?>" alt="<?php the_title(); ?>">
                    </div>
                    <a href="<?php the_permalink(); ?>" class="td-btn td-btn-primary-invert td-btn-medium"><?php echo $theBtnText; ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>