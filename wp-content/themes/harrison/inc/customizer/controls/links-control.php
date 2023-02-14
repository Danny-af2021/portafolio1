<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Harrison
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Harrison_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'harrison' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/harrison/', 'harrison' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=harrison&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'harrison' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=harrison&utm_source=customizer&utm_campaign=harrison" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'harrison' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/harrison-documentation/', 'harrison' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=harrison&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'harrison' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=harrison/', 'harrison' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'harrison' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/harrison/reviews/', 'harrison' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'harrison' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
