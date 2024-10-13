<?php
/**
 * Register Sidebar and Load Sidebar Related Codes
 * @package SimpleCharm
 * @since 1.3
 */
namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class Sidebar{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action("widgets_init",[$this,"register_sidebars"]);
    }

    // Register sidebars
    public function register_sidebars() {
    register_sidebar(array(
        'name'          => __('Post Page Sidebar', 'simplecharm'),
        'id'            => 'simplecharm_post_sidebar',
        'description'   => __("Sidebar For Post Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="simplecharm-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Home Page Sidebar', 'simplecharm'),
        'id'            => 'simplecharm_home_sidebar',
        'description'   => __("Sidebar For Home Page", 'simplecharm'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="simplecharm-widget-title">',
        'after_title'   => '</h3>',
    ));
}
}