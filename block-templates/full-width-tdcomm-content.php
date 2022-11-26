<?php

/**
 * TdComm Full Width Content.
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
$bgImg = get_field('td_fw_block_bg_image') ?: '';
$overlayColor = get_field('td_fw_block_overlay_color') ?: '#02286499';
$bgPositionTopBottom = get_field('td_fw_block_top_bottom_position') ?: '50';
$bgPositionLeftRight = get_field('td_fw_block_leftright_position') ?: '50';
$extraSize = get_field('td_fw_block_extra_size') ?: '0';

// check if in edit mode
if (is_admin()) {
    $extraSize = $extraSize . 'px';
} else {
    $extraSize = $extraSize / 10 . 'rem';
}


?>
<div class="tdcomm-full-width-content-block <?php echo esc_attr($classes); ?>" style="--extraSize:<?php echo $extraSize; ?>; --bgImg:url('<?php echo $bgImg; ?>'); --overlayColor:<?php echo $overlayColor; ?>; --topPos:<?php echo $bgPositionTopBottom ?>%; --leftPost:<?php echo $bgPositionLeftRight; ?>%;">
    <div class="inner-blocks">
        <InnerBlocks />
    </div>

</div>