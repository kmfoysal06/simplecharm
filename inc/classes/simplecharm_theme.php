<?php
/**
 * Bootstraps The Theme
 * @package SimpleCharm
 * @since 1.3
 */

namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class SimpleCharm_Theme{
    use Singletone;
    public function __construct(){
        /**
         * Load Classes
         */
        Assets::get_instance();
        Sidebar::get_instance();
        Customizer::get_instance();
        Search::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this,'simplecharm_theme_setup']);
        
    }

    public function simplecharm_theme_setup() {
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
            'navigation-widgets'
        ));
        add_theme_support('custom-header', array(
            'flex-width'    => true,
            'width'         => 980,
            'flex-height'   => true,
            'height'        => 200,
            'default-image' => SIMPLECHARM_DIR_URI . '/assets/build/img/simplecharm-header-image.jpg',
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
}