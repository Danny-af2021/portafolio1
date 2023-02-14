<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'print_on_demand_before_banner' ); ?>

  <?php if( get_theme_mod('print_on_demand_banner_show', false) != ''){ ?>
    <section id="banner" class="pt-5">
      <div class="container">
        <?php $print_on_demand_banner_page = array();
        $mod = intval( get_theme_mod( 'print_on_demand_banner_page' ));
        if ( 'page-none-selected' != $mod ) {
          $print_on_demand_banner_page[] = $mod;
        }
        if( !empty($print_on_demand_banner_page) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $print_on_demand_banner_page,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
        ?>
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="row">
              <div class="col-lg-7 col-md-7 align-self-center">
                <div class="banner-content pe-md-5 me-lg-5">
                  <h1><?php the_title();?></h1>
                  <div class="points my-3">
                    <?php if(get_theme_mod('print_on_demand_hidden_fees_text') != ''){?>
                      <span><?php echo esc_html(get_theme_mod('print_on_demand_hidden_fees_text')); ?></span>
                    <?php }?>
                    <?php if(get_theme_mod('print_on_demand_minimum_order_text') != ''){?>
                      <span><?php echo esc_html(get_theme_mod('print_on_demand_minimum_order_text')); ?></span>
                    <?php }?>
                    <?php if(get_theme_mod('print_on_demand_premium_product_text') != ''){?>
                      <span><?php echo esc_html(get_theme_mod('print_on_demand_premium_product_text')); ?></span>
                    <?php }?>
                  </div>
                  <?php if(get_theme_mod('print_on_demand_shipping_text') != ''){?>
                    <p class="shipping-text"><?php echo esc_html(get_theme_mod('print_on_demand_shipping_text')); ?></p>
                  <?php }?>
                  <?php if(get_theme_mod('print_on_demand_facebook_url') != '' || get_theme_mod('print_on_demand_twitter_url') != '' || get_theme_mod('print_on_demand_instagram_url') != '' || get_theme_mod('print_on_demand_pinterest_url') != '' || get_theme_mod('print_on_demand_youtube_url') != ''){ ?>
                    <div class="home-social-icons">
                      <?php if(get_theme_mod('print_on_demand_facebook_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('print_on_demand_facebook_url')); ?>"><?php echo esc_html('Facebook', 'print-on-demand'); ?><span class="screen-reader-text"><?php echo esc_html('Facebook', 'print-on-demand'); ?></span></a>
                      <?php }?>
                      <?php if(get_theme_mod('print_on_demand_twitter_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('print_on_demand_twitter_url')); ?>"><?php echo esc_html('Twitter', 'print-on-demand'); ?><span class="screen-reader-text"><?php echo esc_html('Twitter', 'print-on-demand'); ?></span></a>
                      <?php }?>
                      <?php if(get_theme_mod('print_on_demand_instagram_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('print_on_demand_instagram_url')); ?>"><?php echo esc_html('Instagram', 'print-on-demand'); ?><span class="screen-reader-text"><?php echo esc_html('Instagram', 'print-on-demand'); ?></span></a>
                      <?php }?>
                      <?php if(get_theme_mod('print_on_demand_pinterest_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('print_on_demand_pinterest_url')); ?>"><?php echo esc_html('Pinterest', 'print-on-demand'); ?><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'print-on-demand'); ?></span></a>
                      <?php }?>
                      <?php if(get_theme_mod('print_on_demand_youtube_url') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('print_on_demand_youtube_url')); ?>"><?php echo esc_html('Youtube', 'print-on-demand'); ?><span class="screen-reader-text"><?php echo esc_html('Youtube', 'print-on-demand'); ?></span></a>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 align-self-center ps-md-5">
                <?php if(has_post_thumbnail()){?>
                  <?php the_post_thumbnail(); ?>
                <?php } else {?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/banner.png">
                <?php }?>
              </div>
            </div>
          <?php endwhile; 
          wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
      <div class="clearfix"></div>
    </section> 
  <?php }?> 

  <?php do_action( 'print_on_demand_after_banner' ); ?>

  <?php if( get_theme_mod('print_on_demand_category_show', false) != false){ ?>
    <section id="category-section" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('print_on_demand_section_title') != ''){ ?>
          <h2 class="text-center"><?php echo esc_html(get_theme_mod('print_on_demand_section_title')); ?></h2>
        <?php }?>
        <div class="owl-carousel mt-5">
          <?php
            $args = array(
              //'number'     => $number,
              'orderby'    => 'title',
              'order'      => 'ASC',
              'hide_empty' => 0,
              'parent'  => 0
              //'include'    => $ids
            );
            $print_on_demand_product_categories = get_terms( 'product_cat', $args );
            $count = count($print_on_demand_product_categories);
            if ( $count > 0 ){
              foreach ( $print_on_demand_product_categories as $print_on_demand_product_category ) {
                $ecommerce_cat_id   = $print_on_demand_product_category->term_id;
                $cat_link = get_category_link( $ecommerce_cat_id );
                $thumbnail_id = get_term_meta( $print_on_demand_product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
                $image = wp_get_attachment_url( $thumbnail_id );
                if ($print_on_demand_product_category->category_parent == 0 && $image) {
                ?>
                  <div class="cat-box position-relative">
                    <?php echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="" />'; ?>
                    <h3><a href="<?php echo esc_url(get_term_link( $print_on_demand_product_category ) ); ?>">
                    <?php echo esc_html( $print_on_demand_product_category->name ); ?></a></h3>
                  </div>
                <?php }
              }
            }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'print_on_demand_after_services' ); ?>

  <div class="container text pt-5">
    <?php while ( have_posts() ) : the_post();?>
      <?php the_content(); ?>
    <?php endwhile; // End of the loop.
    wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>