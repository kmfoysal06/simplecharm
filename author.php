<?php
get_header();

if(have_posts()):
    echo '<h1 align="center">'.get_the_author().'</h1>';
    echo '<p align="center">'.get_avatar( get_the_author_meta('ID'), 150 ).'</p>';
    if(is_user_logged_in() && get_current_user_id() == get_the_author_meta('ID')){
        echo '<p align="center"><a href="'.get_edit_user_link().'">Edit Profile</a></p>';
    }
    echo '<br>';
    echo '<h1 align="center">Posts by '.get_the_author().'</h1>';
    while(have_posts()): the_post();
        echo '
            <div align="center" class="post">
                <h2 class="post-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
                <div class="post-meta">
                    <span class="post-date">'.get_the_date().'</span>
                </div>
                <div class="post-content">'.get_the_excerpt().'</div>
            </div>
        ';
    endwhile;
else:
    echo '<p align="center">No posts found by this author</p>';
endif;

get_footer();
?>