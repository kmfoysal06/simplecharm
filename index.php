<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();
?>
<div class="kmfsc-posts-container">
<div class="kmfsc-post-container">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// Load posts on the home page
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'paged' => $paged,
);
$query = new WP_Query($args);
if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("kmfsc-text-center kmfsc-content"); ?>>
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <h3><?php echo esc_html(get_the_title()); ?></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            </a>
        </div>
        <?php
    endwhile;
else :
    ?>
    <p class="kmfsc-text-center">No posts found</p>
    <?php
endif;
the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => 'Previous',
    'next_text' => 'Next',
));
wp_reset_postdata();

?>
</div>
<div>
<?php get_sidebar("kmfsc_home_sidebar"); ?>
</div>
</div>

<br>
<?php get_footer(); ?>
