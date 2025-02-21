<?php
/**
 *  Header Template
 * @package SimpleCharm
 * @since 1.0
 *  */
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        } else {
            do_action('wp_body_open');
        }
?>
    <a class="skip-link screen-reader-text" href="#simplecharm-content">
        <?php _e('Skip to content', 'simplecharm'); ?></a>
    <header class="simplecharm-text-center" role="banner">
        <div class="simplecharm-header">
            <div class="simplecharm-header-contents">
                <span>
                    <?php
            if(has_custom_logo()) {
                the_custom_logo();
            }
?>
                    <?php if(display_header_text()) {
                        ?>
                    <h1 class="simplecharm-site-title simplecharm-model-link">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    }
?>
                </span>
                <nav role="navigation" class="simplecharm-main-navigation">
                    <?php
if(has_nav_menu("simplecharm_header")) {
    wp_nav_menu([
        'theme_location' => 'simplecharm_header',
    ]);
}
?>
                    <span><?php get_search_form(); ?></span>
                </nav>
            </div>
            
            <?php if(has_header_image()): ?>
                <div class="simplecharm-header-image">
                    <img alt="header-image" src="<?php header_image(); ?>"
                        width="<?php echo absint(get_custom_header()->width); ?>"
                        height="<?php echo absint(get_custom_header()->height); ?>">
                </div>
            <?php endif; ?>
        </div>
    </header>
    <br>
    <br>
<main role="main" id="simplecharm-content" tabindex="-1">
