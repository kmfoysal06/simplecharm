<?php
/**
 * Customize the Customizer (:
 * @package SimpleCharm
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
}