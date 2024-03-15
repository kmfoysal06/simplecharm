<?php
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//add theme support for post thumbnails
function kmfsc_theme_setup(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support("title-tag");
    add_theme_support("automatic-feed-links");
    add_theme_support( "widgets" );
    add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			) );
	add_theme_support(
			'custom-background',
			apply_filters(
				'fairy_custom_background_args',
				array(
					'default-color' => 'e5ece9',
					'default-image' => '',
				)
			)
		);
	add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
	// Add support for responsive embedded content.
	add_theme_support('responsive-embeds');
	// Add support for default block styles.
	add_theme_support('wp-block-styles');
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu','simplecharm'),
        'footer' => esc_html__('Footer Menu','simplecharm')
    ));
}
if(function_exists('add_theme_support')){
    add_action('after_setup_theme','kmfsc_theme_setup');
}

function kmfsc_load_assets(){
    wp_enqueue_style('kmfsc-style',get_stylesheet_uri(),array(),'1.0.0','all');
}
if(function_exists('add_action')){
    add_action('wp_enqueue_scripts','kmfsc_load_assets');
}

function kmfsc_register_sidebars(){
    register_sidebar( [
        'name' => __('Post Page Sidebar','simple-charm'),
        'id' => 'kmfsc_post_sidebar',
        'description' => __("Sidebar For Post Page",'simple-charm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="kmfsc-widget-title">',
        'after_title' => '</h3>',
        ]
    );
    register_sidebar(
        [
            'name' => __('Home Page Sidebar','simple-charm'),
            'id' => 'kmfsc_home_sidebar',
            'description' => __("Sidebar For Home Page",'simple-charm'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="kmfsc-widget-title">',
            'after_title' => '</h3>'
        ]
        );
}
if(function_exists("kmfsc_register_sidebars")){
    add_action("widgets_init","kmfsc_register_sidebars");
}

if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
}


function add_default_widgets_to_sidebar() {
    $sidebar_id = 'kmfsc_home_sidebar'; // Sidebar ID

    // Get the current widget configuration
    $sidebars_widgets = get_option( 'sidebars_widgets' );

    // Add Latest Posts widget
    $sidebars_widgets[ $sidebar_id ][] = 'recent-posts-2';

    // Add Categories widget
    $sidebars_widgets[ $sidebar_id ][] = 'categories-2';

    // Save the updated widget configuration
    update_option( 'sidebars_widgets', $sidebars_widgets );
}
add_action( 'init', 'add_default_widgets_to_sidebar' );



//  function to set pagination in search page
