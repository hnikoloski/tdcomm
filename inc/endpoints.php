<?php

// Register Endpoint

function tdcomm_register_endpoint()
{
    register_rest_route('tdcomm/v1', '/contact-form', array(
        'methods' => 'POST',
        'callback' => 'tdcomm_submit_contact_form',
    ));
    register_rest_route('tdcomm/v1', '/downloadable', array(
        'methods' => 'POST',
        'callback' => 'tdcomm_downloadable',
    ));
}

add_action('rest_api_init', 'tdcomm_register_endpoint');

// Submit Contact Form
function tdcomm_submit_contact_form($request)
{
    $data = $request->get_params();
    $fullName = $data['fullName'];
    $email = $data['email'];
    $companyType = $data['companyType'];
    $message = $data['message'];

    $errField = [];
    if (empty($fullName)) {
        $errField = array_merge($errField, array('fullName' => __('Full Name is required', 'tdcomm')));
    }

    // Short name
    if ($fullName && strlen($fullName) < 2) {
        $errField = array_merge($errField, array('fullName' => __('Full Name is too short.', 'tdcomm')));
    }

    if (empty($email)) {
        $errField = array_merge($errField, array('email' => __('Email is required', 'tdcomm')));
    }
    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errField = array_merge($errField, array('email' => __('Email is not valid', 'tdcomm')));
    }


    if (empty($companyType)) {
        $errField = array_merge($errField, array('companyType' => 'Company Type is required'));
    }

    if (count($errField) > 0) {
        return new WP_Error('error', 'Error', array('status' => 400, 'errField' => $errField));
    }

    $to = get_field('td_contact_form_email', 'option') ?: get_option('admin_email');
    $subject = 'Contact Form Submission';

    $body = '';
    $body .= '<table>';
    $body .= '<tr><td>Full Name</td><td>' . $fullName . '</td></tr>';
    $body .= '<tr><td>Email</td><td>' . $email . '</td></tr>';
    $body .= '<tr><td>Company Type</td><td>' . $companyType . '</td></tr>';
    $body .= '<tr><td>Message</td><td>' . $message . '</td></tr>';
    $body .= '</table>';

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = "From: $fullName <$email>";



    $response = wp_mail($to, $subject, $body, $headers);
    if ($response) {
        // Show success message
        return new WP_REST_Response(array(
            'status' => 200,
            'message' => __('Your message has been sent successfully.', 'tdcomm'),
            'status_message' => 'email_sent_successfully',
        ));
    } else {
        return rest_ensure_response(
            array(
                'status' => 'error',
                'message' => __('Something went wrong. Please try again later.', 'tdcomm'),
            )
        );
    }
}

// Downloadable
function tdcomm_downloadable($request)
{
    $blockId = $request->get_param('blockId');
    $postId = $request->get_param('postId');
    $fullName = $request->get_param('fullName');
    $email = $request->get_param('email');
    $companyType = $request->get_param('companyType');
    $message = $request->get_param('message');
    $errField = [];
    $block_id = $request->get_param('blockId');
    $acfSelector = 'td_btns_button_file_to_download';
    $fileToDownload = get_field('the_brochure', $postId)['url'];
    $fileName = basename($fileToDownload);

    if (empty($postId)) {
        // return No Post ID message
        return new WP_REST_Response(array(
            'status' => 400,
            'message' => __('No Post ID', 'tdcomm'),
            'status_message' => 'no_post_id',
        ));
    }
    if (empty($fullName)) {
        $errField = array_merge($errField, array('fullName' => __('Full Name is required', 'tdcomm')));
    }

    if ($fullName && strlen($fullName) < 2) {
        $errField = array_merge($errField, array('fullName' => __('Full Name is too short.', 'tdcomm')));
    }

    if (empty($email)) {
        $errField = array_merge($errField, array('email' => __('Email is required', 'tdcomm')));
    }

    if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errField = array_merge($errField, array('email' => __('Email is not valid', 'tdcomm')));
    }

    if (empty($companyType)) {
        $errField = array_merge($errField, array('companyType' => 'Company Type is required'));
    }

    if (count($errField) > 0) {
        return new WP_Error('error', 'Error', array('status' => 400, 'errField' => $errField));
    }

    // Save the data as a new potential_clients post
    $acf_full_name = 'full_name';
    $acf_email = 'email';
    $acf_company_type = 'company_type';
    $acf_message = 'message';

    // Check if email already exists
    $args = array(
        'post_type' => 'potential_clients',
        'meta_query' => array(
            array(
                'key' => $acf_email,
                'value' => $email,
                'compare' => '=',
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        // Show error message
        return new WP_REST_Response(array(
            'status' => 200,
            'message' => __('You have already downloaded this file .You can download it again here: <a href="' . $fileToDownload . '" target="_blank" download class="download-trigger">Download</a>', 'tdcomm'),
            'status_message' => 'email_already_exists',
        ));
    } else {
        $post_id = wp_insert_post(array(
            'post_title' => $fullName,
            'post_type' => 'potential_clients',
            'post_status' => 'publish',
        ));

        update_field($acf_full_name, $fullName, $post_id);
        update_field($acf_email, $email, $post_id);
        update_field($acf_company_type, $companyType, $post_id);
        update_field($acf_message, $message, $post_id);

        // Send email to the admin
        $to = get_field('td_contact_form_email', 'option') ?: get_option('admin_email');
        $subject = 'Downloadable Form Submission';

        $body = '';
        $body .= '<table>';
        $body .= '<tr><td>Full Name</td><td>' . $fullName . '</td></tr>';
        $body .= '<tr><td>Email</td><td>' . $email . '</td></tr>';
        $body .= '<tr><td>Company Type</td><td>' . $companyType . '</td></tr>';
        $body .= '<tr><td>Message</td><td>' . $message . '</td></tr>';
        $body .= '</table>';

        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = "From: $fullName <$email>";

        $response = wp_mail($to, $subject, $body, $headers);
        if ($response) {
            // Show success message
            return new WP_REST_Response(array(
                'status' => 200,
                'message' => __('Your message has been sent successfully. The download will start shortly. Or you can download it from here: <a href="' . $fileToDownload . '" target="_blank" download class="download-trigger">Download</a>', 'tdcomm'),
                'status_message' => 'email_sent_successfully',
                'file_url' => $fileToDownload,
                'file_name' => $fileName,
            ));
        } else {
            return rest_ensure_response(
                array(
                    'status' => 'error',
                    'message' => __('Something went wrong. Please try again later.', 'tdcomm'),
                )
            );
        }
    }
}
