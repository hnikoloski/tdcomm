<?php
if (is_front_page()) :
    $pageId = get_option('page_on_front');
?>
    <div id="hero" class="hero-home">
        <?php if (have_rows('hero_slider', $pageId)) :
        ?>
            <div class="swiper swiper-home">
                <div class="swiper-wrapper">
                    <?php while (have_rows('hero_slider', $pageId)) : the_row();
                        $background_image = get_sub_field('background_image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $btn_text = get_sub_field('btn_text');
                        $btn_link = get_sub_field('btn_link');
                    ?>
                        <div class="swiper-slide" style="--bgImage:url(<?= $background_image; ?>);">
                            <div class="content-wrapper">
                                <?php if ($title) : ?>
                                    <h2><?= $title; ?></h2>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="description">
                                        <?= $description; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($btn_text) : ?>
                                    <a href="<?= $btn_link; ?>" class="td-btn td-btn-primary"><?= $btn_text; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php
endif; //is_front_page
