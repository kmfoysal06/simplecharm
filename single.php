<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        ?><?php
        if(post_password_required()){
            echo get_the_password_form();
            return;
        }else{
            ?>
            <div class="post" class="kmfnb-text-center" align="center">
            <h1 class="post-title"><?php echo esc_html(get_the_title()); ?></h1>
            <?php the_post_thumbnail('medium'); ?>
            <div class="post-meta">
                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                <span class="post-author"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
            </div>
            <div class="post-content"><?php echo apply_filters('the_content', wp_kses_post(get_the_content())); ?></div>
            <br>
            category : <?php echo wp_kses_post(get_the_category_list(', ')); ?>
        </div>
       <?php } ?>
        <br>
        <?php
        comments_template();
    endwhile;
else:
    ?>
    <p class="kmfnb-text-center">No posts found</p>
    <?php
endif;
get_footer();
?>