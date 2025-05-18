<?php

	function safeguard_customize_responsive_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'safeguard_responsive_settings' , array(
		    'title'      => esc_html__( 'Responsive', 'safeguard' ),
		    'priority'   => 35,
		) );

		$wp_customize->add_setting( 'safeguard_general_settings_responsive' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_mobile_sticky' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_mobile_topbar' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_tablet_minicart' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_tablet_search' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_tablet_phone' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'safeguard_tablet_socials' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		

		$wp_customize->add_control(
			'safeguard_general_settings_responsive',
			array(
				'label'    => esc_html__( 'Responsive', 'safeguard' ),
				'section'  => 'safeguard_responsive_settings',
				'settings' => 'safeguard_general_settings_responsive',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__( 'Off', 'safeguard' ),
					'on'   => esc_html__( 'On', 'safeguard' ),
				),
				'priority'   => 5
			)
		);

		$wp_customize->add_control(
            'safeguard_mobile_sticky',
            array(
                'label'    => esc_html__( 'Header Mobile Behavior', 'safeguard' ),
                'description'   => esc_html__( 'Off header sticky or fixed on mobile', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_mobile_sticky',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'mobile-no-sticky' => esc_html__( 'No Sticky', 'safeguard' ),
		            'mobile-no-fixed' => esc_html__( 'No Fixed', 'safeguard' ),
                ),
                'priority'   => 10
            )
        );

        $wp_customize->add_control(
            'safeguard_mobile_topbar',
            array(
                'label'    => esc_html__( 'Header Mobile Behavior', 'safeguard' ),
                'description'   => esc_html__( 'Off header top bar on mobile', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_mobile_sticky',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'no-mobile-topbar' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 20
            )
        );

        $wp_customize->add_control(
            'safeguard_tablet_minicart',
            array(
                'label'    => esc_html__( 'Tablet Minicart', 'safeguard' ),
                'description'   => esc_html__( 'Off header cart on tablet', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_tablet_minicart',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'no-tablet-minicart' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 30
            )
        );

        $wp_customize->add_control(
            'safeguard_tablet_search',
            array(
                'label'    => esc_html__( 'Tablet Search', 'safeguard' ),
                'description'   => esc_html__( 'Off header search on tablet', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_tablet_search',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'no-tablet-search' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 40
            )
        );

        $wp_customize->add_control(
            'safeguard_tablet_phone',
            array(
                'label'    => esc_html__( 'Tablet Header Phone', 'safeguard' ),
                'description'   => esc_html__( 'Off header phone on tablet', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_tablet_phone',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'no-tablet-phone' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 50
            )
        );

        $wp_customize->add_control(
            'safeguard_tablet_socials',
            array(
                'label'    => esc_html__( 'Tablet Socials', 'safeguard' ),
                'description'   => esc_html__( 'Off header social icons on tablet', 'safeguard' ),
                'section'  => 'safeguard_responsive_settings',
                'settings' => 'safeguard_tablet_socials',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'safeguard' ),
                    'no-tablet-socials' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 60
            )
        );
		
	}
		
?>