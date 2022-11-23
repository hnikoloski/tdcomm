<?php

/**
 * TdComm Media With Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}

// Load custom field values.
$start_date = get_field('start_date');
$end_date = get_field('end_date');
$imageUrl = get_field('td_block_image_url') ?: '50%';
$imgSize = get_field('td_block_image_size') . '%' ?: 'calc(100% - 50% - 5.3rem)';
$colSize = 'calc(100% - ' . $imgSize . ' - 5.3rem)';
?>
<div class="tdcomm-media-with-content-block <?php echo esc_attr($classes); ?>">
    <div class="block-wrapper">
        <div class="inner-blocks" style="--invertSize:<?php echo $colSize; ?>">
            <InnerBlocks />
        </div>
        <div class="block-image" style="--imgSize: <?php echo $imgSize; ?>;">
            <img src="<?php echo $imageUrl; ?>" alt="<?php
                                                        echo get_bloginfo('name');
                                                        ?>">
        </div>
    </div>
</div>