<?php
	
	function safeguard_customize_shop_tab($wp_customize, $theme_name){

		$safeguard_pix_slider = array( 0 => esc_html__( 'No RevSlider', 'safeguard' ) );
		if (class_exists('RevSlider')) {
			$arr = array( 0 => esc_html__( 'No RevSlider', 'safeguard' ) );

			$pix_sliders 	= new RevSlider();
			$pix_arrSliders = $pix_sliders->getArrSliders();

			foreach($pix_arrSliders as $slider){
			  $arr[$slider->getAlias()] = $slider->getTitle();
			}
			if($arr){
			  $safeguard_pix_slider = $arr;
			}

		}

		$wp_customize->add_section( 'safeguard_shop_settings' , array(
		    'title'      => esc_html__( 'Shop', 'safeguard' ),
		    'priority'   => 50,
		) );



		$wp_customize->add_setting( 'safeguard_shop_header_slider' , array(
			'default'     => 0,
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'safeguard_shop_header_slider',
			array(
					'label'    => esc_html__( 'Header RevSlider On Main Shop Page', 'safeguard' ),
					'section'  => 'safeguard_shop_settings',
					'settings' => 'safeguard_shop_header_slider',
					'type'     => 'select',
					'choices'  => $safeguard_pix_slider,
					'priority' => 10
			)
		);

		$wp_customize->add_setting( 'safeguard_shop_header_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
        $wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'safeguard_shop_header_image',
				array(
				   'label'      => esc_html__( 'Header Image', 'safeguard' ),
				   'section'    => 'safeguard_shop_settings',
				   'context'    => 'safeguard_shop_header_image',
				   'settings'   => 'safeguard_shop_header_image',
				   'priority'   => 20
				)
	       )
	    );

	    $wp_customize->add_setting( 'safeguard_shop_settings_global_product' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'safeguard_sanitize_onoff'
		) );
		$wp_customize->add_control(
			'safeguard_shop_settings_global_product',
			array(
				'label'    => esc_html__( 'Global sidebar settings for Product pages', 'safeguard' ),
				'section'  => 'safeguard_shop_settings',
				'settings' => 'safeguard_shop_settings_global_product',
				'description' => esc_html__( 'Global sidebar settings for all Product pages.', 'safeguard' ),
				'type'     => 'select',
				'choices'  => array(
					'on'  => esc_html__( 'On', 'safeguard' ),
					'off'  => esc_html__( 'Off', 'safeguard' ),
				),
				'priority'   => 30
			)
		);

		$wp_customize->add_setting( 'safeguard_shop_settings_sidebar_type' , array(
			'default'     => '2',
			'transport'   => 'refresh',
			'sanitize_callback' => 'safeguard_sanitize_sidebar_blog_type'
		) );
		$wp_customize->add_control(
			'safeguard_shop_settings_sidebar_type',
			array(
				'label'    => esc_html__( 'Product sidebar type', 'safeguard' ),
				'section'  => 'safeguard_shop_settings',
				'settings' => 'safeguard_shop_settings_sidebar_type',
				'description' => esc_html__( 'Select sidebar type for Product pages.', 'safeguard' ),
				'type'     => 'select',
				'choices'  => array(
					'1' => esc_html__( 'Full width', 'safeguard' ),
					'2' => esc_html__( 'Right Sidebar', 'safeguard' ),
					'3' => esc_html__( 'Left Sidebar', 'safeguard' ),
				),
				'priority' => 40
			)
		);

		$wp_customize->add_setting( 'safeguard_shop_settings_sidebar_content' , array(
			'default'     => 'product-sidebar-1',
			'transport'   => 'refresh',
			'sanitize_callback' => 'safeguard_sanitize_sidebar_blog_content'
		) );
		$wp_customize->add_control(
			'safeguard_shop_settings_sidebar_content',
			array(
				'label'    => esc_html__( 'Product sidebar content', 'safeguard' ),
				'section'  => 'safeguard_shop_settings',
				'settings' => 'safeguard_shop_settings_sidebar_content',
				'description' => esc_html__( 'Select sidebar content for product pages', 'safeguard' ),
				'type'     => 'select',
				'choices'  => array(
					'sidebar-1' => esc_html__( 'WP Default Sidebar', 'safeguard' ),
					'global-sidebar-1' => esc_html__( 'Blog Sidebar', 'safeguard' ),
					'portfolio-sidebar-1' => esc_html__( 'Portfolio Sidebar', 'safeguard' ),
					'shop-sidebar-1' => esc_html__( 'Shop Sidebar', 'safeguard' ),
					'product-sidebar-1' => esc_html__( 'Product Sidebar', 'safeguard' ),
					'custom-area-1' => esc_html__( 'Custom Area', 'safeguard' ),
				),
				'priority' => 50
			)
		);

		$wp_customize->add_setting( 'safeguard_shop_settings_checkout' , array(
			'default'     => 'off',
			'transport'   => 'refresh',
			'sanitize_callback' => 'safeguard_sanitize_onoff'
		) );
		$wp_customize->add_control(
			'safeguard_shop_settings_checkout',
			array(
				'label'    => esc_html__( 'Checkout without Cart', 'safeguard' ),
				'section'  => 'safeguard_shop_settings',
				'settings' => 'safeguard_shop_settings_checkout',
				'description' => esc_html__( 'Add to cart go to checkout', 'safeguard' ),
				'type'     => 'select',
				'choices'  => array(
					'on'  => esc_html__( 'On', 'safeguard' ),
					'off'  => esc_html__( 'Off', 'safeguard' ),
				),
				'priority'   => 60
			)
		);
				
	}
?>