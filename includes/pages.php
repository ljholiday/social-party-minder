<?php
function spm_create_pages() {
    $pages = ['Dashboard', 'Create Event', 'Invitations', 'Profile', 'Preferences'];
    foreach ($pages as $page) {
        if (!get_page_by_title($page)) {
            wp_insert_post([
                'post_title' => $page,
                'post_content' => "Welcome to your $page page.",
                'post_status' => 'publish',
                'post_type' => 'page'
            ]);
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
