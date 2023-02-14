<?php
/**
 * Template for displaying search forms in Print On Demand
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'label', 'print-on-demand' ); ?></span>
		<input role="tab" type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'print-on-demand' ); ?>" value="<?php esc_attr( get_search_query()) ?>" name="s" />
	</label>
	<button role="tab" type="submit" class="search-submit"><span><?php echo esc_html_x( 'Search', 'submit button', 'print-on-demand' ); ?></span></button>
</form>