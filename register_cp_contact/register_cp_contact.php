<?php
/*
Plugin Name: Register CP Contact
Plugin URI:
Description: Register a Custom Post Type Contact and its category
Version: 1.1
Author: Fanny/John
Author URI: https:creativeontheroad.com
Licence: none
*/
//Register Custom Post Contact
function register_cp_contact()
{
    register_post_type(
        'contact_details',
        array(
            'labels'    => array(
                'name'          => __('Contact Details'),
                'singular_name' => __('Contact Details')
            ),
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => array('slug' => 'contact-details'),
            'menu_position'      => 20,
            'menu_icon'      => 'dashicons-location-alt',
            //set the post to available via the REST API 
            'show_in_rest'  => true,
            //enable block-editor / gutenberg in CP
            'supports'      => array('title', 'editor', 'author', 'content', 'thumbnail', 'excerpt', 'comments')
        )
    );
}
add_action('init', 'register_cp_contact');

//Register a Custom Taxonomy Category for Music
function register_category_contact_taxonomy()
{
    $args = array(
        'hierarchical' => true,
        'label' => 'Contact Details',
        'show_in_rest' => true,
        'show_admin_column' => true,
        //Added too call loop
        'rewrite'       => array('slug' => 'contact-details'),
        //disable the option to add, edit or delete the categories
        'capabilities' => [
            'manage_terms' => 'manage_category_contact',
            'edit_terms' => 'manage_category_contact',
            'delete_terms' => 'manage_category_contact',
            'assign_terms' => 'edit_posts'
        ],
    );
    register_taxonomy('category_contact', array('contact_details'), $args);
}
add_action('init', 'register_category_contact_taxonomy');

//Register Taxonomy Terms 
function register_category_contact_terms()
{
    //TASK- TO BE UPDATED TO ARTISTS FOR LIVE SITE
    wp_insert_term('Address', 'category_contact', $args = array(
        'description' => 'Boom Address'
    ));
    wp_insert_term('Postal', 'category_contact', $args = array(
        'description' => 'Boom Postal Address'
    ));
    wp_insert_term('Management', 'category_contact', $args = array(
        'description' => 'Boom Management Team'
    ));
    wp_insert_term('Phone', 'category_contact', $args = array(
        'description' => 'Boom Phone Number'
    ));
}
add_action('init', 'register_category_contact_terms');
