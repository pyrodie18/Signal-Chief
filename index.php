<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div class="main-container">
    <div class="main-grid">
        <main class="main-content">
        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
            <?php endwhile; ?>
        <?php endif; // End have_posts() check. ?>

            <?php /* Display navigation to next/previous pages when applicable */ ?>
            <?php
            if ( function_exists('signalChief_pagination') ) :
                signalChief_pagination();
            elseif ( is_paged() ) :
            ?>
                <nav id="post-nav">
                    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
                    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
                </nav>
            <?php endif; ?>

        </main>
        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer();
