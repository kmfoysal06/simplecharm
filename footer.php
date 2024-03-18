<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
</main>
<footer role="contentinfo" class="kmfsc-theme-footer">
    <div class="kmfsc-footer">
        <div class="kmfsc-footer-container">
            <div class="kmfsc-footer-content">
                <div class="kmfsc-footer-content-left">
                    <?php
                    if (has_nav_menu("kmfsc_footer")) {
                        wp_nav_menu([
                            'theme_location' => 'kmfsc_footer',
                        ]);
                    }
                    ?>
                </div>
                <div class="kmfsc-footer-content-right">
                    <p>&copy; <?php echo esc_html(date('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
