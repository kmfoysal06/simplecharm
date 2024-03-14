<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>
    <?php 
        if (is_home()) {
            echo esc_html(get_bloginfo('name'));
        } elseif (is_single()) {
            echo esc_html(get_the_title());
        } elseif (is_category()) {
            echo esc_html(single_cat_title('', false));
        } else {
            echo esc_html(get_the_author());
        }
    ?>
    </title>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="kmfnb-text-center" role="banner">
       <span>
         <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1>
            <nav role="navigation">
                <?php if(is_user_logged_in()): ?>
                    <a href="<?php echo esc_url(wp_logout_url()); ?>">Logout</a>
                    <a href="<?php echo esc_url(get_author_posts_url(get_current_user_id())); ?>">Profile</a>
                    <a href="<?php echo esc_url(admin_url('post-new.php')); ?>">Create Post</a>
                <?php else: ?>
                    <a href="<?php echo esc_url(wp_login_url()); ?>">Login</a>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>">Register</a>
                <?php endif; ?>
                <span><?php get_search_form(); ?></span>
            </nav>
    </header>
    <br>
    <br>
    <main role="main">
