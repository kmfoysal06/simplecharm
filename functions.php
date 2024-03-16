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
    add_theme_support( "custom-header", [
    'flex-width'    => true,
	'width'         => 980,
	'flex-height'   => true,
	'height'        => 200,
	//'default-image' => get_template_directory_uri().'/assets/images/header-image.png',
	//'uploads' => true
	]
    );
	add_theme_support(
			'custom-logo',
			array(
				'height'      => 75,
				'width'       => 225,
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
    // Add support for full and wide align images.
    add_theme_support('align-wide');
    register_nav_menus(array(
        'header' => esc_html__('Primary Header Menu','simplecharm'),
        'footer' => esc_html__('Primary Footer Menu','simplecharm'),
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
        'name' => __('Post Page Sidebar','simplecharm'),
        'id' => 'kmfsc_post_sidebar',
        'description' => __("Sidebar For Post Page",'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="kmfsc-widget-title">',
        'after_title' => '</h3>',
        ]
    );
    register_sidebar(
        [
            'name' => __('Home Page Sidebar','simplecharm'),
            'id' => 'kmfsc_home_sidebar',
            'description' => __("Sidebar For Home Page",'simplecharm'),
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



//adding settings to customizer
function kmfsc_customize_register( $wp_customize ) {
   $wp_customize->add_section('kmfsc_section', [
		'title' => __("Header Option", "simplecharm"),
		'priority' => 30
   ]);
   $wp_customize->add_setting('kmfsc_setting', [
		'default' => "on",
		'type' => 'theme_mod', // Specify type as theme_mod
		'sanitize_callback' => 'kmfsc_sanitize_checkbox',
   ]);
   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bg_in_grp', [
		'label'      => __( 'Header Image Behind The Header Contents', 'simplecharm' ),
		'section'    => 'kmfsc_section',
		'settings'   => 'kmfsc_setting',
		'type' => 'checkbox'
   ] ) );
   function kmfsc_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( isset( $checked ) && true == $checked );
}
}



function kmfsc_customize_css_for_header_control() {
    ?>
         <style type="text/css">
			 <?php if (get_theme_mod('kmfsc_setting')): ?>
             header {
				background-image: url("<?php header_image();?>");
				background-repeat: no-repeat;
				background-size: cover;
				padding:20px;
				background-position:center;
			}
			.kmfsc-header-image{
				display:none;
			}
             <?php endif; ?>
			header * {
                 color: #<?php echo esc_attr(get_theme_mod('header_textcolor', '')); ?>!important;
             }
         </style>
    <?php
}

add_action( 'wp_head', 'kmfsc_customize_css_for_header_control');
add_action( 'customize_register', 'kmfsc_customize_register' );
