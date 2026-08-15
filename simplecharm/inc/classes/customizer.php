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
    }

    /**
     * Register Customize add section,setting and control
     */
    public function customize_register($wp_customize) {
        $wp_customize->add_section('simplecharm_section', array(
            'title'    => __("Footer Options", "simplecharm"),
            'priority' => 30,
        ));
    
        $wp_customize->add_setting('simplecharm_footer_text', array(
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
	    'default' 		=> __("Proudly Powered by %LINK%", "simplecharm")
        ));
    
	$wp_customize->add_setting("simplecharm_footer_link_text", [
		'type' => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'default' 		=> __("WordPress", "simplecharm"),
 'transport'         => 'refresh',

	]);

	$wp_customize->add_setting('simplecharm_footer_link', array(
		'type'     => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'http://wordpress.org',
 'transport'         => 'refresh',

	));

        $wp_customize->add_control('footer_copyright_text', array(
            'label'    => __('Footer Copyright Text (use %LINK% for placing the link)', 'simplecharm'),

            'section'  => 'simplecharm_section',
            'settings' => 'simplecharm_footer_text',
            'type'     => 'text',
	));

	$wp_customize->add_control('footer_copyright_link_text', array(
            'label'    => __('Footer Copyright Link Text', 'simplecharm'),
            'section'  => 'simplecharm_section',
            'settings' => 'simplecharm_footer_link_text',
            'type'     => 'url',
		));

	$wp_customize->add_control('footer_copyright_link_url', array(
            'label'    => __('Footer Copyright Link URL', 'simplecharm'),

            'section'  => 'simplecharm_section',
            'settings' => 'simplecharm_footer_link',
            'type'     => 'text',
        ));
    }
}
