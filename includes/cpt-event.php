<?php
function pm_register_event_post_type() {
    error_log('Registering pm_event post type...');

    $labels = array(
        'name'               => __('Events', 'party-minder'),
        'singular_name'      => __('Event', 'party-minder'),
        'add_new'            => __('Add New', 'party-minder'),
        'add_new_item'       => __('Add New Event', 'party-minder'),
        'edit_item'          => __('Edit Event', 'party-minder'),
        'view_item'          => __('View Event', 'party-minder'),
        'search_items'       => __('Search Events', 'party-minder'),
        'not_found'          => __('No events found', 'party-minder'),
        'menu_name'          => __('Events', 'party-minder'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('pm_event', $args);
}
add_action('init', 'pm_register_event_post_type', 0);
