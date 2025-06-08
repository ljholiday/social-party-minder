<?php
function spm_create_pages() {
    $pages = [
        'party-minder'   => ['title' => 'Party Minder'],
        'dashboard'      => ['title' => 'Dashboard'],
        'create-event'   => ['title' => 'Create Event'],
        // Add more pages here as needed
    ];

    foreach ($pages as $slug => $data) {
        $title = $data['title'];
        $template = 'views/template-' . $slug . '.php';

        $page = get_page_by_title($title, OBJECT, 'page');

        if (!$page || $page->post_status === 'trash') {
            $page_id = wp_insert_post([
                'post_title'     => $title,
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'post_content'   => '',
                'post_author'    => get_current_user_id(),
            ]);

            if (!is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $template);
            }
        } else {
            // Always update the template for existing pages
            update_post_meta($page->ID, '_wp_page_template', $template);
        }
    }
}

function spm_delete_pages() {
    $pages = [
        'party-minder',
        'dashboard',
        'create-event',
        // Add more slugs here as needed
    ];

    foreach ($pages as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            wp_delete_post($page->ID, true);
        }
    }
}

