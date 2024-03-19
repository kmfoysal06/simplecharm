<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme setup
function kmfsc_theme_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('widgets');
    add_theme_support( "custom-background" );
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-header', array(
        'flex-width'    => true,
        'width'         => 980,
        'flex-height'   => true,
        'height'        => 200,
        'default-image' => get_template_directory_uri() . '/assets/images/kmfsc-header-image.jpg',
        'uploads'       => true,
    ));
    add_theme_support('custom-logo', array(
        'height'      => 75,
        'width'       => 225,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support( 'editor-styles' );

    // Register navigation menus
    register_nav_menus(array(
        'kmfsc_header' => esc_html__('Primary Header Menu', 'simplecharm'),
     ));
}
if(function_exists("kmfsc_theme_setup")){
	add_action('after_setup_theme', 'kmfsc_theme_setup');
}

// Enqueue styles
function kmfsc_load_assets() {
    wp_enqueue_style('kmfsc-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
}
if(function_exists("kmfsc_load_assets")){
	add_action('wp_enqueue_scripts', 'kmfsc_load_assets');
}
// Register sidebars
function kmfsc_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Post Page Sidebar', 'simplecharm'),
        'id'            => 'kmfsc_post_sidebar',
        'description'   => __("Sidebar For Post Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="kmfsc-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Home Page Sidebar', 'simplecharm'),
        'id'            => 'kmfsc_home_sidebar',
        'description'   => __("Sidebar For Home Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="kmfsc-widget-title">',
        'after_title'   => '</h3>',
    ));
}
if(function_exists("kmfsc_register_sidebars")){
	add_action("widgets_init", "kmfsc_register_sidebars");
}

// Customize register
function kmfsc_customize_register($wp_customize) {
    $wp_customize->add_section('kmfsc_section', array(
        'title'    => __("Header Option", "simplecharm"),
        'priority' => 30,
    ));

    $wp_customize->add_setting('kmfsc_setting', array(
        'default'           => "on",
        'type'              => 'theme_mod',
        'sanitize_callback' => 'kmfsc_sanitize_checkbox',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('bg_in_grp', array(
        'label'    => __('Header Image Behind The Header Contents', 'simplecharm'),
        'section'  => 'kmfsc_section',
        'settings' => 'kmfsc_setting',
        'type'     => 'checkbox',
    ));
}

if(function_exists('kmfsc_customize_register')){
	add_action('customize_register', 'kmfsc_customize_register');
}
function kmfsc_sanitize_checkbox($checked) {
    // Boolean check.
    return (isset($checked) && true == $checked);
}

// Customizer live preview
function kmfsc_customizer_live_preview() {
    wp_enqueue_script('kmfsc-customizer', get_template_directory_uri() . '/assets/js/kmfsc_customize.js', array('jquery', 'customize-preview'), '', true);
    $header_image_url = get_header_image();
    if (filter_var($header_image_url, FILTER_VALIDATE_URL)) {
        wp_localize_script('kmfsc-customizer', 'kmfsc_header_info', array('kmfsc_header_image' => $header_image_url));
    }
}
if(function_exists('kmfsc_customizer_live_preview')){
	add_action('customize_preview_init', 'kmfsc_customizer_live_preview');
}
// Customize CSS for header control
function kmfsc_customize_css_for_header_control() {
    if (get_theme_mod('kmfsc_setting')) :
        ?>
        <style type="text/css">
            header {
                background-image: url("<?php echo esc_url(get_header_image()); ?>");
                background-repeat: no-repeat;
                background-size: cover;
                padding: 20px;
                background-position: center;
            }
            .kmfsc-header-image {
                display: none;
            }
            header * {
                color: #<?php echo esc_attr(get_theme_mod('header_textcolor', '0093d0')); ?>!important;
            }
        </style>
        <?php
    endif;
}
if(function_exists('kmfsc_customize_css_for_header_control')){
	add_action('wp_head', 'kmfsc_customize_css_for_header_control');
}
