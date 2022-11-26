import axios from 'axios';

jQuery(document).ready(function ($) {

    $('.focus-anim').on('focusin', function () {
        $(this).parent().find('label').addClass('active');
    });

    $('.focus-anim').on('focusout', function () {
        if (!this.value) {
            $(this).parent().find('label').removeClass('active');
        }
    });

    $('.tdcomm-contact-form-block .contact-form-form-wrapper form').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);
        let apiUrl = '/wp-json/tdcomm/v1/contact-form';
        let formData = new FormData(form[0]);
        axios.post(apiUrl, formData)
            .then(function (response) {
                console.log(response);
                if (response.data.status === 200 && response.data.status_message === 'email_sent_successfully') {
                    // Reset form
                    form[0].reset();
                    // Remove active class from labels
                    form.find('label').removeClass('active');
                    // Remove errors
                    form.find('.error').removeClass('error');
                    form.find('.error-message').remove();
                    // Remove success message if exists
                    form.find('.success-message').remove();
                    //   Append success message
                    form.append('<div class="success-message">Your message has been sent successfully!</div>');
                }
            })
            .catch(function (error) {
                // clear all errors
                form.find('.error').removeClass('error');
                form.find('.error-message').remove();

                let errorMessages = error.response.data.data.errField;
                // Loop through each error message and display it
                for (let key in errorMessages) {
                    let errorMessage = errorMessages[key];
                    form.find(`[name="${key}"]`).parent().addClass('error');
                    // Append error message
                    form.find(`[name="${key}"]`).parent().append(`<span class="error-message">${errorMessage}</span>`);
                }


            })


    });

});

