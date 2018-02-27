<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/**
 *  Outputs the post's author and posted time
 */
if ( ! function_exists('SignalChief_get_author_date') ) :
    function SignalChief_get_author_date() {
        ?> <div class="grid-x post-metadata"> <?php
            echo '<time class="medium-6 small-12 cell updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %1$s', 'foundationpress' ), get_the_date() ) . '</time>';
            echo '<p class="byline author medium-6 small-12 cell">' . __( 'Written by', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
        ?></div><?php
    }
endif;

/**
 *  Outputs the post's categories and tags
 */
if ( ! function_exists('SignalChief_get_tags_categories') ) :
    function SignalChief_get_tags_categories() { ?>
        <div class="grid-x post-metadata">
            <div class="medium-12 small-12 cell post-categories">Categories:  <?php the_tags('' ,' / ') ?></div>
            <div class="medium-12 small-12 cell post-tags">Tags:  <?php the_category(' / ') ?></div>
        </div><?php
    }
endif;
