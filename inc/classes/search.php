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
        if(str_ends_with(get_rest_url(), '?rest_route=/')){
           $categories_api_url = get_rest_url() . 'wp/v2/categories&per_page=100';
        }else{
           $categories_api_url = get_rest_url() . 'wp/v2/categories?per_page=100';
        }
        $response = file_get_contents( esc_url($categories_api_url) );
        if ( $response !== false) {
            $categories = json_decode( $response, true );
            return $categories;
        }
    }
}