<?php
//add theme support for post thumbnails
function kmfnb_theme_setup(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support("title-tag");
    add_theme_support("automatic-feed-links");
    add_theme_support( 'html5', array( 'search-form','navigation-widgets' ) );
}
add_action('after_setup_theme','kmfnb_theme_setup');

function kmfnb_load_assets(){
    wp_enqueue_style('kmfnb-style',get_stylesheet_uri(),array(),'1.0.0','all');
}
add_action('wp_enqueue_scripts','kmfnb_load_assets');