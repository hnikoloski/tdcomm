<?php

/**
 * TdComm Contact Form Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'tdcomm-contact-form-block';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}



// Load custom field values.
$contactFormTitle = get_field('td_contact_form_title');
$contactFormDescription = get_field('td_contact_form_description');
?>
<div class="<?php echo esc_attr($classes); ?>">
    <?php
    if ($contactFormTitle) {
    ?>
        <h2 class="contact-form-title text-center"><?php echo $contactFormTitle; ?></h2>
    <?php
    }
    if ($contactFormDescription) {
    ?>
        <p class="contact-form-description text-center"><?php echo $contactFormDescription; ?></p>
    <?php
    }
    ?>
    <div class="contact-form-form-wrapper">
        <form method="post" class="contact-form-block-the-form">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" id="fullName" placeholder="" require class="focus-anim">
            </div>
            <div class="form-group">
                <label for="email">Work Email</label>
                <input type="email" name="email" id="email" placeholder="" require class="focus-anim">
            </div>
            <div class="form-group">
                <label for="companyType">Company Type</label>
                <input type="text" name="companyType" id="companyType" placeholder="" require class="focus-anim">
            </div>
            <div class="form-group">
                <label for="message">Would you like to add a comment ?</label>
                <textarea name="message" id="message" cols="30" rows="5" placeholder="" class="focus-anim"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="td-btn td-btn-inverted ">Send</button>
            </div>
        </form>
    </div>