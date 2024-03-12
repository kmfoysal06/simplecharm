<?php
get_header();

if(have_posts()):
    while(have_posts()): the_post();
        echo '
            <div class="post" align="center">
                <h1 class="post-title">'.get_the_title().'</h1>
                '.get_the_post_thumbnail(null,'medium').'
                <div class="post-meta">
                    <span class="post-date">'.get_the_date().'</span>
                    <span class="post-author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a></span>
                </div>
                <div class="post-content">'.apply_filters('the_content', get_the_content()).'</div>
            </div>
            <br>
            category : '.get_the_category_list(', ').'
        ';
    endwhile;
else:
    echo '<p align="center">No posts found</p>';
endif;
get_footer();
?>