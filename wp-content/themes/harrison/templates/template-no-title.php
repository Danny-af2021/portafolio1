<?php
/**
 * Template Name: No Page Title
 * Template Post Type: page
 *
 * Description: A custom template for displaying a page without title.
 *
 * @package Harrison
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<main id="main" class="site-main" role="main">

		<?php
			get_template_part( 'template-parts/page/content', 'no-title' );
		?>

	</main><!-- #main -->

	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
