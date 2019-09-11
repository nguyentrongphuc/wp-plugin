<?php
/*
Plugin Name: Register CP About
Plugin URI:
Description: Register a Custom Post Type About (for the About BOOM page)
Version: 1.0
Author: Alex
Author URI:
Licence: none
*/

function register_cp_about(){
    register_post_type('about', 
        array(
            'labels'    => array(
                'name'          => __('About BOOM')
            ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'about-boom'),
        'menu_position'      => 20,
        'menu_icon'      => 'dashicons-info', //set the post icon to the "i" info via the REST API
        'show_in_rest'  => true, //if you want to enable the Gutemberg editor this needs to be set as true
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail' ) //enable block-editor / gutenberg in CP
        )
    );  
}
add_action('init','register_cp_about');
