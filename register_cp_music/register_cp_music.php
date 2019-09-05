<?php
/*
Plugin Name: Register CP Music
Plugin URI:
Description: Register a Custom Post Type Music and its category
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/
//Register Custom Post Music
function register_cp_music(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'Music',
        'menu_icon' => 'dashicons-format-audio'
    );
    register_post_type('music', $args);
}
add_action('init','register_cp_music');

//Register a Category for Music
function register_category_music_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Category',
        'show_in_rest' => true,
    );
    register_taxonomy( 'category_music', array('post', 'music'), $args );
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
