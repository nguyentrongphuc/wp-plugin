<?php
/*
Plugin Name: Register CP Presenter
Plugin URI:
Description: Register a Custom Post Type Presenter
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/

function register_cp_presenter(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'Presenters',
        'menu_icon' => 'dashicons-universal-access-alt',
        //set the post to available via the REST API 
        'show_in_rest' => true, 
        //enable block-editor / gutenberg in CP
        'supports' => array('editor')
    );
    register_post_type('cp-presenter', $args);
}
add_action('init','register_cp_presenter');
