<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Harrison
 */
?>

<div class="entry-content">

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

</div><!-- .entry-content -->

<?php do_action( 'harrison_after_posts' ); ?>
<?php harrison_entry_tags(); ?>
<?php do_action( 'harrison_author_bio' ); ?>
