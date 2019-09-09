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
    register_post_type('sponsors', 
        array(
            'labels'    => array(
                'name'          => __('Sponsors'),
                'singular_name' => __('Sponsor')
            ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'sponsors'),
        'menu_position'      => 20,
        'menu_icon'      => 'dashicons-groups',        
        //set the post to available via the REST API 
        'show_in_rest'  => true, 
        //enable block-editor / gutenberg in CP
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        )
    );  
}
add_action('init','register_cp_sponsor');
