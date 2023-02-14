<?php
/**
 * Sanitize Functions
 *
 * Used to validate the user input of the theme settings
 * Based on https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * @package Harrison
 */

/**
 * Checkbox sanitization callback
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function harrison_sanitize_checkbox( $checked ) {

	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Select & Radio Button sanitization callback
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param String               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function harrison_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 *  Sanitize footer content textarea
 *
 * @param String $value / Value of the setting.
 * @return string
 */
function harrison_sanitize_footer_text( $value ) {

	if ( current_user_can( 'unfiltered_html' ) ) :
		return $value;
	else :
		return stripslashes( wp_filter_post_kses( addslashes( $value ) ) );
	endif;
}
