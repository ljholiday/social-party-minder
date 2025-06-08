<?php
// Force WordPress to load plugin templates based on page slug
add_filter('template_include', 'spm_use_plugin_template');

function spm_use_plugin_template($template) {
    if (is_page()) {
        $slug = get_post_field('post_name');
        $plugin_template = plugin_dir_path(__FILE__) . '../views/template-' . $slug . '.php';

        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }

    return $template;
}

