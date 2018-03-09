<?php
/**
 * The template for displaying search results pages.
 *
 * @package Singal-Chief
 * @since Signal-Chief 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main id="search-results" class="main-content">

            <header>
                <h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h1>
            </header>

            <?php if ( have_posts() ) : ?>
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
