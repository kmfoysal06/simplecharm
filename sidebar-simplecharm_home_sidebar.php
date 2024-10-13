<?php
/**
 *  Home Page Sidebar
 * @package SimpleCharm
 * @since 1.0
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<aside id="simplecharm-homepage-sidebar" role="complementary">
    <?php dynamic_sidebar( 'simplecharm_home_sidebar' ); ?>
</aside>