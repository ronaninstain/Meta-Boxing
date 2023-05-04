<?php
/* In function.php */
/* Meta-Box for facility Shoive starts */

function facility_metabox()
{
    add_meta_box(
        'facility_metabox',
        'Facility Field',
        'facility_metabox_callback',
        'course',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'facility_metabox');

function facility_metabox_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'facility_metabox_nonce');
    $value = get_post_meta($post->ID, '_facility_filed', true);
    echo '<label for="facility_filed">Facility Field</label>';
    echo '<textarea name="facility_filed" id="facility_filed" class="widefat">' . esc_textarea($value) . '</textarea>';
}

function save_facility_filed($post_id)
{
    if (!isset($_POST['facility_metabox_nonce']) || !wp_verify_nonce($_POST['facility_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    $field_name = 'facility_filed';
    if (isset($_POST[$field_name])) {
        update_post_meta($post_id, '_facility_filed', sanitize_text_field($_POST[$field_name]));
    }
}
add_action('save_post', 'save_facility_filed');
