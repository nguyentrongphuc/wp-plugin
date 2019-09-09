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
    register_post_type('presenter', 
        array(
            'labels'    => array(
                'name'          => __('Presenters'),
                'singular_name' => __('Presenter')
            ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'presenter'),
        'menu_position'      => 20,
        'menu_icon'      => 'dashicons-universal-access-alt',        
        //set the post to available via the REST API 
        'show_in_rest'  => true, 
        //enable block-editor / gutenberg in CP
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        )
    );  
}
add_action('init','register_cp_presenter');
