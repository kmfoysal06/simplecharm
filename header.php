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
	<a class="skip-link screen-reader-text" href="#kmfsc-content">
	<?php _e( 'Skip to content', 'simplecharm' ); ?></a>
    <header class="kmfsc-text-center" role="banner">
    <div class="kmfsc-header">
	<div class="kmfsc-header-contents">   
			<span>
              <!-- get blog title if custom logo  is not set  -->
                <?php
                if(has_custom_logo()){
                    the_custom_logo();
                }else{
                    ?>
                    <h1 class="kmfsc-model-link kmf-model-shadow"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php
                }
                ?>
            </span>
            <nav role="navigation" class="kmfsc-main-navigation">
                <?php
                if(has_nav_menu( "kmfsc_header" )){
                    wp_nav_menu( [
                        'theme_location' => 'kmfsc_header',
                    ] );
                }
                ?>
                <span><?php get_search_form(); ?></span>
            </nav>
        </div>
        <div class="kmfsc-header-image">
        <img alt="header-image" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
        </div>
    </div>
    </header>
    <br>
    <br>
    <main role="main" id="kmfsc-content" tabindex="-1">
