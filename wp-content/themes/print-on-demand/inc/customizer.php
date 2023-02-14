<?php
/**
 * Print On Demand: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function print_on_demand_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_panel( 'print_on_demand_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'print-on-demand' ),
		'description' => __( 'Description of what this panel does.', 'print-on-demand' ),
	) );

	// font array
	$print_on_demand_font_array = array(
		'' => 'No Fonts',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arsenal' => 'Arsenal', 
		'Arvo' => 'Arvo',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bangers' => 'Bangers', 
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine', 
		'Cabin' => 'Cabin', 
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum', 
		'Cookie' => 'Cookie', 
		'Chewy' => 'Chewy', 
		'Days One' => 'Days One', 
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Economica' => 'Economica',
		'Fredoka One' => 'Fredoka One',
		'Fjalla One' => 'Fjalla One',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Handlee' => 'Handlee', 
		'Hammersmith One' => 'Hammersmith One',
		'Inconsolata' => 'Inconsolata', 
		'Indie Flower' => 'Indie Flower', 
		'IM Fell English SC' => 'IM Fell English SC', 
		'Julius Sans One' => 'Julius Sans One',
		'Josefin Slab' => 'Josefin Slab', 
		'Josefin Sans' => 'Josefin Sans', 
		'Kanit' => 'Kanit', 
		'Lobster' => 'Lobster', 
		'Lato' => 'Lato',
		'Lora' => 'Lora', 
		'Libre Baskerville' =>'Libre Baskerville',
		'Lobster Two' => 'Lobster Two',
		'Merriweather' =>'Merriweather', 
		'Monda' => 'Monda',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli', 
		'Marck Script' => 'Marck Script',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans', 
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Oxygen' => 'Oxygen', 
		'Orbitron' => 'Orbitron', 
		'Patua One' => 'Patua One', 
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk', 
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display', 
		'PT Sans' => 'PT Sans',
		'Philosopher' => 'Philosopher',
		'Permanent Marker' => 'Permanent Marker',
		'Poiret One' => 'Poiret One', 
		'Quicksand' => 'Quicksand', 
		'Quattrocento Sans' => 'Quattrocento Sans', 
		'Raleway' => 'Raleway', 
		'Rubik' => 'Rubik', 
		'Rokkitt' => 'Rokkitt', 
		'Russo One' => 'Russo One', 
		'Righteous' => 'Righteous', 
		'Slabo' => 'Slabo', 
		'Source Sans Pro' => 'Source Sans Pro', 
		'Shadows Into Light Two' =>'Shadows Into Light Two', 
		'Shadows Into Light' => 'Shadows Into Light', 
		'Sacramento' => 'Sacramento', 
		'Shrikhand' => 'Shrikhand', 
		'Tangerine' => 'Tangerine',
		'Ubuntu' => 'Ubuntu', 
		'VT323' => 'VT323', 
		'Varela Round' => 'Varela Round', 
		'Vampiro One' => 'Vampiro One',
		'Vollkorn' => 'Vollkorn',
		'Volkhov' => 'Volkhov', 
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
 	);
    
	//Typography
	$wp_customize->add_section( 'print_on_demand_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'print-on-demand' ),
		'panel' => 'print_on_demand_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'print_on_demand_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_paragraph_color', array(
		'label' => __('Paragraph Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_paragraph_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'Paragraph Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	$wp_customize->add_setting('print_on_demand_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'print_on_demand_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_atag_color', array(
		'label' => __('"a" Tag Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_atag_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( '"a" Tag Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'print_on_demand_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_li_color', array(
		'label' => __('"li" Tag Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_li_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( '"li" Tag Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h1_color', array(
		'label' => __('H1 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h1_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'H1 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('print_on_demand_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h1_font_size',array(
		'label'	=> __('H1 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h2_color', array(
		'label' => __('h2 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h2_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'h2 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('print_on_demand_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h2_font_size',array(
		'label'	=> __('h2 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h3_color', array(
		'label' => __('h3 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h3_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'h3 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('print_on_demand_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h3_font_size',array(
		'label'	=> __('h3 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h4_color', array(
		'label' => __('h4 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h4_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'h4 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('print_on_demand_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h4_font_size',array(
		'label'	=> __('h4 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h5_color', array(
		'label' => __('h5 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h5_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'h5 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('print_on_demand_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h5_font_size',array(
		'label'	=> __('h5 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'print_on_demand_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_h6_color', array(
		'label' => __('h6 Color', 'print-on-demand'),
		'section' => 'print_on_demand_typography',
		'settings' => 'print_on_demand_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('print_on_demand_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control(
		'print_on_demand_h6_font_family', array(
		'section'  => 'print_on_demand_typography',
		'label'    => __( 'h6 Fonts','print-on-demand'),
		'type'     => 'select',
		'choices'  => $print_on_demand_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('print_on_demand_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_h6_font_size',array(
		'label'	=> __('h6 Font Size','print-on-demand'),
		'section'	=> 'print_on_demand_typography',
		'setting'	=> 'print_on_demand_h6_font_size',
		'type'	=> 'text'
	));

	// background skin mode
	$wp_customize->add_setting('print_on_demand_background_image_type',array(
     	'default' => 'Transparent',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_background_image_type',array(
     	'type' => 'radio',
     	'label' => __('Background Skin Mode','print-on-demand'),
     	'section' => 'background_image',
     	'choices' => array(
         'Transparent' => __('Transparent','print-on-demand'),
         'Background' => __('Background','print-on-demand'),
     	),
	) );

  	// woocommerce Options
	$wp_customize->add_section( 'print_on_demand_shop_page_options', array(
    	'title'      => __( 'Shop Page Settings', 'print-on-demand' ),
		'panel' => 'print_on_demand_panel_id'
	) );

	$wp_customize->add_setting('print_on_demand_display_related_products',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_display_related_products',array(
		'type' => 'checkbox',
		'label' => __('Related Product','print-on-demand'),
		'section' => 'print_on_demand_shop_page_options',
	));

	$wp_customize->add_setting('print_on_demand_shop_products_border',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_shop_products_border',array(
		'type' => 'checkbox',
		'label' => __('Product Border','print-on-demand'),
		'section' => 'print_on_demand_shop_page_options',
	));

  	$wp_customize->add_setting('print_on_demand_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Shop Page Sidebar','print-on-demand'),
		'section' => 'print_on_demand_shop_page_options',
	));

 	$wp_customize->add_setting('print_on_demand_single_product_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_single_product_sidebar',array(
     	'type' => 'checkbox',
   	'label' => __('Enable / Disable Single Product Sidebar','print-on-demand'),
   	'section' => 'print_on_demand_shop_page_options',
	));

	$wp_customize->add_setting( 'print_on_demand_woocommerce_product_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'print_on_demand_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'print_on_demand_woocommerce_product_per_columns', array(
		'label'    => __( 'Total Products Per Columns', 'print-on-demand' ),
		'section'  => 'print_on_demand_shop_page_options',
		'type'     => 'radio',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('print_on_demand_woocommerce_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));	
	$wp_customize->add_control('print_on_demand_woocommerce_product_per_page',array(
		'label'	=> __('Total Products Per Page','print-on-demand'),
		'section'	=> 'print_on_demand_shop_page_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_shop_page_top_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control( 'print_on_demand_shop_page_top_padding',	array(
		'label' => esc_html__( 'Product Padding (Top Bottom)','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_shop_page_left_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control( 'print_on_demand_shop_page_left_padding',	array(
		'label' => esc_html__( 'Product Padding (Right Left)','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_shop_page_border_radius',array(
		'default' => 0,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_shop_page_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_shop_page_box_shadow',array(
		'default' => 0,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_shop_page_box_shadow',array(
		'label' => esc_html__( 'Product Shadow','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_shop_button_padding_top',array(
		'default' => 9,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_shop_button_padding_top',	array(
		'label' => esc_html__( 'Button Padding (Top Bottom)','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'print_on_demand_shop_button_padding_left',array(
		'default' => 16,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_shop_button_padding_left',array(
		'label' => esc_html__( 'Button Padding (Right Left)','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'print_on_demand_shop_button_border_radius',array(
		'default' => 30,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_shop_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('print_on_demand_position_product_sale',array(
		'default' => 'Right',
		'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_position_product_sale',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','print-on-demand'),
		'section' => 'print_on_demand_shop_page_options',
		'choices' => array(
		   'Right' => __('Right','print-on-demand'),
		   'Left' => __('Left','print-on-demand'),
		),
	) );

	$wp_customize->add_setting( 'print_on_demand_border_radius_product_sale_text',array(
		'default' => 0,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_border_radius_product_sale_text', array(
		'label'  => __('Product Sale Border Radius','print-on-demand'),
		'section'  => 'print_on_demand_shop_page_options',
		'type'        => 'number',
		'input_attrs' => array(
			'step'=> 1,
		   'min' => 0,
		   'max' => 50,
		)
    ) );

	$wp_customize->add_setting('print_on_demand_product_sale_text_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float'
	));
	$wp_customize->add_control('print_on_demand_product_sale_text_size',array(
		'label'	=> __('Product Sale Text Size','print-on-demand'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_shop_page_options',
		'type'=> 'number'
	));
	
	$wp_customize->add_setting( 'print_on_demand_top_bottom_product_sale_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_top_bottom_product_sale_padding',	array(
		'label' => esc_html__( 'Top / Bottom Product Sale Padding','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'print_on_demand_left_right_product_sale_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_left_right_product_sale_padding',array(
		'label' => esc_html__( 'Left / Right Product Sale Padding','print-on-demand' ),
		'section' => 'print_on_demand_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('print_on_demand_shop_products_navigation',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_shop_products_navigation',array(
		'type' => 'radio',
		'label' => __('Woocommerce Products Navigation','print-on-demand'),
		'choices' => array(
		   'Yes' => __('Yes','print-on-demand'),
		   'No' => __('No','print-on-demand'),
		),
		'section' => 'print_on_demand_shop_page_options',
    ));

  	//Layout Settings
	$wp_customize->add_section( 'print_on_demand_width_layout', array(
    	'title'      => __( 'Layout Settings', 'print-on-demand' ),
		'panel' => 'print_on_demand_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'print_on_demand_fixed_header',array(
		'default' => false,
   	'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
 	) );
 	$wp_customize->add_control('print_on_demand_fixed_header',array(
    	'type' => 'checkbox',
		'label' => __( 'Enable / Disable Fixed Header','print-on-demand' ),
		'section' => 'print_on_demand_width_layout'
    ));

 	$wp_customize->add_setting( 'print_on_demand_fixed_header_padding_option', array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	) );
	$wp_customize->add_control( 'print_on_demand_fixed_header_padding_option', array(
		'label'       => esc_html__( 'Fixed Header Padding','print-on-demand' ),
		'section'     => 'print_on_demand_width_layout',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('print_on_demand_loader_setting',array(
		'default' => false,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_loader_setting',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Preloader','print-on-demand'),
		'section' => 'print_on_demand_width_layout'
	));

 	$wp_customize->add_setting('print_on_demand_preloader_types',array(
     'default' => 'Default',
     'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_preloader_types',array(
		'type' => 'radio',
		'label' => __('Preloader Option','print-on-demand'),
		'section' => 'print_on_demand_width_layout',
		'choices' => array(
		   'Default' => __('Default','print-on-demand'),
		   'Circle' => __('Circle','print-on-demand'),
		   'Two Circle' => __('Two Circle','print-on-demand')
		),
	) );

 	$wp_customize->add_setting( 'print_on_demand_loader_color_setting', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'print-on-demand'),
		'section' => 'print_on_demand_width_layout',
		'settings' => 'print_on_demand_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'print_on_demand_loader_background_color', array(
		'default' => '#000',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'print-on-demand'),
		'section' => 'print_on_demand_width_layout',
		'settings' => 'print_on_demand_loader_background_color',
  	)));

	$wp_customize->add_setting('print_on_demand_theme_options',array(
    	'default' => 'Default',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_theme_options',array(
		'type' => 'select',
		'label' => __('Container Box','print-on-demand'),
		'description' => __('Here you can change the Width layout. ','print-on-demand'),
		'section' => 'print_on_demand_width_layout',
		'choices' => array(
		   'Default' => __('Default','print-on-demand'),
		   'Wide Layout' => __('Wide Layout','print-on-demand'),
		   'Box Layout' => __('Box Layout','print-on-demand'),
		),
	) );

	// Button Settings
	$wp_customize->add_section( 'print_on_demand_button_option', array(
		'title' => __('Button','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));

	$wp_customize->add_setting('print_on_demand_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','print-on-demand'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('print_on_demand_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_left_right_padding',array(
		'label'	=> __('Left and Right Padding','print-on-demand'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	) );
	$wp_customize->add_control( 'print_on_demand_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','print-on-demand' ),
		'section'     => 'print_on_demand_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// sidebar setting
	$wp_customize->add_section( 'print_on_demand_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'print-on-demand' ),
		'panel' => 'print_on_demand_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('print_on_demand_layout_settings',array(
     	'default' => 'Right Sidebar',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_layout_settings',array(
		'type' => 'radio',
		'label' => __('Post Sidebar Layout','print-on-demand'),
		'section' => 'print_on_demand_general_option',
		'description' => __('This option work for blog page, blog single page, archive page and search page.','print-on-demand'),
		'choices' => array(
		   	'Left Sidebar' => __('Left Sidebar','print-on-demand'),
		   	'Right Sidebar' => __('Right Sidebar','print-on-demand'),
		   	'One Column' => __('Full Column','print-on-demand'),
		   	'Three Columns' => __('Three Columns','print-on-demand'),
		   	'Four Columns' => __('Four Columns','print-on-demand'),
		   	'Grid Layout' => __('Grid Layout','print-on-demand')
		),
	) );

	$wp_customize->add_setting('print_on_demand_page_sidebar_option',array(
     	'default' => 'One Column',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_page_sidebar_option',array(
     	'type' => 'radio',
     	'label' => __('Page Sidebar Layout','print-on-demand'),
     	'section' => 'print_on_demand_general_option',
     	'choices' => array(
         	'Left Sidebar' => __('Left Sidebar','print-on-demand'),
         	'Right Sidebar' => __('Right Sidebar','print-on-demand'),
         	'One Column' => __('Full Column','print-on-demand')
     	),
	) );

	$wp_customize->add_setting('print_on_demand_single_post_sidebar_option',array(
     	'default' => 'Right Sidebar',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_single_post_sidebar_option',array(
     	'type' => 'radio',
     	'label' => __('Single Post Sidebar Layout','print-on-demand'),
     	'section' => 'print_on_demand_general_option',
     	'choices' => array(
         	'Left Sidebar' => __('Left Sidebar','print-on-demand'),
         	'Right Sidebar' => __('Right Sidebar','print-on-demand'),
         	'One Column' => __('Full Column','print-on-demand')
     	),
	) );

	//Topbar section
	$wp_customize->add_section('print_on_demand_header_section',array(
		'title'	=> __('Header Section','print-on-demand'),
		'description'	=> __('Add Header Content here','print-on-demand'),
		'priority'	=> null,
		'panel' => 'print_on_demand_panel_id',
	));

	$wp_customize->add_setting('print_on_demand_topbar_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_on_demand_topbar_text',array(
		'label'	=> __('Add Topbar Text','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_topbar_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_facebook_url',array(
		'label'	=> __('Add Facebook URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_facebook_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('print_on_demand_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_twitter_url',array(
		'label'	=> __('Add Twitter URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_twitter_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('print_on_demand_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_instagram_url',array(
		'label'	=> __('Add Instagram URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_instagram_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('print_on_demand_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_pinterest_url',array(
		'label'	=> __('Add Pinterest URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_pinterest_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('print_on_demand_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_youtube_url',array(
		'label'	=> __('Add Youtube URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('print_on_demand_order_first_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_on_demand_order_first_text',array(
		'label'	=> __('Add Order First Text','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_order_first_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_order_main_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_on_demand_order_main_text',array(
		'label'	=> __('Add Order Main Text','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_order_main_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_order_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('print_on_demand_order_url',array(
		'label'	=> __('Add Order URL','print-on-demand'),
		'section'	=> 'print_on_demand_header_section',
		'setting'	=> 'print_on_demand_order_url',
		'type'		=> 'text'
	));

	// navigation menu 
	$wp_customize->add_section( 'print_on_demand_navigation_menu' , array(
    	'title'      => __( 'Navigation Menus Settings', 'print-on-demand' ),
		'priority'   => null,
		'panel' => 'print_on_demand_panel_id'
	) );

	$wp_customize->add_setting('print_on_demand_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_navigation_menu_font_size',array(
		'label'	=> __('Navigation Menus Font Size ','print-on-demand'),
		'section'=> 'print_on_demand_navigation_menu',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->add_setting('print_on_demand_menu_text_tranform',array(
		'default' => 'Default',
		'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
 	$wp_customize->add_control('print_on_demand_menu_text_tranform',array(
		'type' => 'radio',
		'label' => __('Navigation Menus Text Transform','print-on-demand'),
		'section' => 'print_on_demand_navigation_menu',
		'choices' => array(
		   'Default' => __('Default','print-on-demand'),
		   'Uppercase' => __('Uppercase','print-on-demand'),
		),
	) );

	$wp_customize->add_setting('print_on_demand_menu_font_weight',array(
		'default' => 'Default',
		'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_menu_font_weight',array(
		'type' => 'radio',
		'label' => __('Navigation Menus Font Weight','print-on-demand'),
		'section' => 'print_on_demand_navigation_menu',
		'choices' => array(
		   'Default' => __('Default','print-on-demand'),
		   'Normal' => __('Normal','print-on-demand'),
		),
	) );

	//home page Banner
	$wp_customize->add_section( 'print_on_demand_banner' , array(
    	'title'      => __( 'Banner Settings', 'print-on-demand' ),
		'priority'   => null,
		'panel' => 'print_on_demand_panel_id'
	) );

	$wp_customize->add_setting('print_on_demand_banner_show',array(
        'default' => false,
        'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_banner_show',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Banner','print-on-demand'),
	   	'section' => 'print_on_demand_banner',
	));

	$wp_customize->add_setting( 'print_on_demand_banner_page', array(
		'default'           => '',
		'sanitize_callback' => 'print_on_demand_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'print_on_demand_banner_page', array(
		'label'    => __( 'Select Banner Image Page', 'print-on-demand' ),
		'description' => __( 'Image Size (415px x 400px)', 'print-on-demand' ),
		'section'  => 'print_on_demand_banner',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting('print_on_demand_hidden_fees_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_hidden_fees_text',array(
		'label'	=> __('Hidden Fees Text','print-on-demand'),
		'section'=> 'print_on_demand_banner',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_minimum_order_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_minimum_order_text',array(
		'label'	=> __('Minimum Order Text','print-on-demand'),
		'section'=> 'print_on_demand_banner',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_premium_product_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_premium_product_text',array(
		'label'	=> __('Premium Product Text','print-on-demand'),
		'section'=> 'print_on_demand_banner',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_shipping_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_shipping_text',array(
		'label'	=> __('Shipping Text','print-on-demand'),
		'section'=> 'print_on_demand_banner',
		'type'=> 'text'
	));

	//catogory Section
	$wp_customize->add_section('print_on_demand_category_section',array(
		'title'	=> __('Category Section','print-on-demand'),
		'description'	=> __('Add Category Section below.','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));

	$wp_customize->add_setting('print_on_demand_category_show',array(
        'default' => false,
        'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_category_show',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Category Section','print-on-demand'),
	   	'section' => 'print_on_demand_category_section',
	));

	$wp_customize->add_setting('print_on_demand_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_on_demand_section_title',array(
		'label'	=> __('Section Title','print-on-demand'),
		'section' => 'print_on_demand_category_section',
		'type'	 => 'text'
	));

	//no Result Setting
	$wp_customize->add_section('print_on_demand_no_result_setting',array(
		'title'	=> __('No Results Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));	

	$wp_customize->add_setting('print_on_demand_no_search_result_title',array(
		'default'=> __('Nothing Found','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_no_search_result_title',array(
		'label'	=> __('No Search Results Title','print-on-demand'),
		'section'=> 'print_on_demand_no_result_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_no_search_result_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_no_search_result_content',array(
		'label'	=> __('No Search Results Content','print-on-demand'),
		'section'=> 'print_on_demand_no_result_setting',
		'type'=> 'text'
	));

	//404 Page Setting
	$wp_customize->add_section('print_on_demand_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));	

	$wp_customize->add_setting('print_on_demand_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','print-on-demand'),
		'section'=> 'print_on_demand_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','print-on-demand'),
		'section'=> 'print_on_demand_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('print_on_demand_mobile_media',array(
		'title'	=> __('Mobile Media Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));

	$wp_customize->add_setting('print_on_demand_enable_disable_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_enable_disable_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Sidebar','print-on-demand'),
		'section' => 'print_on_demand_mobile_media'
	));

	$wp_customize->add_setting('print_on_demand_enable_disable_scrolltop',array(
		'default' => false,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_enable_disable_scrolltop',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Scroll To Top','print-on-demand'),
		'section' => 'print_on_demand_mobile_media'
	));

	//Blog Post
	$wp_customize->add_section('print_on_demand_blog_post',array(
		'title'	=> __('Post Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));	

	$wp_customize->add_setting('print_on_demand_date_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_date_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Date','print-on-demand'),
		'section' => 'print_on_demand_blog_post'
	));

 	$wp_customize->add_setting('print_on_demand_post_date_icon_changer',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Print_On_Demand_Icon_Changer(
     	$wp_customize,'print_on_demand_post_date_icon_changer',array(
		'label'	=> __('Post Date Icon','print-on-demand'),
		'transport' => 'refresh',
		'section'	=> 'print_on_demand_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('print_on_demand_author_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_author_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Author','print-on-demand'),
		'section' => 'print_on_demand_blog_post'
	));

 	$wp_customize->add_setting('print_on_demand_post_author_icon_changer',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Print_On_Demand_Icon_Changer(
        $wp_customize,'print_on_demand_post_author_icon_changer',array(
		'label'	=> __('Post Author Icon','print-on-demand'),
		'transport' => 'refresh',
		'section'	=> 'print_on_demand_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('print_on_demand_comment_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_comment_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Comments','print-on-demand'),
		'section' => 'print_on_demand_blog_post'
	));

 	$wp_customize->add_setting('print_on_demand_post_comment_icon_changer',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Print_On_Demand_Icon_Changer(
        $wp_customize,'print_on_demand_post_comment_icon_changer',array(
		'label'	=> __('Post Comment Icon','print-on-demand'),
		'transport' => 'refresh',
		'section'	=> 'print_on_demand_blog_post',
		'type'		=> 'icon'
	)));
    
 	$wp_customize->add_setting( 'print_on_demand_blog_post_metabox_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'print_on_demand_blog_post_metabox_seperator', array(
		'label'       => esc_html__( 'Blog Post Meta Box Seperator','print-on-demand' ),
		'section'     => 'print_on_demand_blog_post',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','print-on-demand'),
		'type'        => 'text',
		'settings'    => 'print_on_demand_blog_post_metabox_seperator',
	) );

	$wp_customize->add_setting('print_on_demand_blog_post_layout',array(
		'default' => 'Default',
		'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_blog_post_layout',array(
		'type' => 'radio',
		'label' => __('Post Layout Option','print-on-demand'),
		'section' => 'print_on_demand_blog_post',
		'choices' => array(
		   'Default' => __('Default','print-on-demand'),
		   'Center' => __('Center','print-on-demand'),
		   'Image and Content' => __('Image and Content','print-on-demand'),
		),
	) );

	$wp_customize->add_setting('print_on_demand_post_break_block_setting',array(
     'default' => 'Into Blocks',
     'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_post_break_block_setting',array(
		'type' => 'radio',
		'label' => __('Display Blog Page posts','print-on-demand'),
		'section' => 'print_on_demand_blog_post',
		'choices' => array(
		   'Into Blocks' => __('Into Blocks','print-on-demand'),
		   'Without Blocks' => __('Without Blocks','print-on-demand'),
		),
	) );

	$wp_customize->add_setting('print_on_demand_blog_description',array(
    	'default'   => 'Post Excerpt',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_blog_description',array(
		'type' => 'select',
		'label' => __('Post Description','print-on-demand'),
		'section' => 'print_on_demand_blog_post',
		'choices' => array(
		   'None' => __('None','print-on-demand'),
		   'Post Excerpt' => __('Post Excerpt','print-on-demand'),
		   'Post Content' => __('Post Content','print-on-demand'),
		),
	) );

 	$wp_customize->add_setting( 'print_on_demand_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	) );
	$wp_customize->add_control( 'print_on_demand_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','print-on-demand' ),
		'section'     => 'print_on_demand_blog_post',
		'type'        => 'number',
		'settings'    => 'print_on_demand_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'print_on_demand_post_excerpt_suffix', array(
		'default'   => __('{...}','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'print_on_demand_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','print-on-demand' ),
		'section'     => 'print_on_demand_blog_post',
		'type'        => 'text',
		'settings'    => 'print_on_demand_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('print_on_demand_button_text',array(
		'default'=> __('Read More','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_button_text',array(
		'label'	=> __('Add Button Text','print-on-demand'),
		'section'=> 'print_on_demand_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_show_post_pagination',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_show_post_pagination',array(
		'type' => 'checkbox',
		'label' => __('Post Pagination','print-on-demand'),
		'section' => 'print_on_demand_blog_post'
	));

	$wp_customize->add_setting( 'print_on_demand_pagination_option', array(
		'default'			=> 'Default',
		'sanitize_callback'	=> 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control( 'print_on_demand_pagination_option', array(
		'section' => 'print_on_demand_blog_post',
		'type' => 'radio',
		'label' => __( 'Post Pagination', 'print-on-demand' ),
		'choices'		=> array(
		   'Default'  => __( 'Default', 'print-on-demand' ),
		   'next-prev' => __( 'Next / Previous', 'print-on-demand' ),
	)));

	// Single post setting
 	$wp_customize->add_section('print_on_demand_single_post_section',array(
		'title'	=> __('Single Post Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));	

	$wp_customize->add_setting('print_on_demand_tags_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_tags_hide',array(
		'type' => 'checkbox',
		'label' => __('Single Post Tags','print-on-demand'),
		'section' => 'print_on_demand_single_post_section'
	));

	$wp_customize->add_setting('print_on_demand_single_post_image',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_single_post_image',array(
		'type' => 'checkbox',
		'label' => __('Single Post Featured Image','print-on-demand'),
		'section' => 'print_on_demand_single_post_section'
	));

 	$wp_customize->add_setting( 'print_on_demand_seperator_metabox', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'print_on_demand_seperator_metabox', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','print-on-demand' ),
		'section'     => 'print_on_demand_single_post_section',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','print-on-demand'),
		'type'        => 'text',
		'settings'    => 'print_on_demand_seperator_metabox',
	) );

	$wp_customize->add_setting('print_on_demand_comment_form_heading',array(
		'default' => __('Leave a Reply','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_comment_form_heading',array(
		'type' => 'text',
		'label' => __('Comment Form Heading','print-on-demand'),
		'section' => 'print_on_demand_single_post_section'
	));

	$wp_customize->add_setting('print_on_demand_comment_button_text',array(
		'default' => __('Post Comment','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_comment_button_text',array(
		'type' => 'text',
		'label' => __('Comment Submit Button Text','print-on-demand'),
		'section' => 'print_on_demand_single_post_section'
	));

 	$wp_customize->add_setting( 'print_on_demand_comment_form_size',array(
		'default' => 100,
		'sanitize_callback'    => 'print_on_demand_sanitize_number_range',
	));
	$wp_customize->add_control('print_on_demand_comment_form_size',	array(
		'label' => esc_html__( 'Comment Form Size','print-on-demand' ),
		'section' => 'print_on_demand_single_post_section',
		'type' => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	));

 	// related post setting
	$wp_customize->add_section('print_on_demand_related_post_section',array(
		'title'	=> __('Related Post Settings','print-on-demand'),
		'panel' => 'print_on_demand_panel_id',
	));	

	$wp_customize->add_setting('print_on_demand_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Related Post','print-on-demand'),
		'section' => 'print_on_demand_related_post_section',
	));

	$wp_customize->add_setting( 'print_on_demand_show_related_post', array(
		'default' => 'By Categories', 
		'sanitize_callback'	=> 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control( 'print_on_demand_show_related_post', array(
		'section' => 'print_on_demand_related_post_section',
		'type' => 'radio',
		'label' => __( 'Show Related Posts', 'print-on-demand' ),
		'choices' => array(
		   'categories'  => __(' By Categories', 'print-on-demand'),
		   'tags' => __( ' By Tags', 'print-on-demand' ),
	)));

 	$wp_customize->add_setting('print_on_demand_change_related_post_title',array(
		'default'=> __('Related Posts','print-on-demand'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_change_related_post_title',array(
		'label'	=> __('Change Related Post Title','print-on-demand'),
		'section'=> 'print_on_demand_related_post_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('print_on_demand_change_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_change_related_posts_number',array(
		'label'	=> __('Change Related Post Number','print-on-demand'),
		'section'=> 'print_on_demand_related_post_section',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	//Footer
	$wp_customize->add_section( 'print_on_demand_footer' , array(
    	'title'      => __( 'Footer Section', 'print-on-demand' ),
		'priority'   => null,
		'panel' => 'print_on_demand_panel_id'
	) );

	$wp_customize->add_setting('print_on_demand_footer_widget',array(
		'default'           => 4,
		'sanitize_callback' => 'print_on_demand_sanitize_choices',
	));
	$wp_customize->add_control('print_on_demand_footer_widget',array(
		'type'        => 'radio',
		'label'       => __('No. of Footer widget area', 'print-on-demand'),
		'section'     => 'print_on_demand_footer',
		'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'print-on-demand'),
		'choices' => array(
		   '1'     => __('One', 'print-on-demand'),
		   '2'     => __('Two', 'print-on-demand'),
		   '3'     => __('Three', 'print-on-demand'),
		   '4'     => __('Four', 'print-on-demand')
		),
	)); 

 	$wp_customize->add_setting( 'print_on_demand_footer_widget_background', array(
		'default' => '#121212',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'print_on_demand_footer_widget_background', array(
  		'label' => __('Footer Widget Background','print-on-demand'),
    	'section' => 'print_on_demand_footer',
  	)));

  	$wp_customize->add_setting('print_on_demand_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'print_on_demand_footer_widget_image',array(
		'label' => __('Footer Widget Background Image','print-on-demand'),
		'section' => 'print_on_demand_footer'
	)));

	$wp_customize->add_setting('print_on_demand_hide_show_scroll',array(
		'default' => false,
		'sanitize_callback'	=> 'print_on_demand_sanitize_checkbox'
	));
	$wp_customize->add_control('print_on_demand_hide_show_scroll',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Scroll To Top','print-on-demand'),
   	'section' => 'print_on_demand_footer',
	));

	$wp_customize->add_setting('print_on_demand_scroll_icon_changer',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Print_On_Demand_Icon_Changer(
     	$wp_customize,'print_on_demand_scroll_icon_changer',array(
		'label'	=> __('Scroll To Top Icon','print-on-demand'),
		'transport' => 'refresh',
		'section'	=> 'print_on_demand_footer',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('print_on_demand_footer_options',array(
     	'default' => 'Right align',
     	'sanitize_callback' => 'print_on_demand_sanitize_choices'
	));
	$wp_customize->add_control('print_on_demand_footer_options',array(
     	'type' => 'select',
		'label' => __('Scroll To Top','print-on-demand'),
		'description' => __('Here you can change the Footer layout. ','print-on-demand'),
		'section' => 'print_on_demand_footer',
		'choices' => array(
		   'Left align' => __('Left align','print-on-demand'),
		   'Right align' => __('Right align','print-on-demand'),
		   'Center align' => __('Center align','print-on-demand'),
		),
	) );

	$wp_customize->add_setting('print_on_demand_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('print_on_demand_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','print-on-demand'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('print_on_demand_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','print-on-demand'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('print_on_demand_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','print-on-demand'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'print_on_demand_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	) );
	$wp_customize->add_control( 'print_on_demand_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','print-on-demand' ),
		'section'     => 'print_on_demand_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('print_on_demand_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('print_on_demand_footer_text',array(
		'label'	=> __('Add Copyright Text','print-on-demand'),
		'section'	=> 'print_on_demand_footer',
		'setting'	=> 'print_on_demand_footer_text',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('print_on_demand_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','print-on-demand'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'print_on_demand_footer',
		'type'=> 'number'
	));

     $wp_customize->add_setting('print_on_demand_copyright_background_color', array(
		'default'           => '#6f10ff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'print_on_demand_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'print-on-demand'),
		'section'  => 'print_on_demand_footer',
	)));   

	$wp_customize->add_setting('print_on_demand_footer_text_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'print_on_demand_sanitize_float',
	));
	$wp_customize->add_control('print_on_demand_footer_text_font_size',array(
		'label'	=> __('Footer Text Font Size','print-on-demand'),
		'section'=> 'print_on_demand_footer',
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'print_on_demand_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'print_on_demand_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'print_on_demand_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Print On Demand 1.0
 * @see print-on-demand_customize_register()
 *
 * @return void
 */
function print_on_demand_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Print On Demand 1.0
 * @see print-on-demand_customize_register()
 *
 * @return void
 */
function print_on_demand_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function print_on_demand_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Print_On_Demand_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Print_On_Demand_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Print_On_Demand_Customize_Section_Pro(
				$manager,
				'print_on_demand_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Print On Demand Pro', 'print-on-demand' ),
					'pro_text' => esc_html__( 'Go Pro', 'print-on-demand' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/t-shirt-ecommerce-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'print-on-demand-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'print-on-demand-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Print_On_Demand_Customize::get_instance();