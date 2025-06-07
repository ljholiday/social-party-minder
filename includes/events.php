<?php
// Register custom post type for events
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
        'supports' => ['title', 'editor'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
    ]);
}
add_action('init', 'spm_register_event_post_type');

// Handle event creation form submission
function spm_handle_event_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['spm_event_nonce']) &&
        wp_verify_nonce($_POST['spm_event_nonce'], 'spm_create_event')) {

        $title = sanitize_text_field($_POST['event_title']);
        $location = sanitize_text_field($_POST['event_location']);
        $description = sanitize_textarea_field($_POST['event_description']);

        $post_id = wp_insert_post([
            'post_type'    => 'pm_event',
            'post_title'   => $title,
            'post_content' => "Location: $location\n\n$description",
            'post_status'  => 'publish',
            'post_author'  => get_current_user_id()
        ]);

        if (!is_wp_error($post_id)) {
            wp_redirect(home_url('/dashboard?event_created=1'));
            exit;
        }
    }
}
add_action('template_redirect', 'spm_handle_event_form');
