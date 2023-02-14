<?php
/**
 * Upgrade Control for the Customizer
 *
 * @package Harrison
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the upgrade teaser in the Customizer.
	 */
	class Harrison_Customize_Upgrade_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="upgrade-pro-version">

				<span class="customize-control-title"><?php esc_html_e( 'Pro Version Add-on', 'harrison' ); ?></span>

				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the %s Pro Add-on to get additional features and advanced customization options.', 'harrison' ), 'Harrison' ); ?>
				</span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/addons/harrison-pro/', 'harrison' ) ); ?>?utm_source=customizer&utm_medium=button&utm_campaign=harrison&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'harrison' ), 'Harrison' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
