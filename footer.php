<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
</main>
<footer role="contentinfo">
    <p>&copy; <?php echo esc_html(date('Y')); ?> - <?php echo esc_html(get_bloginfo('name')); ?></p>
    <?php wp_footer(); ?>
</footer>
</body>
</html>