<?php

/**
 * Enqueue All Assets
 * @package SimpleCharm
 * @since 1.3
 */

namespace SIMPLECHARM_THEME\Inc\Classes;

use SIMPLECHARM_THEME\Inc\Traits\Singletone;

class Assets
{
    use Singletone;
    public function __construct()
    {
        $this->setup_hooks();
    }

    public function setup_hooks()
    {
        /**
         * Actions.
         */
        add_action("wp_enqueue_scripts", [$this,"register_styles"]);
        add_action("wp_enqueue_scripts", [$this,"register_scripts"]);
    }

    public function register_styles()
    {
        /**
         * Register Main Style
         */
        wp_register_style('simplecharm-style', get_stylesheet_uri(), array(), filemtime(SIMPLECHARM_DIR_PATH.'/style.css'), 'all');
        wp_register_style('simplecharm-compiled-style', SIMPLECHARM_DIR_URI . '/assets/build/css/main.css', array(), filemtime(SIMPLECHARM_DIR_PATH . '/assets/build/css/main.css'), 'all');
        wp_register_style('simplecharm-searchpage-style', SIMPLECHARM_DIR_URI . '/assets/build/css/search.css', array(), filemtime(SIMPLECHARM_DIR_PATH . '/assets/build/css/search.css'), 'all');
        /**
         * Enqueue Styles
         */
        wp_enqueue_style('simplecharm-style');
        wp_enqueue_style("dashicons");
        wp_enqueue_style('simplecharm-compiled-style');
        if (is_search()) {
            wp_enqueue_style('simplecharm-searchpage-style');
        }
    }
    public function register_scripts()
    {
        /**
         * Register Search Functionality Script
         */
		wp_register_script('simplecharm-search-functionalities', SIMPLECHARM_DIR_URI . '/assets/build/js/search.js', array('jquery'), filemtime(SIMPLECHARM_DIR_PATH . '/assets/build/js/search.js'), true);
		wp_register_script("simplecharm-single-post", SIMPLECHARM_DIR_URI . '/assets/build/js/post.js', [], filemtime(SIMPLECHARM_DIR_PATH . '/assets/build/js/post.js'), true);

        /**
         * Enqueue Scripts
         */
        if (is_search()) {
            wp_enqueue_script('simplecharm-search-functionalities');
            wp_localize_script('simplecharm-search-functionalities', 'admin_data', array(
                'ajax_url' => admin_url('admin-ajax.php'),
            ));
		}
		if(is_single()) {
			wp_enqueue_script("simplecharm-single-post");
		}


    }
}
