<?php
/**
 * Enqueue All Assets
 * @package SimpleCharm
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
        add_action("wp_enqueue_scripts",[$this,"register_scripts"]);
        add_action("wp_enqueue_scripts",[$this,"register_styles"]);
    }

    public function register_styles(){
    //register style
    wp_register_style('simplecharm-style', get_stylesheet_uri(), array(), '1.0.0', 'all');


    // Enqueue styles
    wp_enqueue_style('simplecharm-style');
    }

    public function register_scripts(){
        //register script
        
    }
}