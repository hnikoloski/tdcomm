<div class="cta cta-footer">
    <div>
        <?php
        if (get_field('footer_cta_text', 'option')) :
            the_field('footer_cta_text', 'option');
        endif;
        ?>
    </div>
    <?php if (get_field('contact_button_link_to', 'option')) : ?>
        <a href="<?php the_field('contact_button_link_to', 'option'); ?>" class="td-btn td-btn-outline-w"><?php the_field('contact_button_text', 'option'); ?></a>
    <?php endif; ?>
</div>
<footer id="colophon" class="site-footer">
    <div class="site-info">
        <?php
        $targetMenuLocation = 'footer-1';
        $menuLocations = get_nav_menu_locations();
        $menuID = $menuLocations[$targetMenuLocation];
        $footerMenu = wp_get_nav_menu_items($menuID);
        if ($footerMenu) : ?>
            <div class="col">

                <ul class="footer-menu">
                    <?php
                    foreach ($footerMenu as $navItem) : ?>
                        <li class="<?php if (get_field('large_label', $navItem)[0] == 'yes') {
                                        echo 'large-label';
                                    } else {
                                        echo 'small-label';
                                    }
                                    ?>">
                            <a href="<?= $navItem->url; ?>">
                                <?= $navItem->title; ?>

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php
        $targetMenuLocation = 'footer-2';
        $menuLocations = get_nav_menu_locations();
        $menuID = $menuLocations[$targetMenuLocation];
        $footerMenu = wp_get_nav_menu_items($menuID);
        if ($footerMenu) : ?>
            <div class="col">

                <ul class="footer-menu">
                    <?php
                    foreach ($footerMenu as $navItem) : ?>
                        <li class="<?php if (get_field('large_label', $navItem)[0] == 'yes') {
                                        echo 'large-label';
                                    } else {
                                        echo 'small-label';
                                    }
                                    ?>">
                            <a href="<?= $navItem->url; ?>">
                                <?= $navItem->title; ?>

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php
        $targetMenuLocation = 'footer-3';
        $menuLocations = get_nav_menu_locations();
        $menuID = $menuLocations[$targetMenuLocation];
        $footerMenu = wp_get_nav_menu_items($menuID);
        if ($footerMenu) : ?>
            <div class="col">

                <ul class="footer-menu">
                    <?php
                    foreach ($footerMenu as $navItem) : ?>
                        <li class="<?php if (get_field('large_label', $navItem)[0] == 'yes') {
                                        echo 'large-label';
                                    } else {
                                        echo 'small-label';
                                    }
                                    ?>">
                            <a href="<?= $navItem->url; ?>">
                                <?= $navItem->title; ?>

                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="col">
            <h4 class="col-label"><?php _e('Follow us', 'tdcomm'); ?></h4>
            <ul class="socials">
                <?php
                $linkedIn = get_field('linkedin_link', 'option');
                $email = get_field('email_social', 'option');
                $facebook = get_field('facebook_link', 'option');
                $instagram = get_field('instagram_link', 'option');

                if ($linkedIn) : ?>
                    <li>
                        <a href="<?= $linkedIn; ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="LinkedIn">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($email) : ?>
                    <li>
                        <a href="mailto:<?= $email; ?>">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/envelope.svg" alt="Email">
                        </a>
                    </li>
                <?php endif; ?>


                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logoUrl = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
            </ul>
            <div class="logo-wrapper d-block">
                <img src="<?= $logoUrl[0]; ?>" alt="<?= get_bloginfo(); ?>" class="full-size-img full-size-img-contain">
            </div>
        </div>
    </div>
    <div class="copy-bar text-center">
        <p>
            <?php the_field('footer_copy_bar_text', 'option'); ?>
        </p>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>