<?php
/**
 * Search Functionality
 * @package SimpleCharm
 * @since 1.4
 */
namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class Search{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){}

    public function list_categories(){
        $site_url = get_site_url();
        $categories_api_url = $site_url . '/wp-json/wp/v2/categories?per_page=100';
        $response = wp_remote_get( $categories_api_url );

        if ( is_array( $response ) && ! is_wp_error( $response )) {
            $body = wp_remote_retrieve_body( $response );
            $categories = json_decode( $body, true );
            return $categories;
        }
    }
}