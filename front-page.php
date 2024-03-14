<?php
get_header();
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
        <div class="kmfnb-text-center kmfnb-content">
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <p><?php echo esc_html(get_the_title()); ?></p>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            </a>
            <hr>
        </div>
        <?php
    endwhile;
else :
    ?>
    <p class="kmfnb-text-center">No posts found</p>
    <?php
endif;

// Adding pagination
?>
<p class="kmfnb-text-center">
    <?php
    echo paginate_links(array(
        'total' => $query->max_num_pages,
    ));
    wp_reset_postdata();
    ?>
</p>
<br>
<?php get_footer(); ?>
