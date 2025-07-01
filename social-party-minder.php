<?php
/**
 * Plugin Name: Social Party Minder
 * Description: Custom block-based event plugin for building social gatherings.
 * Version: 0.1.0
 * Author: Your Name
 * License: GPL2+
 */

defined('ABSPATH') || exit;

// Register custom block category
add_filter('block_categories_all', function( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'social-party-minder',
                'title' => __('Social Party Minder', 'social-party-minder'),
            ],
        ]
    );
}, 10, 2);

// Register blocks dynamically
function spm_register_blocks() {
    $blocks_dir = plugin_dir_path(__FILE__) . 'blocks/';
    foreach (glob($blocks_dir . '*', GLOB_ONLYDIR) as $block_path) {
        if (file_exists($block_path . '/block.json')) {
            register_block_type($block_path);
        }
    }
}
add_action('init', 'spm_register_blocks');

