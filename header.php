<?php
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="kmfsc-text-center" role="banner">
       <span>
         <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
            <nav role="navigation" class="kmfsc-main-navigation">
                <?php
                if(has_nav_menu( "primary" )){
                    wp_nav_menu( [
                        'theme_location' => 'primary',
                    ] );
                }
                ?>
                <span><?php get_search_form(); ?></span>
            </nav>
    </header>
    <br>
    <br>
    <main role="main">
