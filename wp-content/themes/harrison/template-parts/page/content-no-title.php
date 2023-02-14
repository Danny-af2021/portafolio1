<?php
/**
 * The template used for displaying page content for the no title page templates.
 *
 * @version 1.0
 * @package Harrison
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages(); ?>

	</div><!-- .entry-content -->

	<?php do_action( 'harrison_after_pages' ); ?>

</article>
