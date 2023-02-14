<?php
/**
 * The template for displaying all pages
 */
get_header(); ?>

<?php do_action( 'print_on_demand_page_header' ); ?>

	<main id="main" role="main">	
		<div class="container">
			<?php $print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_page_sidebar_option','One Column');
	    	if($print_on_demand_theme_lay == 'One Column'){ ?>
	    		<div class="pages-te">
					<?php while ( have_posts() ) : the_post();?>
				        <?php the_post_thumbnail(); ?>
						<h1><?php the_title();?></h1>
						<div class="text"><p><?php the_content(); ?></p></div>
						<?php
					        // If comments are open or we have at least one comment, load up the comment template.
					        if ( comments_open() || get_comments_number() ) {
					            comments_template();
					        }
					    ?>
					<?php endwhile; // End of the loop.
					wp_reset_postdata(); ?>
				</div>

			<?php }else if($print_on_demand_theme_lay == 'Right Sidebar'){ ?>
	        	<div class="row">
	        		<div class="pages-te col-lg-8 col-md-8">
	            		<?php while ( have_posts() ) : the_post();?>
					        <?php the_post_thumbnail(); ?>
							<h1><?php the_title();?></h1>
							<div class="text"><p><?php the_content(); ?></p></div>
							<?php
						        // If comments are open or we have at least one comment, load up the comment template.
						        if ( comments_open() || get_comments_number() ) {
						            comments_template();
						        }
						    ?>
						<?php endwhile; // End of the loop.
						wp_reset_postdata(); ?>
					</div>
					<div id="sidebox" class="col-lg-4 col-md-4">
						<?php dynamic_sidebar('sidebox-2'); ?>
					</div>
				</div>
			<?php }else if($print_on_demand_theme_lay == 'Left Sidebar'){ ?>
	        	<div class="row">
					<div id="sidebox" class="col-lg-4 col-md-4">
						<?php dynamic_sidebar('sidebox-2'); ?>
					</div>
	        		<div class="pages-te col-lg-8 col-md-8">
	            		<?php while ( have_posts() ) : the_post();?>
					        <?php the_post_thumbnail(); ?>
							<h1><?php the_title();?></h1>
							<div class="text"><p><?php the_content(); ?></p></div>
							<?php
						        // If comments are open or we have at least one comment, load up the comment template.
						        if ( comments_open() || get_comments_number() ) {
						            comments_template();
						        }
						    ?>
						<?php endwhile; // End of the loop.
						wp_reset_postdata(); ?>
					</div>
				</div>
			<?php }else {?>
				<div class="row">
	        		<div class="pages-te col-lg-8 col-md-8">
	            		<?php while ( have_posts() ) : the_post();?>
					        <?php the_post_thumbnail(); ?>
							<h1><?php the_title();?></h1>
							<div class="text"><p><?php the_content(); ?></p></div>
							<?php
						        // If comments are open or we have at least one comment, load up the comment template.
						        if ( comments_open() || get_comments_number() ) {
						            comments_template();
						        }
						    ?>
						<?php endwhile; // End of the loop.
						wp_reset_postdata(); ?>
					</div>
					<div id="sidebox" class="col-lg-4 col-md-4">
						<?php dynamic_sidebar('sidebox-2'); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</main>

<?php do_action( 'print_on_demand_page_footer' ); ?>

<?php get_footer();