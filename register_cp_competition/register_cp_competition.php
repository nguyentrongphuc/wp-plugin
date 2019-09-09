<?php
/*
Plugin Name: Register CP Competition
Plugin URI:
Description: Register a Custom Post Type Competition
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/

function register_cp_competition(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'Competition',
        'menu_icon' => 'dashicons-megaphone',
        //set the post to available via the REST API 
        'show_in_rest' => true, 
        //enable block-editor / gutenberg in CP
        'supports' => array('editor')
    );
    register_post_type('cp-competition', $args);
}
add_action('init','register_cp_competition');
