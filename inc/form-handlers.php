<?php

function estatein_handle_contact() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'estatein_contact')) {
        wp_die('Security check failed.');
    }

    $to      = get_option('admin_email');
    $subject = 'New Contact Form Submission - Estatein';
    $message = sprintf(
        "Name: %s %s\nEmail: %s\nPhone: %s\nInquiry: %s\nReferral: %s\nMessage:\n%s",
        sanitize_text_field($_POST['first_name'] ?? ''),
        sanitize_text_field($_POST['last_name'] ?? ''),
        sanitize_email($_POST['email'] ?? ''),
        sanitize_text_field($_POST['phone'] ?? ''),
        sanitize_text_field($_POST['inquiry_type'] ?? ''),
        sanitize_text_field($_POST['referral'] ?? ''),
        sanitize_textarea_field($_POST['message'] ?? '')
    );

    wp_mail($to, $subject, $message);
    wp_redirect(home_url('/contact-us?message_sent=1'));
    exit;
}
add_action('admin_post_estatein_contact', 'estatein_handle_contact');
add_action('admin_post_nopriv_estatein_contact', 'estatein_handle_contact');

function estatein_handle_property_inquiry() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'estatein_property_inquiry')) {
        wp_die('Security check failed.');
    }

    $to      = get_option('admin_email');
    $prop_id = intval($_POST['property_id'] ?? 0);
    $subject = 'Property Inquiry - ' . ($prop_id ? get_the_title($prop_id) : 'General');
    $message = sprintf(
        "Property: %s\nName: %s %s\nEmail: %s\nPhone: %s\nMessage:\n%s",
        $prop_id ? get_the_title($prop_id) : 'General',
        sanitize_text_field($_POST['first_name'] ?? ''),
        sanitize_text_field($_POST['last_name'] ?? ''),
        sanitize_email($_POST['email'] ?? ''),
        sanitize_text_field($_POST['phone'] ?? ''),
        sanitize_textarea_field($_POST['message'] ?? '')
    );

    wp_mail($to, $subject, $message);
    $redirect = $prop_id ? get_permalink($prop_id) . '?inquiry_sent=1' : home_url('/properties?inquiry_sent=1');
    wp_redirect($redirect);
    exit;
}
add_action('admin_post_estatein_property_inquiry', 'estatein_handle_property_inquiry');
add_action('admin_post_nopriv_estatein_property_inquiry', 'estatein_handle_property_inquiry');
