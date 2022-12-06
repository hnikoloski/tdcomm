<div class="cta cta-footer">
    <div>
        <?php
        if (get_field('footer_cta_text', 'option')) :
            the_field('footer_cta_text', 'option');
        endif;
        ?>
    </div>
    <div class="icons-wrapper">
        <?php if (get_field('td_contact_phone', 'option')) : ?>
            <a href="tel:<?php the_field('td_contact_phone', 'option'); ?>" title="Call Us">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="Phone" class="full-size-img full-size-img-contain">
            </a>
        <?php endif; ?>
        <?php if (get_field('td_contact_form_email', 'option')) : ?>
            <a href="mailto:<?php the_field('td_contact_form_email', 'option'); ?>" title="Email Us">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/envelope_min.svg" alt="Email" class="full-size-img full-size-img-contain">
            </a>
        <?php endif; ?>
    </div>
</div>