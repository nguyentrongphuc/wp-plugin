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
        'menu_icon' => 'dashicons-universal-access-alt'
    );
    register_post_type('presenter', $args);
}
add_action('init','register_cp_presenter');