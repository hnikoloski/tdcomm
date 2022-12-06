<?php

/**
 * TdComm List Block Template.
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


?>
<div class="tdcomm-list-block <?php echo esc_attr($classes); ?>">
    <?php if (get_field('td_list_title')) : ?>
        <p class="block-title"><?php the_field('td_list_title'); ?></p>
    <?php endif; ?>
    <?php if (have_rows('td_list_items')) : ?>
        <ul class="list">
            <?php while (have_rows('td_list_items')) : the_row(); ?>
                <li class="list-item">
                    <?php the_sub_field('td_list_item'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>