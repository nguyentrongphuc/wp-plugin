<?php
/*
Plugin Name: Register Boom Custom Posts
Plugin URI:
Description: Register a Custom Post Types - About, Competitions
Version: 1.0
Author: Fanny/John/Alex
Author URI:
Licence: none
*/

//------------------Register Custom Post type for About--------------------------
if (!function_exists('register_cp_about')) {
    function register_cp_about()
    {
        register_post_type(
            'about',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('About BOOM', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'about-boom'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-info', //set the post icon to the "i" info via the REST API
                'show_in_rest'  => true, //if you want to enable the Gutemberg editor this needs to be set as true
                'supports'      => array('title', 'editor', 'author', 'thumbnail'),//enable block-editor / gutenberg in CP
                // //Removes support for the "Add New" buttons and links.
                // 'capabilities'    => array(
                //     'create_posts' => 'do_not_allow',
                // ),
            )
        );
    }
}
add_action('init', 'register_cp_about');

//------------------Register Custom Post type for Competitions--------------------------
if (!function_exists('register_cp_competition')) {
    function register_cp_competition()
    {
        register_post_type(
            'competition',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Competitions', 'boom_radio'),
                    'singular_name' => esc_html_x('Competition', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'competition'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-megaphone',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_competition');

//-------------------------Register Custom Post Music----------------------------
if (!function_exists('register_cp_music')) {
    function register_cp_music()
    {
        register_post_type(
            'music_post',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Musicians', 'boom_radio'),
                    'singular_name' => esc_html_x('Musician', 'boom_radio'),
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'music-post'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-format-audio',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_music');

//Register a Custom Taxonomy Category for Music
if (!function_exists('register_category_music_taxonomy')) {
    function register_category_music_taxonomy()
    {
        $args = array(
            'hierarchical' => true,
            'label' => 'Music Posts',
            'show_in_rest' => true,
            'show_admin_column' => true,
            //Added too call loop
            'rewrite'       => array('slug' => 'music'),
            //disable the option to add, edit or delete the categories
            'capabilities' => [
                'manage_terms' => 'manage_category_music',
                'edit_terms' => 'manage_category_music',
                'delete_terms' => 'manage_category_music',
                'assign_terms' => 'edit_posts'
            ],
        );
        register_taxonomy('category_music', array('music_post'), $args);
    }
}
add_action('init', 'register_category_music_taxonomy');

//Register Taxonomy Terms 
if (!function_exists('register_category_music_terms')) {
    function register_category_music_terms()
    {
        //Sets taxonmoy for each of the four area in the contact page
        wp_insert_term('Artists', 'category_music', $args = array(
            'description' => 'New Music we like'
        ));
        wp_insert_term('Featured Artist', 'category_music', $args = array(
            'description' => 'Featured Artists of the month'
        ));
        //wp_insert_term('Event', 'category_music', $args = array(
        //  'description' => 'Music Events the month'
        //));
    }
}
add_action('init', 'register_category_music_terms');

//-----------------------------------Register Custom Post News------------------------
if (!function_exists('register_cp_news')) {
    function register_cp_news()
    {
        register_post_type(
            'news',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('News', 'boom_radio'),
                    'singular_name' => esc_html_x('News', 'boom_radio'),
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'latest-news'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-admin-site-alt2',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_news');

//Register a Custom Taxonomy Category for News
if (!function_exists('register_category_news_taxonomy')) {
    function register_category_news_taxonomy()
    {
        $args = array(
            'hierarchical' => true,
            'label' => 'News Archive',
            'show_admin_column' => true,
            'show_in_rest' => true,
            //disable the option to add, edit or delete the categories
            'capabilities' => [
                'manage_terms' => 'manage_category_news',
                'edit_terms' => 'manage_category_news',
                'delete_terms' => 'manage_category_news',
                'assign_terms' => 'edit_posts'
            ],
        );
        register_taxonomy('category_news', array('news'), $args);
    }
}
add_action('init', 'register_category_news_taxonomy');

//Register Taxonomy Terms 
if (!function_exists('register_category_news_term')) {
    function register_category_news_terms()
    {
        wp_insert_term('Entertainment', 'category_news', $args = array(
            'description' => 'Let\'s talk about everything!'
        ));
        wp_insert_term('Sport', 'category_news', $args = array(
            'description' => 'Let\'s talk about Sport'
        ));
        wp_insert_term('Movie', 'category_news', $args = array(
            'description' => 'Let\'s talk about Cinema'
        ));
        wp_insert_term('Music News', 'category_news', $args = array(
            'description' => 'Let\'s talk about Music'
        ));
        wp_insert_term('Events', 'category_news', $args = array(
            'description' => 'What\'s going on in Perth'
        ));
        wp_insert_term('Breaking News', 'category_news', $args = array(
            'description' => 'Your Breaking News on a silver plate!'
        ));
        wp_insert_term('Old Posts', 'category_news', $args = array(
            'description' => 'Posts from previous Wordpress website'
        ));
    }
}
add_action('init', 'register_category_news_terms');

//-----------------------------------Register Custom Post Presenter------------------------
if (!function_exists('register_cp_presenter')) {
    function register_cp_presenter()
    {
        register_post_type(
            'presenter',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Presenters', 'boom_radio'),
                    'singular_name' => esc_html_x('Presenter', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'presenter'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-universal-access-alt',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_presenter');

//-------------------------Register Custom Post Schedule----------------------------
if (!function_exists('register_cp_schedule')) {
    function register_cp_schedule()
    {
        register_post_type(
            'schedule',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Schedule', 'boom_radio'),
                    'singular_name' => esc_html_x('Schedule', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'schedule'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-calendar',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_schedule');

//Register a Custom Taxonomy Shows for Schedule
if (!function_exists('register_category_schedule_taxonomy')) {
    function register_category_schedule_taxonomy()
    {
        $args = array(
            'hierarchical' => true,
            'label' => 'Show Categories',
            'show_admin_column' => true,
            'show_in_rest' => true,
            //disable the option to add, edit or delete the categories
            'capabilities' => [
                'manage_terms' => 'manage_category_schedule',
                'edit_terms' => 'manage_category_schedule',
                'delete_terms' => 'manage_category_schedule',
                'assign_terms' => 'edit_posts'
            ],
        );
        register_taxonomy('category_schedule', 'schedule', $args);
    }
}
add_action('init', 'register_category_schedule_taxonomy');


//Register Taxonomy Terms 
if (!function_exists('register_category_schedule_terms')) {
    function register_category_schedule_terms()
    {
        wp_insert_term('Big Breakfast', 'category_schedule', $args = array(
            'description' => 'BOOM’s Big Breakfast Show',
        ));
        wp_insert_term('The Drive Home', 'category_schedule', $args = array(
            'description' => 'The Drive Home Show'
        ));
        wp_insert_term('Speciality Shows', 'category_schedule', $args = array(
            'description' => 'Speciality Shows',
        ));
    }
}
add_action('init', 'register_category_schedule_terms');


//-----------------Register Custom Post type Sponsor---------------------
if (!function_exists('register_cp_sponsor')) {
    function register_cp_sponsor()
    {
        register_post_type(
            'sponsors',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Sponsors', 'boom_radio'),
                    'singular_name' => esc_html_x('Sponsor', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'sponsors'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-groups',
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_sponsor');

//-------------------Register Custom post type for Contact-----------------
if (!function_exists('register_cp_contact')) {
    function register_cp_contact()
    {
        register_post_type(
            'contact_details',
            array(
                'labels'    => array(
                    'name'          => esc_html_x('Contact Details', 'boom_radio'),
                    'singular_name' => esc_html_x('Contact Details', 'boom_radio')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => 'contact-details'),
                'menu_position'      => 20,
                'menu_icon'      => 'dashicons-location-alt',
                // //Removes support for the "Add New" buttons and links.
                // 'capabilities'    => array(
                //     'create_posts' => 'do_not_allow',
                // ),
                //set the post to available via the REST API 
                'show_in_rest'  => true,
                //enable block-editor / gutenberg in CP
                'supports'      => array('title', 'editor', 'author', 'content', 'thumbnail', 'excerpt', 'comments')
            )
        );
    }
}
add_action('init', 'register_cp_contact');

//Register a Custom Taxonomy Category for Contact
if (!function_exists('register_category_contact_taxonomy')) {
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
}
add_action('init', 'register_category_contact_taxonomy');

//Register Taxonomy Terms 
if (!function_exists('register_category_contact_terms')) {
    function register_category_contact_terms()
    {
        //Sets taxonmoy for each of the four area in the contact page
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
}
add_action('init', 'register_category_contact_terms');
