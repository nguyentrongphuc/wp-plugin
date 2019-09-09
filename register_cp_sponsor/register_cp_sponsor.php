<?php
/*
Plugin Name: Register CP Sponsor
Plugin URI:
Description: Register a Custom Post Type Sponsor
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/

function register_cp_sponsor(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'Sponsors',
        'menu_icon' => 'dashicons-groups',
        //set the post to available via the REST API 
        'show_in_rest' => true, 
        //enable block-editor / gutenberg in CP
        'supports' => array('editor')
    );
    register_post_type('cp-sponsors', $args);
}
add_action('init','register_cp_sponsor');
