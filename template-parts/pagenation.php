<?php
/**
 * Takes care of the pagenation for the page
 *
 * Used index/archive/search.
 *
 * @package Signal-Chief
 * @since Signal-Chief 1.0.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( function_exists('signalChief_pagination') ) : ?>
    <?php signalChief_pagination(); ?>
<?php  elseif ( is_paged() ) : ?>
    <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
        <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
    </nav>
<?php endif; ?>
