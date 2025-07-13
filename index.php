<?php
/**
 *  Index Template
 * @package SimpleCharm
 * @since 1.0
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();
?>
<div class="simplecharm-posts-container">
<?php if(is_category()): ?>
<h2> <?php echo esc_html( sprintf( __( 'Category: %s', 'simplecharm' ), single_cat_title('', false) ) ); ?>
</h2>
<?php elseif(is_tag()): ?>
    <h2> <?php echo esc_html( sprintf( __( 'Tag: %s', 'simplecharm' ), single_tag_title('', false) ) ); ?>
    </h2>
    <?php elseif(is_date()): ?>
    <h2> <?php echo esc_html( sprintf( __( 'Date: %s', 'simplecharm' ), get_the_date() ) ); ?>
    </h2>
<?php endif; ?>
    <div class="simplecharm-post-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("simplecharm-text-center simplecharm-content"); ?>>
			<p class="simplecharm-post-category"><?php echo wp_kses_post(get_the_category_list(', ')); ?></p>
			<h3 class="simplecharm-home-post-title"><a
                    href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></h3>
            <div class="post-meta">
                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
				<div class="post-author">
					<a
						href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
				</div>
            </div>
            
                    </a>
            <p class="simplecharm-home-excerpt"><?php echo apply_filters('the_excerpt', get_the_excerpt()); ?></p>
                    <a href="<?php the_permalink(); ?>">
            <?php
            echo sprintf(
                __('Continue reading%s', 'simplecharm'),
                '<span class="screen-reader-text"> ' . get_the_title() . '</span>'
            );
        ?>
        </a>

        </div>
        <?php
    endwhile;
else :
    ?>
        <p class="simplecharm-text-center"><?php esc_html_e('No posts found.', 'simplecharm'); ?></p>
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
        <?php get_sidebar("simplecharm_home_sidebar"); ?>
    </div>
</div>

<br>
<?php get_footer(); ?>
