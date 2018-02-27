<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
            <p><strong>The opinions expressed here are those solely of the author and are not the official (or unofficial) opinions of the US Army</strong><br>
            Unless otherwise noted, all content contained on this site is copyright by Troy Ward 2014 - 2018 and protected by federal Copyright Law.<br>
            Troy Ward<br>
            TheSignalChief@gmail.com</p>
        </div>

    </div>
</footer>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>