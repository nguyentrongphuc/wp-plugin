<?php
/*
Plugin Name: Register CP Schedule
Plugin URI:
Description: Register a Custom Post Type Schedule and its category
Version: 1.0
Author: Fanny
Author URI: https:creativeontheroad.com
Licence: none
*/
//Register Custom Post Schedule
function register_cp_schedule(){
    $args = array(
        'public' => true,
        'menu_position' => 20,
        'label' => 'Schedule',
        'menu_icon' => 'dashicons-calendar',
        //set the post to available via the REST API 
        'show_in_rest' => true, 
        //enable block-editor / gutenberg in CP
        'supports' => array('editor'),
    );
    register_post_type('schedule', $args);
}
add_action('init','register_cp_schedule');

//Register a Custom Taxonomy Shows for Schedule
function register_category_schedule_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Shows',
        'show_in_rest' => true,
        //disable the option to add, edit or delete the categories
        'capabilities' => [
            'manage_terms' => 'manage_category_schedule',
            'edit_terms' => 'manage_category_schedule',
            'delete_terms' => 'manage_category_schedule',
            'assign_terms' => 'edit_posts'],
    );
    register_taxonomy( 'category_schedule', array('schedule'), $args );
}
add_action( 'init','register_category_schedule_taxonomy' ); 


function register_subcategory_speciality_taxonomy() {
    $args = array(
        'hierarchical'=> true,
        'label' => 'Speciality Shows',
    );
    register_taxonomy( 'speciality-shows', array('schedule'), $args );
}
add_action( 'init','register_subcategory_speciality_taxonomy' ); 

//Register Taxonomy Terms 
function register_category_schedule_terms( ) {
    wp_insert_term( 'Big Breakfast', 'category_schedule', $args = array (
        'description' => 'BOOM’s Big Breakfast show'
    ));
    wp_insert_term( 'The Drive Home', 'category_schedule', $args = array (
        'description' => 'The Drive Home Show'
    ));
    // wp_insert_term( 'Speciality Shows', 'category_schedule', $args = array (
    //     'description' => 'Speciality Shows',
    //     'slug' => 'speciality-shows',
    // ));
    //To declare children categories
    $parent_term = term_exists('boombackyard');//get all the Parents for this taxonomy.
    wp_insert_term( 'BOOM\'s Backyard', 'category_schedule', $args = array (
        'description' => 'BOOM\'s Backyard',
        'child_of' => $parent_term['term_id'],
    ));
}
add_action( 'init', 'register_category_schedule_terms');

