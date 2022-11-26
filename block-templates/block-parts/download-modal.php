<div class="modal modal-wrapper" id="download-modal" tabindex="-1" role="dialog" aria-labelledby="download-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <h4 class="text-center"><?php _e('Get in touch with us!', 'tdComm'); ?></h4>
            <p class="text-center"><?php _e('Fill out the form and download the product!', 'tdComm'); ?></p>
            <span class="close-modal" data-dismiss="modal" aria-label="Close">
                <span></span>
                <span></span>
            </span>
            <form method="post" class="modal-form">
                <input type="hidden" name="postId" value="<?php echo get_the_ID(); ?>">
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
                    <label for="message">Why would you like to download this product ?</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="" class="focus-anim"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="td-btn td-btn-inverted ">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>