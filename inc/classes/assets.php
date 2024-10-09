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
    wp_register_style('simplecharm-searchpage-style', SIMPLECHARM_DIR_URI . '/assets/css/search_page.css', array(), filemtime(SIMPLECHARM_DIR_PATH . '/assets/css/search_page.css'), 'all');
    /**
     * Enqueue Styles
     */
    wp_enqueue_style('simplecharm-style');
    if(is_search()){
        wp_enqueue_style('simplecharm-searchpage-style');
    }
}
    public function register_scripts(){
    /**
     * Register Select2 Script
     */
    wp_register_script('simplecharm-multiselect-dropdown', SIMPLECHARM_DIR_URI . '/assets/js/multiselect.js', array(), filemtime(SIMPLECHARM_DIR_PATH . '/assets/js/multiselect.js'), true);
    wp_register_script('simplecharm_load_search_results', SIMPLECHARM_DIR_URI . '/assets/js/load_search.js', array(), filemtime(SIMPLECHARM_DIR_PATH . '/assets/js/load_search.js'), true);
    
    /**
     * Enqueue Scripts and Insert Additional Data if Needed
     */
        if(is_search()){
            wp_enqueue_script('simplecharm-multiselect-dropdown');
            wp_enqueue_script("simplecharm_load_search_results");
        }


    }
}