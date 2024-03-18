<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();

if (have_posts()) : ?>
    <div class="kmfsc-single-container">
    <div>
    <?php
    while (have_posts()) : the_post();
        if(post_password_required()){
            echo get_the_password_form();
            return;
        }else{
            ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class("kmfsc-post"); ?>>
            <h1 class="post-title kmfsc-text-center"><?php echo apply_filters('the_title', sanitize_text_field(get_the_title())); ?></h1>
            <p class="kmfsc-text-center"><?php the_post_thumbnail('medium'); ?></p>
            <div class="post-meta">
                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                <span class="post-author kmfsc-model-link"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
            </div>
            <div class="post-content"><?php echo apply_filters('the_content', wp_kses_post(get_the_content())); ?></div>
            <?php 
            wp_link_pages(array(
                'before' => '<div class="page-links">'.esc_html__( 'Pages','simplecharm' ).'',
                'after' => '</div>'
            ));
            ?>
            <br>
            <div class="post-tags">
                <?php the_tags(); ?>
            </div>
            <br>
            category : <?php echo wp_kses_post(get_the_category_list(', ')); ?>
        </div>
       <?php } ?>
        <br>
        <div class="comment-respond wp-block-post-comments-form">
        <?php
        comments_template();?>
        </div>
        <?php
        endwhile; 
		?>
        </div>
    <div>
        <?php get_sidebar("kmfsc_post_sidebar"); ?>
    </div>
    <?php
else:
    ?>
    <p class="kmfsc-text-center">No posts found</p>
    <?php
endif;
get_footer();
?>
