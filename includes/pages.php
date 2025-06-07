<?php
function spm_create_pages() {
    $pages = ['Dashboard', 'Create Event', 'Invitations', 'Profile', 'Preferences'];
    foreach ($pages as $page) {
        if (!get_page_by_title($page)) {
            $post_id = wp_insert_post([
                'post_title'    => $page,
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_type'     => 'page',
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_wp_page_template', 'views/template-partyminder.php');
            }
        }
    }
}
function spm_delete_pages() {
    $pages = ['Dashboard', 'Create Event', 'Invitations', 'Profile', 'Preferences'];
    foreach ($pages as $page) {
        $post = get_page_by_title($page);
        if ($post) {
            wp_delete_post($post->ID, true);
        }
    }
}
