<?php
/**
 * Custom Markup for Search form
 *
 * @version 1.0
 * @package Harrison
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'harrison' ); ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'harrison' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'harrison' ); ?>" />
	</label>
	<button type="submit" class="search-submit">
		<?php echo harrison_get_svg( 'search' ); ?>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'harrison' ); ?></span>
	</button>
</form>
