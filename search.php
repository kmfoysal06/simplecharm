<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <div class="post" align="center">
            <h1 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h1>
            <div class="post-meta">
                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
                <span class="post-author"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
            </div>
            <div class="post-content"><?php echo esc_html(get_the_excerpt()); ?></div>
        </div>
        <?php
    endwhile;
else:
    ?>
    <p align="center">No search results found for "<?php echo esc_html(get_search_query()); ?>"</p>
    <?php
endif;

get_footer();
?>