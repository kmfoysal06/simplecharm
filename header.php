<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <title>
    <?php 
        if (is_home()) {
            echo get_bloginfo('name');
        } elseif (is_single()) {
            echo get_the_title();
        } elseif (is_category()) {
            echo single_cat_title('', false);
        } else {
            echo get_the_author();
        }
    ?>
</title>
</head>
<body class="<?php body_class() ?>">
    <?php wp_body_open(  ); ?>
    <header align="center">
       <span>
         <h1><a href="<?php echo home_url() ?>"><?php bloginfo('name') ?></a></h1>
            <span>
                <?php if(is_user_logged_in()): ?>
                    <a href="<?php echo wp_logout_url() ?>">Logout</a>
                    <a href="<?php echo get_author_posts_url(get_current_user_id()) ?>">Profile</a>
                    <a href="<?php echo admin_url('post-new.php') ?>">Create Post</a>
                <?php else: ?>
                    <a href="<?php echo wp_login_url() ?>">Login</a>
                    <a href="<?php echo wp_registration_url() ?>">Register</a>
                <?php endif; ?>
       <span><?php get_search_form(); ?></span>
       </span>
    </header>
    <br>
    <br>
    <main>