<section class="our-partners-section">
    <?php
    $pageId = get_option('page_on_front');
    if (get_field('partners_section_title', $pageId)) : ?>
        <h3 class="section-title text-center">
            <?php the_field('partners_section_title', $pageId); ?>
        </h3>
    <?php endif; ?>

    <?php if (have_rows('our_partners')) : ?>
        <div class="swiper swiper-partners">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php while (have_rows('our_partners')) : the_row();
                    $image = get_sub_field('image');
                    $partnerName = get_sub_field('name');
                    $link = get_sub_field('link_to_partner');
                    $newTab = get_sub_field('open_in_new_tab');


                    if ($link) {
                        if ($newTab) {
                            $newTab = 'target="_blank" rel="noopener noreferrer"';
                        } else {
                            $newTab = '';
                        }
                        $wrapperStart = '<a href="' . $link . '" class="img-wrapper d-block" ' . $newTab . '>';
                        $wrapperEnd = '</a>';
                    } else {
                        $wrapperStart = '<div class="img-wrapper">';
                        $wrapperEnd = '</div>';
                    }
                ?>

                    <div class="swiper-slide">
                        <?= $wrapperStart; ?>
                        <img src="<?= $image; ?>" alt="<?= $partnerName; ?>">
                        <?= $wrapperEnd; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>