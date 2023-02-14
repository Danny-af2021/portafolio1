<?php

	/*---------------------------Width Layout -------------------*/
	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_theme_options','Default');
    if($print_on_demand_theme_lay == 'Default'){
		$print_on_demand_custom_css .='body{';
			$print_on_demand_custom_css .='max-width: 100%;';
		$print_on_demand_custom_css .='}';
		$print_on_demand_custom_css .='.page-template-custom-home-page .middle-header{';
			$print_on_demand_custom_css .='width: 97.3%';
		$print_on_demand_custom_css .='}';
	}else if($print_on_demand_theme_lay == 'Wide Layout'){
		$print_on_demand_custom_css .='body{';
			$print_on_demand_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$print_on_demand_custom_css .='}';
		$print_on_demand_custom_css .='.page-template-custom-home-page .middle-header{';
			$print_on_demand_custom_css .='width: 97.7%';
		$print_on_demand_custom_css .='}';
	}else if($print_on_demand_theme_lay == 'Box Layout'){
		$print_on_demand_custom_css .='body{';
			$print_on_demand_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$print_on_demand_custom_css .='}';
	}

	/*----------------------------- Button Settings option-----------------------*/
	$print_on_demand_top_bottom_padding = get_theme_mod('print_on_demand_top_bottom_padding');
	$print_on_demand_left_right_padding = get_theme_mod('print_on_demand_left_right_padding');
	$print_on_demand_custom_css .='.post-link a, .form-submit input[type="submit"]{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_top_bottom_padding).'px; padding-bottom: '.esc_attr($print_on_demand_top_bottom_padding).'px; padding-left: '.esc_attr($print_on_demand_left_right_padding).'px; padding-right: '.esc_attr($print_on_demand_left_right_padding).'px; display:inline-block;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_border_radius = get_theme_mod('print_on_demand_border_radius');
	$print_on_demand_custom_css .='.post-link a, .form-submit input[type="submit"]{';
		$print_on_demand_custom_css .='border-radius: '.esc_attr($print_on_demand_border_radius).'px;';
	$print_on_demand_custom_css .='}';

	/*---------------------------Blog Layout -------------------*/
	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_blog_post_layout','Default');
    if($print_on_demand_theme_lay == 'Default'){
		$print_on_demand_custom_css .='.blogger{';
			$print_on_demand_custom_css .='';
		$print_on_demand_custom_css .='}';
	}else if($print_on_demand_theme_lay == 'Center'){
		$print_on_demand_custom_css .='.blogger, .blogger h2, .post-info, .text p, .blogger .post-link{';
			$print_on_demand_custom_css .='text-align:center;';
		$print_on_demand_custom_css .='}';
		$print_on_demand_custom_css .='.post-info{';
			$print_on_demand_custom_css .='margin-top:10px;';
		$print_on_demand_custom_css .='}';
		$print_on_demand_custom_css .='.blogger .post-link{';
			$print_on_demand_custom_css .='margin-top:25px;';
		$print_on_demand_custom_css .='}';
	}else if($print_on_demand_theme_lay == 'Image and Content'){
		$print_on_demand_custom_css .='.blogger, .blogger h2, .post-info, .text p, #our-services p{';
			$print_on_demand_custom_css .='text-align:Left;';
		$print_on_demand_custom_css .='}';
		$print_on_demand_custom_css .='.blogger .post-link{';
			$print_on_demand_custom_css .='text-align:right;';
		$print_on_demand_custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$print_on_demand_loader_color_setting = get_theme_mod('print_on_demand_loader_color_setting');
	$print_on_demand_custom_css .=' .circle .inner{';
		$print_on_demand_custom_css .='border-color: '.esc_attr($print_on_demand_loader_color_setting).';';
	$print_on_demand_custom_css .='} ';

	$print_on_demand_loader_background_color = get_theme_mod('print_on_demand_loader_background_color');
	$print_on_demand_custom_css .=' #pre-loader{';
		$print_on_demand_custom_css .='background-color: '.esc_attr($print_on_demand_loader_background_color).';';
	$print_on_demand_custom_css .='} ';

	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_preloader_types','Default');
    if($print_on_demand_theme_lay == 'Default'){
		$print_on_demand_custom_css .='{';
			$print_on_demand_custom_css .='';
		$print_on_demand_custom_css .='}';
	}elseif($print_on_demand_theme_lay == 'Circle'){
		$print_on_demand_custom_css .='.circle .inner{';
			$print_on_demand_custom_css .='width:unset;';
		$print_on_demand_custom_css .='}';
	}elseif($print_on_demand_theme_lay == 'Two Circle'){
		$print_on_demand_custom_css .='.circle .inner{';
			$print_on_demand_custom_css .='width:80%;
    border-right: 5px;';
		$print_on_demand_custom_css .='}';
	}

	// Responsive Media
	$print_on_demand_sidebar = get_theme_mod( 'print_on_demand_enable_disable_sidebar',true);
    if($print_on_demand_sidebar == true){
    	$print_on_demand_custom_css .='@media screen and (max-width:575px) {';
		$print_on_demand_custom_css .='#sidebox{';
			$print_on_demand_custom_css .='display:block;';
		$print_on_demand_custom_css .='} }';
	}else if($print_on_demand_sidebar == false){
		$print_on_demand_custom_css .='@media screen and (max-width:575px) {';
		$print_on_demand_custom_css .='#sidebox{';
			$print_on_demand_custom_css .='display:none;';
		$print_on_demand_custom_css .='} }';
	}

	$print_on_demand_scroll = get_theme_mod( 'print_on_demand_enable_disable_scrolltop', false);
	if($print_on_demand_scroll == true && get_theme_mod( 'print_on_demand_hide_show_scroll', false) == false){
    	$print_on_demand_custom_css .='.scrollup i{';
			$print_on_demand_custom_css .='display:none;';
		$print_on_demand_custom_css .='} ';
	}
    if($print_on_demand_scroll == true){
    	$print_on_demand_custom_css .='@media screen and (max-width:575px) {';
		$print_on_demand_custom_css .='.scrollup i{';
			$print_on_demand_custom_css .='display:block;';
		$print_on_demand_custom_css .='} }';
	}else if($print_on_demand_scroll == false){
		$print_on_demand_custom_css .='@media screen and (max-width:575px){';
		$print_on_demand_custom_css .='.scrollup i{';
			$print_on_demand_custom_css .='display:none;';
		$print_on_demand_custom_css .='} }';
	}

	// Copyright top-bottom padding setting 
	$print_on_demand_copyright_top_bottom_padding = get_theme_mod('print_on_demand_copyright_top_bottom_padding');
	$print_on_demand_custom_css .='.site-info{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($print_on_demand_copyright_top_bottom_padding).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_footer_text_font_size = get_theme_mod('print_on_demand_footer_text_font_size', 16);
	$print_on_demand_custom_css .='.site-info{';
		$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_footer_text_font_size).'px;';
	$print_on_demand_custom_css .='}';

	// scroll to top setting
	$print_on_demand_scroll_border_radius = get_theme_mod('print_on_demand_scroll_border_radius');
	$print_on_demand_custom_css .='.scrollup i{';
		$print_on_demand_custom_css .='border-radius: '.esc_attr($print_on_demand_scroll_border_radius).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_scroll_top_fontsize = get_theme_mod('print_on_demand_scroll_top_fontsize');
	$print_on_demand_custom_css .='.scrollup i{';
		$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_scroll_top_fontsize).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_scroll_top_bottom_padding = get_theme_mod('print_on_demand_scroll_top_bottom_padding');
	$print_on_demand_scroll_left_right_padding = get_theme_mod('print_on_demand_scroll_left_right_padding');
	$print_on_demand_custom_css .='.scrollup i{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_scroll_top_bottom_padding).'px; padding-bottom: '.esc_attr($print_on_demand_scroll_top_bottom_padding).'px; padding-left: '.esc_attr($print_on_demand_scroll_left_right_padding).'px; padding-right: '.esc_attr($print_on_demand_scroll_left_right_padding).'px;';
	$print_on_demand_custom_css .='}';

	// comment settings
	$print_on_demand_comment_button_text = get_theme_mod('print_on_demand_comment_button_text', 'Post Comment');
	if($print_on_demand_comment_button_text == ''){
		$print_on_demand_custom_css .='#comments p.form-submit {';
			$print_on_demand_custom_css .='display: none;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_comment_form_heading = get_theme_mod('print_on_demand_comment_form_heading', 'Leave a Reply');
	if($print_on_demand_comment_form_heading == ''){
		$print_on_demand_custom_css .='#comments h2#reply-title {';
			$print_on_demand_custom_css .='display: none;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_comment_form_size = get_theme_mod( 'print_on_demand_comment_form_size',100);
	$print_on_demand_custom_css .='#comments textarea{';
		$print_on_demand_custom_css .='width: '.esc_attr($print_on_demand_comment_form_size).'%;';
	$print_on_demand_custom_css .='}';

	/*------------ Woocommerce Settings  --------------*/
	$print_on_demand_shop_button_padding_top = get_theme_mod('print_on_demand_shop_button_padding_top', 9);
	$print_on_demand_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce a.added_to_cart.wc-forward{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_shop_button_padding_top).'px; padding-bottom: '.esc_attr($print_on_demand_shop_button_padding_top).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_shop_button_padding_left = get_theme_mod('print_on_demand_shop_button_padding_left', 16);
	$print_on_demand_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce a.added_to_cart.wc-forward{';
		$print_on_demand_custom_css .='padding-left: '.esc_attr($print_on_demand_shop_button_padding_left).'px; padding-right: '.esc_attr($print_on_demand_shop_button_padding_left).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_shop_button_border_radius = get_theme_mod('print_on_demand_shop_button_border_radius',30);
	$print_on_demand_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart.wc-forward{';
		$print_on_demand_custom_css .='border-radius: '.esc_attr($print_on_demand_shop_button_border_radius).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_display_related_products = get_theme_mod('print_on_demand_display_related_products',true);
	if($print_on_demand_display_related_products == false){
		$print_on_demand_custom_css .='.related.products{';
			$print_on_demand_custom_css .='display: none;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_shop_products_border = get_theme_mod('print_on_demand_shop_products_border', true);
	if($print_on_demand_shop_products_border == false){
		$print_on_demand_custom_css .='.woocommerce .products li{';
			$print_on_demand_custom_css .='border: none;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_shop_page_top_padding = get_theme_mod('print_on_demand_shop_page_top_padding',10);
	$print_on_demand_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_shop_page_top_padding).'px !important; padding-bottom: '.esc_attr($print_on_demand_shop_page_top_padding).'px !important;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_shop_page_left_padding = get_theme_mod('print_on_demand_shop_page_left_padding',10);
	$print_on_demand_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$print_on_demand_custom_css .='padding-left: '.esc_attr($print_on_demand_shop_page_left_padding).'px !important; padding-right: '.esc_attr($print_on_demand_shop_page_left_padding).'px !important;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_shop_page_border_radius = get_theme_mod('print_on_demand_shop_page_border_radius',0);
	$print_on_demand_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$print_on_demand_custom_css .='border-radius: '.esc_attr($print_on_demand_shop_page_border_radius).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_shop_page_box_shadow = get_theme_mod('print_on_demand_shop_page_box_shadow',0);
	$print_on_demand_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$print_on_demand_custom_css .='box-shadow: '.esc_attr($print_on_demand_shop_page_box_shadow).'px '.esc_attr($print_on_demand_shop_page_box_shadow).'px '.esc_attr($print_on_demand_shop_page_box_shadow).'px #e4e4e4;';
	$print_on_demand_custom_css .='}';

	// footer widget background
	$print_on_demand_footer_widget_background = get_theme_mod('print_on_demand_footer_widget_background', '#121212');
	$print_on_demand_custom_css .='.site-footer{';
		$print_on_demand_custom_css .='background-color: '.esc_attr($print_on_demand_footer_widget_background).';';
	$print_on_demand_custom_css .='}';

	$print_on_demand_footer_widget_image = get_theme_mod('print_on_demand_footer_widget_image');
	if($print_on_demand_footer_widget_image != false){
		$print_on_demand_custom_css .='.site-footer{';
			$print_on_demand_custom_css .='background: url('.esc_attr($print_on_demand_footer_widget_image).');';
		$print_on_demand_custom_css .='}';
	}

	/*------------- Navigation Menu Font Size ------------------*/
	$print_on_demand_navigation_menu_font_size = get_theme_mod('print_on_demand_navigation_menu_font_size');{
		$print_on_demand_custom_css .='.main-navigation a, .navigation-top a{';
			$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_navigation_menu_font_size).'px;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_menu_text_tranform','Default');
	if($print_on_demand_theme_lay == 'Uppercase'){
		$print_on_demand_custom_css .='.main-navigation a, .navigation-top a,.main-navigation ul ul a{';
			$print_on_demand_custom_css .='text-transform:Uppercase;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_menu_font_weight','Default');
	if($print_on_demand_theme_lay == 'Normal'){
		$print_on_demand_custom_css .='.main-navigation a, .navigation-top a{';
			$print_on_demand_custom_css .='font-weight: normal;';
		$print_on_demand_custom_css .='}';
	}

	// site title font size option
	$print_on_demand_site_title_font_size = get_theme_mod('print_on_demand_site_title_font_size', 30);{
	$print_on_demand_custom_css .='.logo h1, .site-title a{';
	$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_site_title_font_size).'px;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_site_tagline_font_size_settings = get_theme_mod('print_on_demand_site_tagline_font_size_settings', 13);{
	$print_on_demand_custom_css .='.logo p.site-description{';
	$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_site_tagline_font_size_settings).'px;';
		$print_on_demand_custom_css .='}';
	}

	/*------------------ Background Skin Option  -------------------*/
	$print_on_demand_theme_lay = get_theme_mod( 'print_on_demand_background_image_type','Transparent');
    if($print_on_demand_theme_lay == 'Background'){
		$print_on_demand_custom_css .='.blogger, #sidebox .widget, .about-text, .related-posts .page-box, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .background-img-skin, .pages-te, .woocommerce .woocommerce-ordering{';
			$print_on_demand_custom_css .='background-color: #fff;';
		$print_on_demand_custom_css .='}';
	}else if($print_on_demand_theme_lay == 'Transparent'){
		$print_on_demand_custom_css .='#services h3{';
			$print_on_demand_custom_css .='background-color: transparent;';
		$print_on_demand_custom_css .='}';
	}

	// woocommerce product sale settings
	$print_on_demand_border_radius_product_sale_text = get_theme_mod('print_on_demand_border_radius_product_sale_text',0);
	$print_on_demand_custom_css .='.woocommerce span.onsale {';
		$print_on_demand_custom_css .='border-radius: '.esc_attr($print_on_demand_border_radius_product_sale_text).'%;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_position_product_sale = get_theme_mod('print_on_demand_position_product_sale', 'Right');
	if($print_on_demand_position_product_sale == 'Right' ){
		$print_on_demand_custom_css .='.woocommerce ul.products li.product .onsale{';
			$print_on_demand_custom_css .=' left:auto; right:0;';
		$print_on_demand_custom_css .='}';
	}elseif($print_on_demand_position_product_sale == 'Left' ){
		$print_on_demand_custom_css .='.woocommerce ul.products li.product .onsale{';
			$print_on_demand_custom_css .=' left:0; right:auto;';
		$print_on_demand_custom_css .='}';
	}

	$print_on_demand_product_sale_text_size = get_theme_mod('print_on_demand_product_sale_text_size',14);
	$print_on_demand_custom_css .='.woocommerce span.onsale{';
		$print_on_demand_custom_css .='font-size: '.esc_attr($print_on_demand_product_sale_text_size).'px;';
	$print_on_demand_custom_css .='}';

	$print_on_demand_top_bottom_product_sale_padding = get_theme_mod('print_on_demand_top_bottom_product_sale_padding');
	$print_on_demand_left_right_product_sale_padding = get_theme_mod('print_on_demand_left_right_product_sale_padding');
	$print_on_demand_custom_css .='.woocommerce span.onsale{';
		$print_on_demand_custom_css .='padding-top: '.esc_attr($print_on_demand_top_bottom_product_sale_padding).'px; padding-bottom: '.esc_attr($print_on_demand_top_bottom_product_sale_padding).'px; padding-left: '.esc_attr($print_on_demand_left_right_product_sale_padding).'px; padding-right: '.esc_attr($print_on_demand_left_right_product_sale_padding).'px; display:inline-block;';
	$print_on_demand_custom_css .='}';

	// woocommerce Product Navigation
	$print_on_demand_shop_products_navigation = get_theme_mod('print_on_demand_shop_products_navigation', 'Yes');
	if($print_on_demand_shop_products_navigation == 'No'){
		$print_on_demand_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$print_on_demand_custom_css .='display: none;';
		$print_on_demand_custom_css .='}';
	}

	// Post Block
	$print_on_demand_post_break_block_setting = get_theme_mod( 'print_on_demand_post_break_block_setting','Into Blocks');
    if($print_on_demand_post_break_block_setting == 'Without Blocks'){
		$print_on_demand_custom_css .='.blogger{';
			$print_on_demand_custom_css .='border: none; margin:30px 0;';
		$print_on_demand_custom_css .='}';
	}

	// fixed header padding option
	$print_on_demand_fixed_header_padding_option = get_theme_mod('print_on_demand_fixed_header_padding_option');
	$print_on_demand_custom_css .='.fixed-header{';
		$print_on_demand_custom_css .='padding: '.esc_attr($print_on_demand_fixed_header_padding_option).'px;';
	$print_on_demand_custom_css .='}';

	//Copyright background css
	$print_on_demand_copyright_background_color = get_theme_mod('print_on_demand_copyright_background_color');
	$print_on_demand_custom_css .='.site-info{';
		$print_on_demand_custom_css .='background-color: '.esc_attr($print_on_demand_copyright_background_color).';';
	$print_on_demand_custom_css .='}';