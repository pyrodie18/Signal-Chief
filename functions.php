<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
//require_once( 'library/class-foundationpress-top-bar-walker.php' );
//require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );


// Use First Video as Excerpt
$postcustom = get_post_custom_keys();
if ($postcustom){
    $i = 1;
    foreach ($postcustom as $key){
        if (strpos($key,'oembed')){
            foreach (get_post_custom_values($key) as $video){
                if ($i == 1){
                    $text = $video.$text;
                }
                $i++;
            }
        }
    }
}

// Custom Excerpt
function custom_wp_trim_excerpt($text) {
    $raw_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content(''); // Original Content
        $text = strip_shortcodes($text); // Minus Shortcodes
        $text = apply_filters('the_content', $text); // Filters
        $text = str_replace(']]>', ']]&gt;', $text); // Replace

        $excerpt_length = apply_filters('excerpt_length', 55); // Length
        $excerpt_more = apply_filters('excerpt_more', ' ' . '<a class="readmore" href="'. get_permalink() .'">&raquo;</a>');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

        // Use First Video as Excerpt
        $postcustom = get_post_custom_keys();
        if ($postcustom){
            $i = 1;
            foreach ($postcustom as $key){
                if (strpos($key,'oembed')){
                    foreach (get_post_custom_values($key) as $video){
                        if ($i == 1){
                            $text = $video.$text;
                        }
                        $i++;
                    }
                }
            }
        }
    }
    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');