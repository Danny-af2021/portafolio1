<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Harrison
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function harrison_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = harrison_theme_options();

	// Set Theme Layout.
	if ( 'wide' === $theme_options['theme_layout'] ) {
		$classes[] = 'wide-theme-layout';
	} elseif ( 'centered' === $theme_options['theme_layout'] ) {
		$classes[] = 'centered-theme-layout';
	}

	// Set Header Layout.
	if ( 'vertical' === $theme_options['header_layout'] ) {
		$classes[] = 'vertical-header-layout';
	}

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$classes[] = 'site-title-hidden';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$classes[] = 'site-description-hidden';
	}

	// Set Blog Layout.
	if ( ( is_archive() || is_author() || is_category() || is_home() || is_tag() ) && 'post' == get_post_type() ) {
		if ( 'horizontal-list' === $theme_options['blog_layout'] || 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list';
		} elseif ( 'vertical-list' === $theme_options['blog_layout'] || 'vertical-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-vertical-list';
		} elseif ( 'two-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-two-column-grid';
		} elseif ( 'three-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-three-column-grid';
		}

		if ( 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list-alt';
		}
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Comments?
	if ( false === $theme_options['meta_comments'] ) {
		$classes[] = 'comments-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_categories'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$classes[] = 'tags-hidden';
	}

	// Hide Post Navigation in Customizer for instant live preview.
	if ( is_customize_preview() && is_single() && false === $theme_options['post_navigation'] ) {
		$classes[] = 'post-navigation-hidden';
	}

	// Hide Featured Header image in Customizer for instant live preview.
	if ( is_customize_preview() && is_single() && has_post_thumbnail() && 'header-image' !== $theme_options['post_image_single'] ) {
		$classes[] = 'single-post-header-image-hidden';
	}

	// Hide Credit Link in Customizer for instant live preview.
	if ( is_customize_preview() && false === $theme_options['credit_link'] ) {
		$classes[] = 'credit-link-hidden';
	}

	// Check for AMP pages.
	if ( harrison_is_amp() ) {
		$classes[] = 'is-amp-page';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'harrison_body_classes' );


/**
 * Add custom CSS to scale down logo image for retina displays.
 *
 * @return void
 */
function harrison_retina_logo() {
	// Return early if there is no logo image or option for retina logo is disabled.
	if ( ! has_custom_logo() or false === harrison_get_option( 'retina_logo' ) ) {
		return;
	}

	// Get Logo Image.
	$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	// Create CSS.
	$css = '.site-logo .custom-logo { width: ' . absint( floor( $logo[1] / 2 ) ) . 'px; }';

	// Add Custom CSS.
	wp_add_inline_style( 'harrison-stylesheet', $css );
}
add_filter( 'wp_enqueue_scripts', 'harrison_retina_logo', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function harrison_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = harrison_get_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 55; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'harrison_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function harrison_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}

	return esc_html( ' ' . harrison_get_option( 'excerpt_more_text' ) );
}
add_filter( 'excerpt_more', 'harrison_excerpt_more' );
