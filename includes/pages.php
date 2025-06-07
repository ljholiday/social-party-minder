<?php
function spm_create_pages() {
    $pages = [
        'Dashboard'     => 'template-dashboard.php',
        'Create Event'  => 'template-create-event.php',
        'Invitations'   => 'template-invitations.php',
        'Profile'       => 'template-profile.php',
        'Preferences'   => 'template-preferences.php',
    ];

    foreach ($pages as $title => $template_file) {
        if (!get_page_by_title($title)) {
            $post_id = wp_insert_post([
                'post_title'   => $title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                $template_path = plugin_dir_path(__FILE__) . "../views/{$template_file}";
                if (file_exists($template_path)) {
                    update_post_meta($post_id, '_wp_page_template', "views/{$template_file}");
                }
            }
        }
    }
}

function spm_delete_pages() {
    $titles = ['Dashboard', 'Create Event', 'Invitations', 'Profile', 'Preferences'];
    foreach ($titles as $title) {
        $post = get_page_by_title($title);
        if ($post) {
            wp_delete_post($post->ID, true);
        }
    }
}

function spm_add_page_template($templates) {
    foreach (glob(plugin_dir_path(__FILE__) . '../views/template-*.php') as $file) {
        $basename = basename($file);
        $templates["views/{$basename}"] = ucwords(str_replace(['template-', '.php', '-'], ['', '', ' '], $basename));
    }
    return $templates;
}
add_filter('theme_page_templates', 'spm_add_page_template');

function spm_load_plugin_template($template) {
    if (is_page()) {
        $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true);
        if (str_starts_with($page_template, 'views/')) {
            $template_path = plugin_dir_path(__FILE__) . "../$page_template";
            if (file_exists($template_path)) {
                return $template_path;
            }
        }
    }
    return $template;
}
add_filter('template_include', 'spm_load_plugin_template');
