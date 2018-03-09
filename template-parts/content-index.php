<?php
/**
 * The default template for displaying content
 *
 * Used index/archive/search.
 *
 * @package Signal-Chief
 * @since Signal-Chief 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'index-article'); ?>>
    <header>
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <?php SignalChief_get_author_date(); ?>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('', array('class' => 'index-featured')); ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
    <footer>
        <?php  SignalChief_get_tags_categories() ?>
    </footer>
</article>