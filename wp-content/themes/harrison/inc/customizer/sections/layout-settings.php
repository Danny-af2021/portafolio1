<?php
/**
 * Layout Settings
 *
 * Register Layout Settings section, settings and controls for Theme Customizer
 *
 * @package Harrison
 */

/**
 * Adds Layout settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function harrison_customize_register_layout_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'harrison_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'harrison' ),
		'priority' => 10,
		'panel'    => 'harrison_options_panel',
	) );

	// Get Default Settings.
	$default = harrison_default_options();

	// Add Settings and Controls for theme layout.
	$wp_customize->add_setting( 'harrison_theme_options[theme_layout]', array(
		'default'           => $default['theme_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_select',
	) );

	$wp_customize->add_control( 'harrison_theme_options[theme_layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'harrison' ),
		'section'  => 'harrison_section_layout',
		'settings' => 'harrison_theme_options[theme_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'centered' => esc_html__( 'Centered Layout', 'harrison' ),
			'wide'     => esc_html__( 'Wide Layout', 'harrison' ),
		),
	) );

	// Add Settings and Controls for header layout.
	$wp_customize->add_setting( 'harrison_theme_options[header_layout]', array(
		'default'           => $default['header_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_select',
	) );

	$wp_customize->add_control( 'harrison_theme_options[header_layout]', array(
		'label'    => esc_html__( 'Header Layout', 'harrison' ),
		'section'  => 'harrison_section_layout',
		'settings' => 'harrison_theme_options[header_layout]',
		'type'     => 'select',
		'priority' => 20,
		'choices'  => array(
			'horizontal' => esc_html__( 'Horizontal', 'harrison' ),
			'vertical'   => esc_html__( 'Vertical', 'harrison' ),
		),
	) );
}
add_action( 'customize_register', 'harrison_customize_register_layout_settings' );
