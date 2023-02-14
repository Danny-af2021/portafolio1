<?php
/**
 * Harrison functions and definitions
 *
 * @package Harrison
 */

/**
 * Harrison only works in WordPress 5.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function harrison_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'harrison', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Set default Post Thumbnail size.
	set_post_thumbnail_size( 1080, 540, true );

	// Add image size for header image on single posts and pages.
	add_image_size( 'harrison-featured-header-image', 1440, 600, true );

	// Add image size for posts with the Horizontal Blog layout enabled.
	add_image_size( 'harrison-horizontal-list-post', 960, 720, true );

	// Register Navigation Menus.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Navigation', 'harrison' ),
	) );

	// Switch default core markup for galleries and captions to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom logo feature.
	add_theme_support( 'custom-logo', apply_filters( 'harrison_custom_logo_args', array(
		'height'      => 60,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) ) );

	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'harrison_custom_header_args', array(
		'header-text' => false,
		'width'       => 1440,
		'height'      => 600,
		'flex-width'  => true,
		'flex-height' => true,
	) ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'harrison_custom_background_args', array(
		'default-color' => '353535',
	) ) );

	// Add Theme Support for Selective Refresh in Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for responsive embed blocks.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'harrison_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function harrison_content_width() {

	// Default content width.
	$content_width = 800;

	// Set global variable for content width.
	$GLOBALS['content_width'] = apply_filters( 'harrison_content_width', $content_width );
}
add_action( 'after_setup_theme', 'harrison_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function harrison_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'harrison-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register and enqueue navigation.js.
	if ( ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) && ! harrison_is_amp() ) {
		wp_enqueue_script( 'harrison-navigation', get_theme_file_uri( '/assets/js/navigation.min.js' ), array(), '20220224', true );
		$harrison_l10n = array(
			'expand'   => esc_html__( 'Expand child menu', 'harrison' ),
			'collapse' => esc_html__( 'Collapse child menu', 'harrison' ),
			'icon'     => harrison_get_svg( 'expand' ),
		);
		wp_localize_script( 'harrison-navigation', 'harrisonScreenReaderText', $harrison_l10n );
	}

	// Enqueue svgxuse to support external SVG Sprites in Internet Explorer.
	if ( ! harrison_is_amp() ) {
		wp_enqueue_script( 'svgxuse', get_theme_file_uri( '/assets/js/svgxuse.min.js' ), array(), '1.2.6' );
	}

	// Register Comment Reply Script for Threaded Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'harrison_scripts' );


/**
* Enqueue theme fonts.
*/
function harrison_theme_fonts() {
	$fonts_url = harrison_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'harrison-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
	}
}
add_action( 'wp_enqueue_scripts', 'harrison_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'harrison_theme_fonts', 1 );


/**
 * Retrieve webfont URL to load fonts locally.
 */
function harrison_get_fonts_url() {
	$font_families = array(
		'Barlow:400,400italic,700,700italic',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'harrison_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function harrison_widgets_init() {
	// Register Footer Copyright widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'harrison' ),
		'id'            => 'footer-copyright',
		'description'   => esc_html_x( 'Appears in the bottom footer line.', 'widget area description', 'harrison' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'harrison_widgets_init', 30 );


/**
 * Make custom image sizes available in Gutenberg.
 */
function harrison_add_image_size_names( $sizes ) {
	return array_merge( $sizes, array(
		'post-thumbnail'                => esc_html__( 'Harrison Single Post', 'harrison' ),
		'harrison-horizontal-list-post' => esc_html__( 'Harrison List Post', 'harrison' ),
	) );
}
add_filter( 'image_size_names_choose', 'harrison_add_image_size_names' );


/**
 * Include Files
 */

// Include Theme Info page.
require get_template_directory() . '/inc/theme-info.php';

// Include Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include SVG Icon Functions.
require get_template_directory() . '/inc/icons.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-functions.php';

// Include Template Tags.
require get_template_directory() . '/inc/template-tags.php';

// Include Gutenberg Features.
require get_template_directory() . '/inc/gutenberg.php';

// Include support functions for Theme Addons.
require get_template_directory() . '/inc/addons.php';
