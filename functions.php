<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme setup
function simplecharm_theme_setup() {
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
        'default-image' => get_template_directory_uri() . '/assets/images/simplecharm-header-image.jpg',
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
        'simplecharm_header' => esc_html__('Primary Header Menu', 'simplecharm'),
     ));
}
if(function_exists("simplecharm_theme_setup")){
	add_action('after_setup_theme', 'simplecharm_theme_setup');
}

// Enqueue styles
function simplecharm_load_assets() {
    wp_enqueue_style('simplecharm-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
}
if(function_exists("simplecharm_load_assets")){
	add_action('wp_enqueue_scripts', 'simplecharm_load_assets');
}
// Register sidebars
function simplecharm_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Post Page Sidebar', 'simplecharm'),
        'id'            => 'simplecharm_post_sidebar',
        'description'   => __("Sidebar For Post Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="simplecharm-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Home Page Sidebar', 'simplecharm'),
        'id'            => 'simplecharm_home_sidebar',
        'description'   => __("Sidebar For Home Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="simplecharm-widget-title">',
        'after_title'   => '</h3>',
    ));
}
if(function_exists("simplecharm_register_sidebars")){
	add_action("widgets_init", "simplecharm_register_sidebars");
}

// Customize register
function simplecharm_customize_register($wp_customize) {
    $wp_customize->add_section('simplecharm_section', array(
        'title'    => __("Header Option", "simplecharm"),
        'priority' => 30,
    ));

    $wp_customize->add_setting('simplecharm_setting', array(
        'default'           => "on",
        'type'              => 'theme_mod',
        'sanitize_callback' => 'simplecharm_sanitize_checkbox',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control('bg_in_grp', array(
        'label'    => __('Header Image Behind The Header Contents', 'simplecharm'),
        'section'  => 'simplecharm_section',
        'settings' => 'simplecharm_setting',
        'type'     => 'checkbox',
    ));
}

if(function_exists('simplecharm_customize_register')){
	add_action('customize_register', 'simplecharm_customize_register');
}
function simplecharm_sanitize_checkbox($checked) {
    // Boolean check.
    return (isset($checked) && true == $checked);
}

// Customizer live preview
function simplecharm_customizer_live_preview() {
    wp_enqueue_script('simplecharm-customizer', get_template_directory_uri() . '/assets/js/simplecharm_customize.js', array('jquery', 'customize-preview'), '', true);
    $header_image_url = get_header_image();
    if (filter_var($header_image_url, FILTER_VALIDATE_URL)) {
        wp_localize_script('simplecharm-customizer', 'simplecharm_header_info', array('simplecharm_header_image' => $header_image_url));
    }
}
if(function_exists('simplecharm_customizer_live_preview')){
	add_action('customize_preview_init', 'simplecharm_customizer_live_preview');
}
// Customize CSS for header control
function simplecharm_customize_css_for_header_control() {
    ?>
        <style type="text/css">
    <?php if (get_theme_mod('simplecharm_setting')) : ?>
            header {
                background-image: url("<?php echo esc_url(get_header_image()); ?>");
                background-repeat: no-repeat;
                background-size: cover;
                padding: 20px;
                background-position: center;
            }
            .simplecharm-header-image {
                display: none;
            }
    <?php endif ; ?>
    <?php if (get_theme_mod('header_textcolor')) : ?>
            header * {
                color: #<?php echo esc_attr(get_theme_mod('header_textcolor', '0093d0')); ?>!important;
            }
        <?php endif; ?>
        </style>
        <?php
}
if(function_exists('simplecharm_customize_css_for_header_control')){
	add_action('wp_head', 'simplecharm_customize_css_for_header_control');
}
