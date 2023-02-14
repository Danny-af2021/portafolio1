<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Harrison
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function harrison_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'harrison_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'harrison' ),
		'priority' => 40,
		'panel'    => 'harrison_options_panel',
	) );

	// Get Default Settings.
	$default = harrison_default_options();

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'harrison_theme_options[blog_layout]', array(
		'default'           => $default['blog_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_select',
	) );

	$wp_customize->add_control( 'harrison_theme_options[blog_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'harrison_theme_options[blog_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'horizontal-list'     => esc_html__( 'Horizontal List', 'harrison' ),
			'horizontal-list-alt' => esc_html__( 'Horizontal List (alternative)', 'harrison' ),
			'vertical-list'       => esc_html__( 'Vertical List', 'harrison' ),
			'vertical-list-alt'   => esc_html__( 'Vertical List (alternative)', 'harrison' ),
			'two-column-grid'     => esc_html__( 'Two Column Grid', 'harrison' ),
			'three-column-grid'   => esc_html__( 'Three Column Grid', 'harrison' ),
		),
	) );

	// Add Settings and Controls for blog content.
	$wp_customize->add_setting( 'harrison_theme_options[blog_content]', array(
		'default'           => $default['blog_content'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_select',
	) );

	$wp_customize->add_control( 'harrison_theme_options[blog_content]', array(
		'label'    => esc_html__( 'Blog Content', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'harrison_theme_options[blog_content]',
		'type'     => 'radio',
		'priority' => 20,
		'choices'  => array(
			'full'    => esc_html__( 'Full post', 'harrison' ),
			'excerpt' => esc_html__( 'Post excerpt', 'harrison' ),
		),
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'harrison_theme_options[excerpt_length]', array(
		'default'           => $default['excerpt_length'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'harrison_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'harrison_theme_options[excerpt_length]',
		'type'     => 'number',
		'priority' => 30,
	) );

	// Add Setting and Control for Excerpt More Text.
	$wp_customize->add_setting( 'harrison_theme_options[excerpt_more_text]', array(
		'default'           => $default['excerpt_more_text'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'harrison_theme_options[excerpt_more_text]', array(
		'label'    => esc_html__( 'Excerpt More Text', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'harrison_theme_options[excerpt_more_text]',
		'type'     => 'text',
		'priority' => 40,
	) );

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial( 'harrison_blog_layout_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'harrison_theme_options[blog_layout]',
			'harrison_theme_options[blog_content]',
			'harrison_theme_options[excerpt_length]',
			'harrison_theme_options[excerpt_more_text]',
			'posts_per_page',
		),
		'render_callback'  => 'harrison_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for Read More Text.
	$wp_customize->add_setting( 'harrison_theme_options[read_more_link]', array(
		'default'           => $default['read_more_link'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'harrison_theme_options[read_more_link]', array(
		'label'    => esc_html__( 'Read More Link', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'harrison_theme_options[read_more_link]',
		'type'     => 'text',
		'priority' => 50,
	) );

	// Add Setting and Control for Number of posts.
	$wp_customize->add_setting( 'posts_per_page', array(
		'default'           => absint( get_option( 'posts_per_page' ) ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'harrison_posts_per_page_setting', array(
		'label'    => esc_html__( 'Number of Posts', 'harrison' ),
		'section'  => 'harrison_section_blog',
		'settings' => 'posts_per_page',
		'type'     => 'number',
		'priority' => 60,
	) );
}
add_action( 'customize_register', 'harrison_customize_register_blog_settings' );

/**
 * Render the blog layout for the selective refresh partial.
 */
function harrison_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/blog/content', esc_attr( harrison_get_option( 'blog_layout' ) ) );
	}
}
