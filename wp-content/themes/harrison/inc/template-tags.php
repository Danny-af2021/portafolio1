<?php
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Harrison
 */

if ( ! function_exists( 'harrison_site_logo' ) ) :
	/**
	 * Displays the site logo in the header area
	 */
	function harrison_site_logo() {

		if ( has_custom_logo() ) : ?>

			<div class="site-logo">
				<?php the_custom_logo(); ?>
			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_site_title' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function harrison_site_title() {

		if ( is_home() ) :
			?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_site_description' ) ) :
	/**
	 * Displays the site description in the header area
	 */
	function harrison_site_description() {

		$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

		if ( $description || is_customize_preview() ) :
			?>

			<p class="site-description"><?php echo $description; ?></p>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_header_image' ) ) :
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function harrison_header_image() {

		// Display featured image as header image on single posts and pages.
		if ( is_single() && has_post_thumbnail() && 'header-image' === harrison_get_option( 'post_image_single' )
			|| is_page() && has_post_thumbnail()
			|| is_single() && is_customize_preview() && has_post_thumbnail()
		) :
			?>

			<div id="headimg" class="header-image featured-header-image">

				<?php the_post_thumbnail( 'harrison-featured-header-image' ); ?>

			</div>

			<?php
		elseif ( has_header_image() ) : // Display header image.
			?>

			<div id="headimg" class="header-image default-header-image">

				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_archive_header' ) ) :
	/**
	 * Displays the header title on archive pages.
	 */
	function harrison_archive_header() {
		?>

		<header class="archive-header entry-header">

			<?php the_archive_title( '<h1 class="archive-title entry-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		</header><!-- .archive-header -->

		<?php
	}
endif;


if ( ! function_exists( 'harrison_search_header' ) ) :
	/**
	 * Displays the header title on search results.
	 */
	function harrison_search_header() {
		?>

		<header class="search-header entry-header">

			<h1 class="search-title entry-title">
				<?php
				// translators: Search Results title.
				printf( esc_html__( 'Search Results for: %s', 'harrison' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
			<?php get_search_form(); ?>

		</header><!-- .search-header -->

		<?php
	}
endif;


if ( ! function_exists( 'harrison_post_image_archives' ) ) :
	/**
	 * Displays the featured image on archive posts.
	 */
	function harrison_post_image_archives( $image_size = 'post-thumbnail' ) {

		// Display Post Thumbnail if activated.
		if ( has_post_thumbnail() && true === harrison_get_option( 'post_image_archives' ) ) :
			?>

			<figure class="post-image post-image-archives">
				<a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark" aria-hidden="true">
					<?php the_post_thumbnail( $image_size ); ?>
				</a>
			</figure>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_post_image_single' ) ) :
	/**
	 * Displays the featured image on single posts.
	 */
	function harrison_post_image_single() {
		if ( ! has_post_thumbnail() ) {
			return;
		}
		?>

		<figure class="post-image post-image-single">
			<?php the_post_thumbnail(); ?>
		</figure>

		<?php
	}
endif;


if ( ! function_exists( 'harrison_entry_meta' ) ) :
	/**
	 * Displays the date and author of a post
	 */
	function harrison_entry_meta() {

		$postmeta  = harrison_entry_author();
		$postmeta .= harrison_entry_date();
		$postmeta .= harrison_entry_comments();

		echo '<div class="entry-meta">' . $postmeta . '</div>';
	}
endif;


if ( ! function_exists( 'harrison_entry_date' ) ) :
	/**
	 * Returns the post date
	 */
	function harrison_entry_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		return '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;


if ( ! function_exists( 'harrison_entry_author' ) ) :
	/**
	 * Returns the post author
	 */
	function harrison_entry_author() {

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			// translators: post author link.
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'harrison' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		$posted_by = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'harrison' ),
			$author_string
		);

		return '<span class="posted-by"> ' . $posted_by . '</span>';
	}
endif;


if ( ! function_exists( 'harrison_entry_categories' ) ) :
	/**
	 * Displays the post categories
	 */
	function harrison_entry_categories() {

		// Return early if post has no category.
		if ( ! has_category() ) {
			return;
		}

		$categories = get_the_category_list( '' );

		echo '<div class="entry-categories"> ' . $categories . '</div>';
	}
endif;


if ( ! function_exists( 'harrison_entry_comments' ) ) :
	/**
	 * Displays the post comments
	 */
	function harrison_entry_comments() {

		// Check if comments are open or we have at least one comment.
		if ( ! ( comments_open() || get_comments_number() ) ) {
			return;
		}

		// Start Output Buffering.
		ob_start();

		// Display Comments.
		comments_popup_link(
			esc_html__( 'No comments', 'harrison' ),
			esc_html__( '1 comment', 'harrison' ),
			esc_html__( '% comments', 'harrison' )
		);
		$comments = ob_get_contents();

		// End Output Buffering.
		ob_end_clean();

		return '<span class="entry-comments"> ' . $comments . '</span>';
	}
endif;


if ( ! function_exists( 'harrison_entry_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function harrison_entry_tags() {
		// Get tags.
		$tag_list = get_the_tag_list( sprintf( '<span class="entry-tags-label">%s</span>', esc_html__( 'Tags', 'harrison' ) ) );

		// Display tags.
		if ( $tag_list ) :
			echo '<div class="entry-tags">' . $tag_list . '</div>';
		endif;
	}
endif;


if ( ! function_exists( 'harrison_more_link' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function harrison_more_link() {

		// Get Read More Text.
		$read_more = harrison_get_option( 'read_more_link' );

		if ( '' !== $read_more || is_customize_preview() ) :
			?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php echo esc_html( $read_more ); ?></a>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_post_navigation' ) ) :
	/**
	 * Displays Single Post Navigation
	 */
	function harrison_post_navigation() {

		if ( true === harrison_get_option( 'post_navigation' ) || is_customize_preview() ) :
			?>

			<div class="post-navigation-wrap page-footer">

				<?php
				the_post_navigation( array(
					'prev_text' => '<span class="nav-link-text">' . esc_html_x( 'Previous Post', 'post navigation', 'harrison' ) . '</span><h3 class="entry-title">%title</h3>',
					'next_text' => '<span class="nav-link-text">' . esc_html_x( 'Next Post', 'post navigation', 'harrison' ) . '</span><h3 class="entry-title">%title</h3>',
				) );
				?>

			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'harrison_pagination' ) ) :
	/**
	 * Displays pagination on archive pages
	 */
	function harrison_pagination() {
		$pagination = get_the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&laquo;<span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'harrison' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'harrison' ) . '</span>&raquo;',
		) );

		if ( $pagination ) :
			?>

		<div class="pagination-wrap page-footer">

			<?php echo $pagination; ?>

		</div>

			<?php
		endif;
	}
endif;


/**
 * Displays footer text on footer line
 */
function harrison_footer_text() {
	if ( '' !== harrison_get_option( 'footer_text' ) || is_customize_preview() ) :
		?>

		<span class="footer-text">
			<?php echo do_shortcode( wp_kses_post( harrison_get_option( 'footer_text' ) ) ); ?> 
		</span>

		<?php
	endif;
}


/**
 * Displays credit link on footer line
 */
function harrison_credit_link() {
	if ( true === harrison_get_option( 'credit_link' ) || is_customize_preview() ) :
		?>

		<span class="credit-link">
			<?php
			// translators: Theme Name and Link to ThemeZee.
			printf( esc_html__( 'WordPress Theme: %1$s by %2$s.', 'harrison' ),
				esc_html__( 'Harrison', 'harrison' ),
				'ThemeZee'
			);
			?>
		</span>

		<?php
	endif;
}


if ( ! function_exists( 'harrison_breadcrumbs' ) ) :
	/**
	 * Displays ThemeZee Breadcrumbs plugin
	 */
	function harrison_breadcrumbs() {

		if ( function_exists( 'themezee_breadcrumbs' ) ) {

			themezee_breadcrumbs( array(
				'before' => '<div class="breadcrumbs-container">',
				'after'  => '</div>',
			) );

		}
	}
endif;


if ( ! function_exists( 'harrison_related_posts' ) ) :
	/**
	 * Displays ThemeZee Related Posts plugin
	 */
	function harrison_related_posts() {

		if ( function_exists( 'themezee_related_posts' ) ) {

			themezee_related_posts( array(
				'before'       => '<div class = "related-posts-wrap page-footer">',
				'after'        => '</div>',
				'container'    => 'div',
				'class'        => 'related-posts',
				'before_title' => '<header class="archive-header related-posts-header entry-header"><h2 class="archive-title related-posts-title entry-title">',
				'after_title'  => '</h2></header>',
			) );

		}
	}
endif;
