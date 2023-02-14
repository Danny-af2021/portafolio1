<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package Harrison
 */


// Check if there is footer content available.
if ( is_active_sidebar( 'footer-copyright' ) || true === harrison_get_option( 'credit_link' ) || '' !== harrison_get_option( 'footer_text' ) ) :
	?>

	<div id="footer-line" class="site-info">

		<?php dynamic_sidebar( 'footer-copyright' ); ?>
		<?php harrison_footer_text(); ?>
		<?php harrison_credit_link(); ?>

	</div>

	<?php
endif;
