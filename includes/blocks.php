<?php
function spm_register_event_block() {
    wp_register_script(
        'spm-event-info-block',
        plugins_url('js/event-block.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(plugin_dir_path(__FILE__) . '../js/event-block.js')
    );

    register_block_type('spm/event-info', array(
        'editor_script' => 'spm-event-info-block'
    ));
}
add_action('init', 'spm_register_event_block');
