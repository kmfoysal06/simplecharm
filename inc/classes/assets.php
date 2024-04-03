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
    }

    public function register_styles(){
    /**
     * Register Main Style
     */
    wp_register_style('simplecharm-style', get_stylesheet_uri(), array(), filemtime(SIMPLECHARM_DIR_PATH.'/style.css'), 'all');
    /**
     * Enqueue Main Style
     */
    wp_enqueue_style('simplecharm-style');
    }
}