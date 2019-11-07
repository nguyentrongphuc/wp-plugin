<?php
/*
Plugin Name: Schedule Metabox
Plugin URI:
Description: Create metabox to display on schedule post to display date as an h4 on card
Version: 1.0
Author: Fanny
Author URI:
Licence: none
*/

//Register meta boxes

function mbs_register_meta_boxes(){
    add_meta_box('mbp', __('Add the time and date for this SHOW', 'mbs'), 'mbs_display_callback', 'schedule');
}
add_action( 'add_meta_boxes', 'mbs_register_meta_boxes');

/**
 * Meta box display callback
 * 
 * @param WP_Post $post Current post object.
 */
function mbs_display_callback( $post){
    //output form inputs via form.php
    include plugin_dir_path(__FILE__) . './form.php';
}

/**
 * Save Meta box content - save custom fields when users save or update a post
 * 
 * @param int $post_id Post ID.
 */
function mbs_save_meta_box($post_id){
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if($parent_id = wp_is_post_revision($post_id)){
        $post_id = $parent_id;
    }
    $fields = [
        'mbs_date'
    ];
    foreach ($fields as $field){
        if (array_key_exists($field, $_POST)){
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action( 'save_post', 'mbs_save_meta_box');