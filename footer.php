<?php
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
</main>
<footer role="contentinfo" class="kmfsc-theme-footer">
    <div class="kmfsc-footer">
                    <p>&copy; <?php echo esc_html(date('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
