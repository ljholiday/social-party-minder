<?php
function pm_add_event_meta_boxes() {
    add_meta_box(
        'pm_event_details',
        'Event Details',
        'pm_render_event_meta_box',
        'pm_event',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'pm_add_event_meta_boxes');

function pm_render_event_meta_box($post) {
    $location = get_post_meta($post->ID, '_pm_event_location', true);
    $date = get_post_meta($post->ID, '_pm_event_date', true);
    ?>
    <label for="pm_event_location">Location:</label>
    <input type="text" id="pm_event_location" name="pm_event_location" value="<?php echo esc_attr($location); ?>" style="width:100%;" />

    <label for="pm_event_date">Date:</label>
    <input type="date" id="pm_event_date" name="pm_event_date" value="<?php echo esc_attr($date); ?>" style="width:100%;" />
    <?php
}

function pm_save_event_meta($post_id) {
    if (array_key_exists('pm_event_location', $_POST)) {
        update_post_meta($post_id, '_pm_event_location', sanitize_text_field($_POST['pm_event_location']));
    }
    if (array_key_exists('pm_event_date', $_POST)) {
        update_post_meta($post_id, '_pm_event_date', sanitize_text_field($_POST['pm_event_date']));
    }
}
add_action('save_post', 'pm_save_event_meta');
