<?php
/*
Plugin Name: Register CP News
Plugin URI:
Description: Register a Custom Post Type Newz
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/
//Register Custom Post News
function register_cp_news(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'News'
    );
    register_post_type('news', $args);
}
add_action('init','register_cp_news');

//Register a Category for News
function register_category_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Category',
        'show_in_rest' => true,
    );
    register_taxonomy( 'category', array('post', 'news'), $args );
}
add_action( 'init','register_category_taxonomy' ); 

//Register Taxonomy Terms 
function register_category_terms( ) {
    wp_insert_term( 'Politics', 'category', $args = array (
        'description' => 'Let\'s talk about Politic'
    ));
    wp_insert_term( 'Sport', 'category', $args = array (
        'description' => 'Let\'s talk about Sport'
    ));
    wp_insert_term( 'Music', 'category', $args = array (
        'description' => 'Let\'s talk about Music'
    ));
}
add_action( 'init', 'register_category_terms');
