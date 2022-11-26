<?php

/**
 * TdComm Slider Block Template.
 */

$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'tdcomm-slider-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$slidesToShow             = get_field('td_slider_slider_to_show') ?: 3;
$slidesToScroll           = get_field('td_slider_slider_to_scroll') ?: 1;
$slideImgs                = get_field('td_slider_slides');
$spaceBetween             = get_field('td_slider_space_between') ?: 30;
$blockId                 = $block['id'];
$sliderId                 = 'td-slider-' . $blockId;
?>

<div <?= $anchor; ?>class="<?= esc_attr($class_name); ?>">
    <div class="swiper gallery-slider" data-slides-to-show="<?php echo $slidesToShow; ?>" data-slides-to-scroll="<?php echo $slidesToScroll ?>" id="<?php echo 'gallery-slider-' . $blockId; ?>" data-space-between="<?php echo $spaceBetween; ?>">
        <div class="swiper-wrapper">
            <?php
            foreach ($slideImgs as $k => $slideImg) {
                $thumbUrl = $slideImg['sizes']['thumbnail'];
                $fullSizeUrl = $slideImg['url']
            ?>
                <div class="swiper-slide">
                    <a href="<?php echo $fullSizeUrl; ?>" class="img-wrapper" data-fancybox="<?php echo 'gallery-' . $blockId ?>">
                        <img src="<?php echo $fullSizeUrl; ?>" data-fullsize="<?php echo $fullSizeUrl; ?>" alt="slide-<?php echo $k + 1; ?>" class="full-size-img full-size-img-cover" />
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

</div>