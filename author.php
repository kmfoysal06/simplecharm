<?php
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

if (have_posts()) :
    $author_id = get_the_author_meta('ID');
    echo '<h1 class="simplecharm-text-center">' . esc_html(get_the_author()) . '</h1>';
    echo '<p class="simplecharm-text-center">' . get_avatar($author_id, 150) . '</p>';
    if (is_user_logged_in() && get_current_user_id() == $author_id) {
        echo '<p class="simplecharm-text-center simplecharm-edit-profile-btn"><a href="' . esc_url(get_edit_user_link()) . '">Edit Profile</a></p>';
    }
    echo '<br>';
    echo '<h1 class="simplecharm-text-center">Posts by ' . esc_html(get_the_author()) . '</h1>';
    echo '<div class="simplecharm-post">';
    while (have_posts()) : the_post();
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("simplecharm-content"); ?>>
            <h3 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
            <div class="post-meta">
                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
            </div>
            <div class="post-content"><?php echo esc_html(get_the_excerpt()); ?></div>
        </div>
        <?php
    endwhile;
    the_posts_navigation();
    echo '</div>';
else:
    ?>
    <p class="simplecharm-text-center"><?php esc_html_e('No posts by this author.', 'simplecharm'); ?></p>
    <?php
endif;

get_footer();
?>
