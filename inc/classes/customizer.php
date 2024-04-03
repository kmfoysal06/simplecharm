<?php
/**
 * Customize the Customizer (:
 * @package SimpleCharm
 * @since 1.3
 */
namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class Customizer{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){
        /**
         * Actions.
         */
        add_action("customize_register",[$this,"customize_register"]);
        add_action('customize_preview_init', [$this,'customizer_live_preview']);
        add_action('wp_head', [$this,'customize_css_for_header_control']);
    }

    /**
     * Register Customize add section,setting and control
     */
    public function customize_register($wp_customize) {
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
    /**
     * Customizer live preview
     */
    public function customizer_live_preview() {
    //register script
    wp_register_script('simplecharm-customizer', SIMPLECHARM_DIR_URI . '/assets/js/simplecharm_customize.js', array('jquery', 'customize-preview'),filemtime(SIMPLECHARM_DIR_PATH . '/assets/js/simplecharm_customize.js'), true);
    //sending header image as to the js file
    $header_image_url = get_header_image();
    if (filter_var($header_image_url, FILTER_VALIDATE_URL)) {
        wp_localize_script('simplecharm-customizer', 'simplecharm_header_info', array('simplecharm_header_image' => $header_image_url));
    }

    //enqueue script
    wp_enqueue_script("simplecharm-customizer");
}
    /**
     * Customize CSS for header control
     */
    public function customize_css_for_header_control() {
    ?>
<style type="text/css">
<?php if (get_theme_mod('simplecharm_setting')) : ?>header {
    background-image: url("<?php echo esc_url(get_header_image()); ?>");
    background-repeat: no-repeat;
    background-size: cover;
    padding: 20px;
    background-position: center;
}

.simplecharm-header-image {
    display: none;
}

<?php endif;

?><?php if (get_theme_mod('header_textcolor')) : ?>header * {
    color: #<?php echo esc_attr(get_theme_mod('header_textcolor', '0093d0'));
    ?> !important;
}

<?php endif;
?>
</style>
<?php
}
}