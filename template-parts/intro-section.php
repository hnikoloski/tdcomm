<section class="intro-section">
    <?php
    $pageId = get_the_ID();

    if (get_field('intro_section_title', $pageId)) : ?>
        <h3 class="section-title"><?php the_field('intro_section_title', $pageId); ?></h3>
    <?php endif;
    if (get_field('intro_section_description', $pageId)) : ?>
        <div class="section-description"><?php the_field('intro_section_description', $pageId); ?></div>
    <?php endif;
    if (get_field('intro_btn_link', $pageId)) :
        if (get_field('intro_open_in_new_tab', $pageId)[0] == 'yes') {
            $openInNewTab = 'target="_blank" rel="noopener noreferrer"';
        } else {
            $openInNewTab = '';
        }
    ?>
        <a href="<?php the_field('intro_btn_link', $pageId); ?>" <?= $openInNewTab; ?> class="td-btn td-btn-primary"><?php the_field('intro_btn_text', $pageId); ?></a>
    <?php endif; ?>

</section>