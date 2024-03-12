<?php
get_header();

if(have_posts()):
    while(have_posts()): the_post();
        echo '
            <div class="post" align="center">
                <h1 class="post-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h1>
                <div class="post-meta">
                    <span class="post-date">'.get_the_date().'</span>
                    <span class="post-author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'">'.get_the_author().'</a></span>
                </div>
                <div class="post-content">'.get_the_excerpt().'</div>
            </div>
        ';
    endwhile;
else:
    echo '<p align="center">No search results found for "'.get_search_query().'"</p>';
endif;

get_footer();
?>