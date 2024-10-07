<?php
/**
 * Enqueue All Assets
 * @package SimpleCharm
 * @since 1.3
 */
namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class Assets{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){
        /**
         * Actions.
         */
        add_action("wp_enqueue_scripts",[$this,"register_styles"]);
        add_action("wp_enqueue_scripts",[$this,"register_scripts"]);
    }

    public function register_styles(){
    /**
     * Register Main Style
     */
    wp_register_style('simplecharm-style', get_stylesheet_uri(), array(), filemtime(SIMPLECHARM_DIR_PATH.'/style.css'), 'all');
    wp_register_style('simplecharm-choices-style', SIMPLECHARM_DIR_URI . '/assets/css/choices/choices.min.css', array(), 1.00, 'all');
    /**
     * Enqueue Styles
     */
    wp_enqueue_style('simplecharm-style');
    
        if(is_search()){
            wp_enqueue_style('simplecharm-choices-style');
        }
    }

    public function register_scripts(){
    /**
     * Register Select2 Script
     */
    wp_register_script('simplecharm-choices-js', SIMPLECHARM_DIR_URI . '/assets/js/choices/choices.min.js', array(), 1.00, true);
    wp_register_script('simplecharm-choices-init-js', SIMPLECHARM_DIR_URI . '/assets/js/choices-init.js', ['jquery', 'simplecharm-choices-js'], 1.00, true);
    /**
     * Enqueue Scripts
     */
        if(is_search()){
            wp_enqueue_script('simplecharm-choices-js');
            wp_enqueue_script('simplecharm-choices-init-js');
        }
    }
}