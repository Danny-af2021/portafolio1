<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title mb-4">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html__( 'One Reply to &ldquo;%s&rdquo;', 'print-on-demand' ), esc_html(get_the_title()) );
			} 	else {
				printf(
				    esc_html(
					    /* translators: 1: number of comments, 2: post title */
					    _nx( 
					        '%1$s thought on &ldquo;%2$s&rdquo;',
					        '%1$s thoughts on &ldquo;%2$s&rdquo;',
					        $comments_number,
					        'comments title',
					        'print-on-demand'
					    )
				  	),

				    esc_html (number_format_i18n( $comments_number ) ),
				    esc_html(get_the_title())
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,					
				) );
			?>
		</ol>

		<?php the_comments_navigation(); ?>

		<?php endif; 
	
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'print-on-demand' ); ?></p>
	<?php
	endif;?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			'title_reply' => esc_html(get_theme_mod('print_on_demand_comment_form_heading',__('Leave a Reply','print-on-demand' )) ),
			'label_submit' => esc_html(get_theme_mod('print_on_demand_comment_button_text',__('Post Comment','print-on-demand' )) ),
		) );
	?>
</div>