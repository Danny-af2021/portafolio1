<?php
/**
 * The template for displaying articles in the vertical list alternative blog layout
 *
 * @version 1.0
 * @package Harrison
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php harrison_entry_categories(); ?>

		<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php harrison_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php harrison_post_image_archives(); ?>

	<?php get_template_part( 'template-parts/entry/entry', esc_html( harrison_get_option( 'blog_content' ) ) ); ?>

</article>
