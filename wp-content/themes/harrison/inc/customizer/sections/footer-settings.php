<?php
/**
 * Footer Settings
 *
 * Register Footer Settings section, settings and controls for Theme Customizer
 *
 * @package Harrison
 */

/**
 * Adds Footer settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function harrison_customize_register_footer_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'harrison_section_footer', array(
		'title'    => esc_html__( 'Footer Settings', 'harrison' ),
		'priority' => 90,
		'panel'    => 'harrison_options_panel',
	) );

	// Get Default Settings.
	$default = harrison_default_options();

	// Add Footer Text setting.
	$wp_customize->add_setting( 'harrison_theme_options[footer_text]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_footer_text',
	) );

	$wp_customize->add_control( 'harrison_theme_options[footer_text]', array(
		'label'    => esc_html__( 'Footer Text', 'harrison' ),
		'section'  => 'harrison_section_footer',
		'settings' => 'harrison_theme_options[footer_text]',
		'type'     => 'textarea',
		'priority' => 10,
	) );

	// Add selective refresh for footer text.
	$wp_customize->selective_refresh->add_partial( 'harrison_theme_options[footer_text]', array(
		'selector'         => '.site-info .footer-text',
		'render_callback'  => 'harrison_customize_partial_footer_text',
		'fallback_refresh' => false,
	) );

	// Add Credit Link setting.
	$wp_customize->add_setting( 'harrison_theme_options[credit_link]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'harrison_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'harrison_theme_options[credit_link]', array(
		'label'    => esc_html__( 'Display credit link on footer line', 'harrison' ),
		'section'  => 'harrison_section_footer',
		'settings' => 'harrison_theme_options[credit_link]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

}
add_action( 'customize_register', 'harrison_customize_register_footer_settings' );


/**
 * Render the footer text for the selective refresh partial.
 */
function harrison_customize_partial_footer_text() {
	echo do_shortcode( wp_kses_post( harrison_get_option( 'footer_text' ) ) );
}
