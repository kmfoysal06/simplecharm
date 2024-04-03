<?php
/**
 *  All Function and Hook Registrations Here
 * @package SimpleCharm
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
require_once get_template_directory().'/inc/helpers/autoload.php';
require_once get_template_directory().'/inc/helpers/template-tags.php';
function simplecharm_get_instance(){
    return \SIMPLECHARM_THEME\Inc\Classes\SimpleCharm_Theme::get_instance();
}
simplecharm_get_instance();




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
