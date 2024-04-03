<?php
/**
 *  Footer Template
 * @package SimpleCharm
 *  */
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
</main>
<footer role="contentinfo" class="simplecharm-theme-footer">
    <div class="simplecharm-footer">
                    <p><?php esc_html_e('Proudly Powered by', 'simplecharm'); ?> <a href="<?php echo esc_url('https://wordpress.org'); ?>"><?php esc_html_e('WordPress', 'simplecharm'); ?></a></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
