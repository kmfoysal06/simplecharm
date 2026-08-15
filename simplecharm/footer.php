<?php
/**
 *  Footer Template
 * @package SimpleCharm
 * @since 1.0
 *  */
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$simplecharm_footer_text = get_theme_mod("simplecharm_footer_text") ? get_theme_mod("simplecharm_footer_text") : 'Proudly Powered by %LINK%';
$simplecharm_footer_link = get_theme_mod("simplecharm_footer_link") ?get_theme_mod("simplecharm_footer_link") : 'http://wordpress.org';
$simplecharm_footer_link_text = get_theme_mod("simplecharm_footer_link_text") ?  get_theme_mod("simplecharm_footer_link_text") : 'WordPress';

$simplecharm_footer_link_element = '<a href="'. esc_url($simplecharm_footer_link) .'">'. esc_html($simplecharm_footer_link_text) .'</a>';

$simplecharm_footer_text_data = str_replace("%LINK%",$simplecharm_footer_link_element,$simplecharm_footer_text)
; 
//var_dump($simplecharm_footer_text_data);

?>
</main>
<footer role="contentinfo" class="simplecharm-theme-footer">
    <div class="simplecharm-footer">
		<?php echo $simplecharm_footer_text_data; ?> 
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
