<?php 
	
	function safeguard_customize_footer_tab($wp_customize, $theme_name){

		$wp_customize->add_section( 'safeguard_footer_settings' , array(
		    'title'      => esc_html__( 'Footer', 'safeguard' ),
		    'priority'   => 75,
		) );

		

		

		$staticBlocks = safeguard_get_staticblock_option_array();

		$wp_customize->add_setting( 'safeguard_footer_block_top' , array(
			'default'     => '0',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_html'
		) );
		$wp_customize->add_control(
			'safeguard_footer_block_top',
			array(
				'label'    => esc_html__( 'Top Footer Block', 'safeguard' ),
				'section'  => 'safeguard_footer_settings',
				'settings' => 'safeguard_footer_block_top',
				'type'     => 'select',
				'choices'  => $staticBlocks,
			)
		);

		$wp_customize->add_setting( 'safeguard_footer_block' , array(
			'default'     => '0',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_html'
		) );
		$wp_customize->add_control(
			'safeguard_footer_block',
			array(
				'label'    => esc_html__( 'Bottom Footer Block', 'safeguard' ),
				'section'  => 'safeguard_footer_settings',
				'settings' => 'safeguard_footer_block',
				'type'     => 'select',
				'choices'  => $staticBlocks,
			)
		);

		$wp_customize->add_setting( 'safeguard_footer_fixed' , array(
            'default'     => '0',
            'transport'   => 'refresh',
		    'sanitize_callback' => 'esc_html'
        ) );
		$wp_customize->add_control(
            'safeguard_footer_fixed',
            array(
                'label'    => esc_html__( 'Fixed', 'safeguard' ),
                'section'  => 'safeguard_footer_settings',
                'settings' => 'safeguard_footer_fixed',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'safeguard' ),
                    '0' => esc_html__( 'Off', 'safeguard' ),
                ),
            )
        );

	}
		
?>