<?php

/**
 * TdComm Icon box Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'tdcomm-icon-box';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}

// Load custom field values.
$itemsPerRow = get_field('td_icon_box_items_per_row') ?: '3';

?>
<div class="<?php echo esc_attr($classes); ?>" style="--colWidth:<?php echo 100 / $itemsPerRow . '%'; ?>">
    <?php if (have_rows('td_comm_icon_boxes')) : ?>
        <?php while (have_rows('td_comm_icon_boxes')) : the_row();
            // vars
            $icon = get_sub_field('icon') ?: '';
            $title = get_sub_field('title') ?: '';
            $content = get_sub_field('description') ?: '';
        ?>
            <div class="icon-box">
                <div class="icon-box-inner">
                    <div class="icon-box-icon">
                        <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
                    </div>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title"><?php echo $title; ?></h3>
                        <p class="icon-box-text">
                            <?php echo $content; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>