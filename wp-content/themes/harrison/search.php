<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @version 1.0
 * @package Harrison
 */

get_header();

if ( have_posts() ) :
	?>

	<main id="main" class="site-main" role="main">

		<?php
		harrison_search_header();

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/page/content', 'search' );

		endwhile;
		?>

	</main><!-- #main -->

	<?php
	harrison_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
