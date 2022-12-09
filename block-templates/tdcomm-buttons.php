<?php

/**
 * TdComm Buttons Block Template.
 */

$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'tdcomm-buttons-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$btnType = get_field('td_btns_button_type') ?: 'primary';
$btnSize = get_field('td_btns_button_size') ?: '';
$linkOrDownload = get_field('td_btns_link_or_download') ?: 'link';
$btnHref = get_field('td_btns_button_href') ?: '#';
$btnText = get_field('td_btns_button_text') ?: 'View More';
$horAlign = get_field('td_btns_vertical_align') ?: 'center';
$openInNewTab = get_field('td_btns_open_in_new_tab') ?: false;

$captureDataCheck = get_field('td_btns_capture_data') ?: false;
if ($btnSize == 'default') {
    $btnSize = '';
}

if ($linkOrDownload == 'download') {
    $downloadAttr = 'download';
    $btnHref = get_field('td_btns_button_href_file');
} else {
    $downloadAttr = '';
}
$btnAlignClass = '';

if ($horAlign == 'center') {
    $class_name .= ' mx-auto';
    $btnAlignClass = ' mx-auto';
} elseif ($horAlign == 'right') {
    $class_name .= ' ml-auto';
    $btnAlignClass = ' ml-auto';
} else {
    $class_name .= ' mr-auto';
    $btnAlignClass = ' mr-auto';
}

$newTabAttrs = '';
$relAttrs = '';
if ($openInNewTab) {

    foreach ($openInNewTab as $key => $value) {
        if ($value == 'new_tab') {
            $newTabAttrs .= 'target="_blank" ';
        } elseif ($value == 'noopener') {
            $relAttrs .= 'noopener ';
        } elseif ($value == 'noreferrer') {
            $relAttrs .= 'noreferrer ';
        }
    }
}

$newTabAttrs = $newTabAttrs . ' rel="' . $relAttrs . '"';
$blockId = $block['id'];
$blockFile = get_field('td_btns_button_file_to_download', $block['id']);
$pdfId = get_field('pdf_to_download')[0];

?>
<div <?= $anchor; ?> class="<?= esc_attr($class_name); ?>">
    <?php if ($captureDataCheck[0] == 'yes') { ?>
        <a href="<?php echo get_home_url(); ?>" data-pdf-id="<?php echo $pdfId; ?>" data-block="<?php echo $blockId; ?>" class="td-cap-btn td-btn td-btn-<?php echo $btnType; ?> td-btn-<?php echo $btnSize; ?> <?php echo $btnAlignClass; ?>"><?php echo $btnText ?></a>
        <?php
        require_once get_template_directory() . '/block-templates/block-parts/download-modal.php';
        ?>
    <?php } else {
    ?>
        <a href="<?php echo $btnHref; ?>" <?php echo $downloadAttr;
                                            echo ' ' . $newTabAttrs; ?> class="td-btn td-btn-<?php echo $btnType; ?> td-btn-<?php echo $btnSize; ?> <?php echo $btnAlignClass; ?>"><?php echo $btnText ?></a>
    <?php
    }
    ?>
</div>