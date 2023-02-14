<?php
/**
 * The header for our theme 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	  wp_body_open(); 
	} else { 
	  do_action( 'wp_body_open' ); 
	} ?>	
	<?php if(get_theme_mod('print_on_demand_loader_setting', false)){ ?>
	    <div id="pre-loader">
			<div class='demo'>
				<?php $print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_preloader_types','Default');
				if($print_on_demand_theme_lay == 'Default'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php }elseif($print_on_demand_theme_lay == 'Circle'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php }elseif($print_on_demand_theme_lay == 'Two Circle'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php } ?>
			</div>
	    </div>
	<?php }?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'print-on-demand' ); ?></a>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<?php if(get_theme_mod('print_on_demand_topbar_text') != '' || get_theme_mod('print_on_demand_facebook_url') != '' || get_theme_mod('print_on_demand_twitter_url') != '' || get_theme_mod('print_on_demand_instagram_url') != '' || get_theme_mod('print_on_demand_pinterest_url') != '' || get_theme_mod('print_on_demand_youtube_url') != ''){?>
				<div class="topbar py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-7 align-self-center">
								<?php if(get_theme_mod('print_on_demand_topbar_text') != ''){?>
									<p class="topbar-text mb-md-0 text-md-start text-center"><?php echo esc_html(get_theme_mod('print_on_demand_topbar_text')); ?></p>
								<?php }?>
							</div>
							<div class="col-lg-5 col-md-5 align-self-center">
								<?php if(get_theme_mod('print_on_demand_facebook_url') != '' || get_theme_mod('print_on_demand_twitter_url') != '' || get_theme_mod('print_on_demand_instagram_url') != '' || get_theme_mod('print_on_demand_pinterest_url') != '' || get_theme_mod('print_on_demand_youtube_url') != ''){ ?>
									<div class="social-icons text-md-end text-center">
										<span class="me-4"><?php echo esc_html('Social Links', 'print-on-demand'); ?></span>
										<?php if(get_theme_mod('print_on_demand_facebook_url') != ''){ ?>
											<a href="<?php echo esc_url(get_theme_mod('print_on_demand_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'print-on-demand'); ?></span></a>
										<?php }?>
										<?php if(get_theme_mod('print_on_demand_twitter_url') != ''){ ?>
											<a href="<?php echo esc_url(get_theme_mod('print_on_demand_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'print-on-demand'); ?></span></a>
										<?php }?>
										<?php if(get_theme_mod('print_on_demand_instagram_url') != ''){ ?>
											<a href="<?php echo esc_url(get_theme_mod('print_on_demand_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'print-on-demand'); ?></span></a>
										<?php }?>
										<?php if(get_theme_mod('print_on_demand_pinterest_url') != ''){ ?>
											<a href="<?php echo esc_url(get_theme_mod('print_on_demand_pinterest_url')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'print-on-demand'); ?></span></a>
										<?php }?>
										<?php if(get_theme_mod('print_on_demand_youtube_url') != ''){ ?>
											<a href="<?php echo esc_url(get_theme_mod('print_on_demand_youtube_url')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'print-on-demand'); ?></span></a>
										<?php }?>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
			<div class="main-header">
				<div class="container">
					<div class="row mx-0">
						<div class="col-lg-3 col-md-12 mb-3 mb-md-0 align-self-center">
							<div class="logo text-lg-start text-center">
								<?php if ( has_custom_logo() ) : ?>
									<div class="site-logo"><?php the_custom_logo(); ?></div>
								<?php endif; ?>
								<?php $blog_info = get_bloginfo( 'name' ); ?>
								<?php if ( ! empty( $blog_info ) ) : ?>
									<?php if( get_theme_mod('print_on_demand_show_site_title',true) != ''){ ?>
									    <?php if ( is_front_page() && is_home() ) : ?>
									    	<h1 class="site-title m-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									    <?php else : ?>
									    	<p class="site-title m-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									    <?php endif; ?>
									<?php }?>
								<?php endif; ?>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) :
								?>
									<?php if( get_theme_mod('print_on_demand_show_tagline',true) != ''){ ?>
										<p class="site-description m-0">
									    <?php echo esc_html($description); ?>
										</p>
									<?php }?>
								<?php endif; ?>
							</div>
						</div>
						<div class="<?php if( get_theme_mod( 'print_on_demand_order_first_text') != '' || get_theme_mod( 'print_on_demand_order_url') != '' || get_theme_mod( 'print_on_demand_order_main_text') != '') { ?>col-lg-6 col-md-7<?php } else {?>col-lg-8 col-md-9 <?php }?> align-self-center">
							<div class="<?php if( get_theme_mod( 'print_on_demand_fixed_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
								<?php if ( has_nav_menu( 'top' ) ) : ?>
									<nav role="navigation" class="navigation-top">
										<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
									</nav>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-1 col-md-2 col-3 position-relative align-self-center">
							<div class="search-body text-center align-self-center">
								<button type="button" class="search-show"><i class="fas fa-search"></i></button>
							</div>
							<div class="searchform-inner">
								<?php get_search_form(); ?>
								<button type="button" class="close" aria-label="<?php esc_attr_e('Close','print-on-demand'); ?>" ><span aria-hidden="true"><?php echo esc_html('X','print-on-demand'); ?></span></button>
							</div>
						</div>
						<?php if( get_theme_mod( 'print_on_demand_order_first_text') != '' || get_theme_mod( 'print_on_demand_order_url') != '' || get_theme_mod( 'print_on_demand_order_main_text') != '') { ?>
							<div class="col-lg-2 col-md-3 col-9 order-btn align-self-center">
								<div class="row mx-md-0">
									<div class="col-lg-10 col-md-10 col-10 align-self-center">
										<?php if(get_theme_mod('print_on_demand_order_first_text') != ''){?>
											<span class="first-text"><?php echo esc_html(get_theme_mod('print_on_demand_order_first_text')); ?></span>
										<?php }?>
										<?php if(get_theme_mod('print_on_demand_order_main_text') != ''){?>
											<span class="main-text"><?php echo esc_html(get_theme_mod('print_on_demand_order_main_text')); ?></span>
										<?php }?>
									</div>
									<div class="col-lg-2 col-md-2 col-2 px-0 align-self-center">
										<?php if(get_theme_mod('print_on_demand_order_url') != ''){?>
											<a href="<?php echo esc_url(get_theme_mod( 'print_on_demand_order_url')); ?>"><i class="fas fa-chevron-right"></i><span class="screen-reader-text"><?php echo esc_html('Order Link', 'print-on-demand'); ?></span></a>
										<?php }?>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</header>
		
	<div class="site-content-contain">
		<div id="content" class="py-5">