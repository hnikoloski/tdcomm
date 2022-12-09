import axios from 'axios';

jQuery(document).ready(function ($) {
    if ($('.td-cap-btn').length) {
        $('.td-cap-btn').on('click', function (e) {
            e.preventDefault();
            $('.download-modal form input[name="postId"]').val($(this).attr('data-pdf-id'));
            $('.download-modal').addClass('active');
            $('body').addClass('overflow-hidden');
        });
        $('.close-modal').on('click', function (e) {
            e.preventDefault();
            $('.download-modal').removeClass('active');
            $('body').removeClass('overflow-hidden');
            // Reset the form
            $('form.modal-form')[0].reset();
            $('form.modal-form').find('.error').removeClass('error');
            $('form.modal-form').find('.error-message').remove();
            $('.form-group').removeClass('error');
            $('form.modal-form').find('.success-message').remove();

        });
    }

    if ($('form.modal-form').length) {
        let form = $('form.modal-form');
        let apiUrl = '/wp-json/tdcomm/v1/downloadable';

        form.on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(form[0]);
            axios.post(apiUrl, formData)
                .then(function (response) {
                    // Remove previous success message if exists
                    // clear all errors
                    form.find('.error').removeClass('error');
                    form.find('.error-message').remove();
                    $('.form-group').removeClass('error');
                    form.find('.success-message').remove();

                    let fileUrl = response.data.file_url;
                    let file_name = response.data.file_name;
                    let responseMessage = response.data.message;
                    // append message
                    form.append(`<p class="success-message">${responseMessage}</p>`);
                    // Reset form
                    if (response.data.status_message == 'email_already_exists') {
                        return;
                    } else {
                        form[0].reset();
                    }
                    downloadURI(fileUrl, file_name);

                })
                .catch(function (error) {
                    // clear all errors
                    form.find('.error').removeClass('error');
                    form.find('.error-message').remove();
                    $('.form-group').removeClass('error');
                    let errorMessages = error.response.data.data.errField;
                    // Loop through each error message and display it
                    for (let key in errorMessages) {
                        let errorMessage = errorMessages[key];
                        form.find(`[name="${key}"]`).parent().addClass('error');
                        // Append error message
                        form.find(`[name="${key}"]`).parent().append(`<span class="error-message">${errorMessage}</span>`);
                    }
                }
                )
        });


    }
    function downloadURI(uri, fileName) {
        var link = document.createElement("a");
        link.download = fileName
        link.href = uri;
        link.setAttribute("target", "_blank");
        link.click();
        link.remove();
    }

});

