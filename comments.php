<?php 
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (post_password_required()) {
    return;
} ?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                esc_html(
                    _nx(
                        'One thought on "%2$s"',
                        '%1$s thoughts on "%2$s"',
                        get_comments_number(),
                        'comments title',
                        'nostyle-blog'
                    )
                ),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 40,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">

                <h1 class="screen-reader-text section-heading"><?php esc_html_e('Comment navigation', 'nostyle-blog'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(esc_html__('&larr; Older Comments', 'nostyle-blog')); ?></div>
                <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments &rarr;', 'nostyle-blog')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'nostyle-blog'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->