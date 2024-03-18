<?php
/*
Plugin Name: Custom API Credentials
Description: Adds custom fields for API credentials.
Version: 1.0
Author: Your Name
*/
function custom_api_credentials_meta_box() {
    add_meta_box(
        'custom-api-credentials-meta-box',
        'API Credentials',
        'render_custom_api_credentials_meta_box',
        'post', 
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_api_credentials_meta_box');
function render_custom_api_credentials_meta_box($post) {
    $api_key = get_post_meta($post->ID, 'api_key', true);
    $api_secret = get_post_meta($post->ID, 'api_secret', true);
    ?>
    <label for="api-key">API Key:</label><br />
    <input type="text" id="api-key" name="api_key" value="<?php echo esc_attr($api_key); ?>" /><br /><br />
    
    <label for="api-secret">API Secret:</label><br />
    <input type="text" id="api-secret" name="api_secret" value="<?php echo esc_attr($api_secret); ?>" />
    <?php
}
function save_custom_api_credentials_meta_box($post_id) {
    if (isset($_POST['api_key'])) {
        update_post_meta($post_id, 'api_key', sanitize_text_field($_POST['api_key']));
    }
    if (isset($_POST['api_secret'])) {
        update_post_meta($post_id, 'api_secret', sanitize_text_field($_POST['api_secret']));
    }
}
add_action('save_post', 'save_custom_api_credentials_meta_box');
