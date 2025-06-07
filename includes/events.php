<?php
function spm_register_event_post_type() {
    register_post_type('pm_event', [
        'labels' => [
            'name' => 'Events',
            'singular_name' => 'Event',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'events'],
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
    ]);
}
add_action('init', 'spm_register_event_post_type');

function spm_handle_event_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['spm_event_nonce']) &&
        wp_verify_nonce($_POST['spm_event_nonce'], 'spm_create_event')) {
        $title = sanitize_text_field($_POST['event_title']);
        $image = sanitize_text_field($_POST['event_image_url']);
        $location = sanitize_text_field($_POST['event_location']);
        $date = sanitize_text_field($_POST['event_date']);
        $time = sanitize_text_field($_POST['event_time']);
        $description = sanitize_textarea_field($_POST['event_description']);
        $guests = sanitize_textarea_field($_POST['guest_emails']);

        $meta = [
            'event_image_url' => $image,
            'event_location' => $location,
            'event_date' => $date,
            'event_time' => $time,
            'guest_emails' => $guests,
        ];

        $post_id = wp_insert_post([
            'post_type'    => 'pm_event',
            'post_title'   => $title,
            'post_content' => $description,
            'post_status'  => 'publish',
            'post_author'  => get_current_user_id(),
            'meta_input'   => $meta,
        ]);

        if (!is_wp_error($post_id)) {
            wp_redirect(home_url('/dashboard?event_created=1'));
            exit;
        }
    }
}
add_action('template_redirect', 'spm_handle_event_form');
