<?php
/**
 *  All Function and Hook Registrations Here
 * @package SimpleCharm
 * @since 1.0
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!defined("SIMPLECHARM_DIR_PATH")) {
    define("SIMPLECHARM_DIR_PATH", untrailingslashit(get_template_directory()));
}
if (!defined("SIMPLECHARM_DIR_URI")) {
    define("SIMPLECHARM_DIR_URI", untrailingslashit(get_template_directory_uri()));
}
require_once SIMPLECHARM_DIR_PATH.'/inc/helpers/autoload.php';
require_once SIMPLECHARM_DIR_PATH.'/inc/helpers/template-tags.php';
function simplecharm_get_instance(){
    return \SIMPLECHARM_THEME\Inc\Classes\SimpleCharm_Theme::get_instance();
}
simplecharm_get_instance();