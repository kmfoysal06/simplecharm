<?php
/**
 * All Functionalities Related to User
 * @package SimpleCharm
 * @since 1.4
 */
namespace SIMPLECHARM_THEME\Inc\Classes; 
use SIMPLECHARM_THEME\Inc\Traits\Singletone;
class Users{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){
        add_action('wp_ajax_simplecharm_get_user_info', [$this, 'list_users']);
        add_action('wp_ajax_nopriv_simplecharm_get_user_info', [$this, 'list_users']);
    }

    public function list_users(){
        if (isset($_POST['user_id'])) {
            $user_id = intval(sanitize_text_field($_POST['user_id']));

            $user_info = get_userdata($user_id);

            if ($user_info) {
                $response = array(
                    'username' => $user_info->display_name,
                    'link' => get_author_posts_url($user_id),
                );
            } else {
                $response = array('error' => 'User not found.');
            }
        } else {
            $response = array('error' => 'User ID not provided.');
        }

        // Return JSON response
        echo json_encode($response);
        wp_die();
    }
}