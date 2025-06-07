<?php
/**
 * Plugin Name: Party Minder
 * Description: Core plugin for the Party Minder platform. Creates navigation, frontend UI, and embedded app block.
 * Version: 0.1.3
 * Author: Party Minder Team
 */
defined('ABSPATH') or die('No script kiddies please!');
define('SPM_PLUGIN_DIR', plugin_dir_path(__FILE__));
require_once SPM_PLUGIN_DIR . 'includes/pages.php';
require_once SPM_PLUGIN_DIR . 'includes/nav.php';
require_once SPM_PLUGIN_DIR . 'includes/events.php';
register_activation_hook(__FILE__, 'spm_create_pages');
register_uninstall_hook(__FILE__, 'spm_delete_pages');
function spm_register_blocks() {
    if (!function_exists('register_block_type')) return;
    wp_register_script(
        'spm-embed-app-editor',
        plugins_url('blocks/embed-app/index.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(plugin_dir_path(__FILE__) . 'blocks/embed-app/index.js')
    );
    register_block_type('partyminder/embed-app', array(
        'editor_script' => 'spm-embed-app-editor',
    ));
}
add_action('init', 'spm_register_blocks');
function spm_enqueue_styles() {
    wp_enqueue_style('spm-style', plugin_dir_url(__FILE__) . 'css/partyminder.css');
}
add_action('wp_enqueue_scripts', 'spm_enqueue_styles');
