<?php
/*
Plugin Name: Register CP Competition
Plugin URI:
Description: Register a Custom Post Type Competition
Version: 1.0
Author: Fanny/John/Alex
Author URI: https:creativeontheroad.com
Licence: none
*/

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
add_action('init', 'register_cp_competition');
