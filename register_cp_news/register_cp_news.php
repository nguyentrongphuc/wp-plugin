<?php
/*
Plugin Name: Register CP News
Plugin URI:
Description: Register a Custom Post Type News and its category
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
        'label' => 'News',
        'menu_icon' => 'dashicons-admin-site-alt2',        
        //set the post to available via the REST API 
        'show_in_rest' => true, 
        //enable block-editor / gutenberg in CP
        'supports' => array('editor')
    );
    register_post_type('cp-news', $args);
}
add_action('init','register_cp_news');

//Register a Custom Taxonomy Category for News
function register_category_news_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Categories',
        'show_in_rest' => true,
        //disable the option to add, edit or delete the categories
        'capabilities' => [
            'manage_terms' => 'manage_category_news',
            'edit_terms' => 'manage_category_news',
            'delete_terms' => 'manage_category_news',
            'assign_terms' => 'edit_posts'],
    );
    register_taxonomy( 'category_news', array('cp-news'), $args );
}
add_action( 'init','register_category_news_taxonomy' ); 

//Register Taxonomy Terms 
function register_category_news_terms( ) {
    wp_insert_term( 'Politics', 'category_news', $args = array (
        'description' => 'Let\'s talk about Politic'
    ));
    wp_insert_term( 'Sport', 'category_news', $args = array (
        'description' => 'Let\'s talk about Sport'
    ));
    wp_insert_term( 'Cinema', 'category_news', $args = array (
        'description' => 'Let\'s talk about Cinema'
    ));
    wp_insert_term( 'Music News', 'category_news', $args = array (
        'description' => 'Let\'s talk about Music'
    ));
    wp_insert_term( 'Breaking News', 'category_news', $args = array (
        'description' => 'Your Breaking News on a silver plate!'
    ));
    wp_insert_term( 'Old Posts', 'category_news', $args = array (
        'description' => 'Posts from previous Wordpress website'
    ));
}
add_action( 'init', 'register_category_news_terms');
