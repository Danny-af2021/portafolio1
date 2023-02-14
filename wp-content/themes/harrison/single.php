<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @version 1.0
 * @package Harrison
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<main id="main" class="site-main" role="main">

		<?php
			get_template_part( 'template-parts/post/content', esc_html( harrison_get_option( 'post_image_single' ) ) );
		?>

	</main><!-- #main -->

	<?php
	harrison_post_navigation();

	harrison_related_posts();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
