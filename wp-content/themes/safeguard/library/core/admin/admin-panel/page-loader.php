<?php

 
	
	function safeguard_customize_page_loader_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'safeguard_page_loader_settings' , array(
		    'title'      => esc_html__( 'Page Loader', 'safeguard' ),
		    'priority'   => 20,
		) );
		
		
 
 		/**
		 * 
		 * loader
		 * 
		 */
		 
		
	 
		
		
		$wp_customize->add_setting( 'safeguard_page_loader_settings_use' , array(
		    'default'     => 'off',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'safeguard_page_loader_settings_use',
			array(
				'label'    => esc_html__( 'Loader', 'safeguard' ),
				'section'  => 'safeguard_page_loader_settings',
				'settings' => 'safeguard_page_loader_settings_use',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__( 'Off', 'safeguard' ),
					'usemain' => esc_html__( 'Use on main', 'safeguard' ),
					'useall' => esc_html__( 'Use on all pages', 'safeguard' ),
				),
				'priority'   => 110
			)
		);
		
		
		

	
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
	            $wp_customize,
	            'safeguard_page_loader_bg_color',
				array(
				   'label'      => esc_html__( 'Loader Background', 'safeguard' ),
				   'section'    => 'safeguard_page_loader_settings',
				   'settings'   => 'safeguard_page_loader_bg_color',
				   'priority'   => 110
				)
	       )
		);

	}
	
	