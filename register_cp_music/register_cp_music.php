<?php
/*
Plugin Name: Register CP Music
Plugin URI:
Description: Register a Custom Post Type Music and its category
Version: 1.1
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/
//Register Custom Post Music
function register_cp_music(){
    register_post_type('music', 
        array(
            'labels'    => array(
                'name'          => __('Musics'),
                'singular_name' => __('Music')
            ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'music'),
        'menu_position'      => 20,
        'menu_icon'      => 'dashicons-format-audio',        
        //set the post to available via the REST API 
        'show_in_rest'  => true, 
        //enable block-editor / gutenberg in CP
        'supports'      => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        )
    );  
}
add_action('init','register_cp_music');

//Register a Custom Taxonomy Category for Music
function register_category_music_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Categories',
        'show_in_rest' => true,
        //disable the option to add, edit or delete the categories
        'capabilities' => [
            'manage_terms' => 'manage_category_music',
            'edit_terms' => 'manage_category_music',
            'delete_terms' => 'manage_category_music',
            'assign_terms' => 'edit_posts'],
    );
    register_taxonomy( 'category_music', array('music'), $args );
}
add_action( 'init','register_category_music_taxonomy' ); 

//Register Taxonomy Terms 
function register_category_music_terms( ) {
    wp_insert_term( 'Album', 'category_music', $args = array (
        'description' => 'Albums of the month'
    ));
    wp_insert_term( 'Featured Artist', 'category_music', $args = array (
        'description' => 'Featured Artists of the month'
    ));
    wp_insert_term( 'Event', 'category_music', $args = array (
        'description' => 'Music Events the month'
    ));
}
add_action( 'init', 'register_category_music_terms');
