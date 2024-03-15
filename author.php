<?php
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

if (have_posts()) :
    $author_id = get_the_author_meta('ID');
    echo '<h1 class="kmfsc-text-center">' . esc_html(get_the_author()) . '</h1>';
    echo '<p class="kmfsc-text-center">' . get_avatar($author_id, 150) . '</p>';
    if (is_user_logged_in() && get_current_user_id() == $author_id) {
        echo '<p class="kmfsc-text-center kmfsc-edit-profile-btn"><a href="' . esc_url(get_edit_user_link()) . '">Edit Profile</a></p>';
    }
    echo '<br>';
    echo '<h1 class="kmfsc-text-center">Posts by ' . esc_html(get_the_author()) . '</h1>';
    echo '<div class="kmfsc-post">';
    while (have_posts()) : the_post();
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class("kmfsc-content"); ?>>
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
    <p class="kmfsc-text-center">No posts found by this author</p>
    <?php
endif;

get_footer();
?>
