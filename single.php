<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header>
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <?php SignalChief_get_author_date(); ?>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <footer>
                        <?php
                        wp_link_pages(
                            array(
                                'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
                                'after'  => '</p></nav>',
                            )
                        );
                        ?>
                        <?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
                    </footer>
                </article>


				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
