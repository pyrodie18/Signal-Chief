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
 * @package Signal-Chief
 * @since Signal-Chief 1.0.0
 */

get_header(); ?>
<div class="main-container">
    <div class="main-grid">
        <main class="main-content">
            <?php if ( have_posts() ) : ?>
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content-index' ); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>

            <?php get_template_part( 'template-parts/pagenation' ); ?>

        </main>
        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer();
