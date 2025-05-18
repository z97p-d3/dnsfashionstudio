<?php

	function safeguard_customize_search_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'safeguard_search_settings' , array(
		    'title'      => esc_html__( 'Search', 'safeguard' ),
		    'priority'   => 40,
		) );

		
		$wp_customize->add_setting( 'safeguard_search_placeholder' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_search_description' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );



		$wp_customize->add_control(
			'safeguard_search_placeholder',
			array(
				'label'    => esc_html__( 'Search Placeholder', 'safeguard' ),
				'section'  => 'safeguard_search_settings',
				'settings' => 'safeguard_search_placeholder',
				'type'     => 'text',
				'priority'   => 10
			)
		);

		$wp_customize->add_control(
			'safeguard_search_description',
			array(
				'label'    => esc_html__( 'Search Description', 'safeguard' ),
				'section'  => 'safeguard_search_settings',
				'settings' => 'safeguard_search_description',
				'type'     => 'text',
				'priority'   => 20
			)
		);
		
	}
		
?>