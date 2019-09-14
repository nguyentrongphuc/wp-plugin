<?php
/*
Plugin Name: Presenter Metabox
Plugin URI:
Description: Create metabox to display on presenter post to add social links via custom fields
Version: 1.0
Author: Fanny
Author URI:
Licence: none
*/

//Register meta boxes

function mbp_register_meta_boxes(){
    add_meta_box('mbp', __('Add Instagram and Email to the Presenter Profile', 'mbp'), 'mbp_display_callback', 'presenter');
}
add_action( 'add_meta_boxes', 'mbp_register_meta_boxes');

/**
 * Meta box display callback
 * 
 * @param WP_Post $post Current post object.
 */
function mbp_display_callback( $post){
    //output form inputs via form.php
    include plugin_dir_path(__FILE__) . './form.php';
}

/**
 * Save Meta box content - save custom fields when users save or update a post
 * 
 * @param int $post_id Post ID.
 */
function mbp_save_meta_box($post_id){
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if($parent_id = wp_is_post_revision($post_id)){
        $post_id = $parent_id;
    }
    $fields = [
        'mbp_insta',
        'mbp_email',
    ];
    foreach ($fields as $field){
        if (array_key_exists($field, $_POST)){
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action( 'save_post', 'mbp_save_meta_box');