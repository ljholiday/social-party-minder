<?php
/**
 * Plugin Name: Party Minder
 * Description: Core plugin for the Party Minder platform. Creates navigation, frontend UI, and embedded app block.
 * Version: 0.1.4
 * Author: Party Minder Team
 */

defined('ABSPATH') || exit;

define('SPM_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SPM_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load required plugin includes
require_once SPM_PLUGIN_DIR . 'includes/pages.php';
require_once SPM_PLUGIN_DIR . 'includes/template_loader.php';
require_once SPM_PLUGIN_DIR . 'includes/nav.php';
require_once SPM_PLUGIN_DIR . 'includes/events.php';

// Register hooks
register_activation_hook(__FILE__, 'spm_create_pages');
register_uninstall_hook(__FILE__, 'spm_delete_pages');

// Register the Gutenberg block
function spm_register_blocks() {
    if (!function_exists('register_block_type')) return;

    $script_path = SPM_PLUGIN_DIR . 'blocks/embed-app/index.js';
    if (!file_exists($script_path)) return;

    wp_register_script(
        'spm-embed-app-editor',
        plugins_url('blocks/embed-app/index.js', __FILE__),
        ['wp-blocks', 'wp-element', 'wp-editor'],
        filemtime($script_path)
    );

    register_block_type('partyminder/embed-app', [
        'editor_script' => 'spm-embed-app-editor',
    ]);
}
add_action('init', 'spm_register_blocks');

// Enqueue CSS
function spm_enqueue_styles() {
    wp_enqueue_style('spm-style', plugins_url('css/partyminder.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'spm_enqueue_styles');

