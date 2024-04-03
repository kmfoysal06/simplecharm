<?php
/**
 *  Post Page Sidebar Template
 * @package SimpleCharm
 * @since 1.0
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<aside id="simplecharm-postpage-sidebar" role="complementary">

    <?php dynamic_sidebar( 'simplecharm_post_sidebar' ); ?>

</aside>