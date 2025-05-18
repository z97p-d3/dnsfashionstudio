<?php
    function safeguard_customize_social_tab($wp_customize, $theme_name){

        $wp_customize->add_section( 'safeguard_social_settings' , array(
            'title'      => esc_html__( 'Social', 'safeguard' ),
            'priority'   => 70,
        ) );

        $wp_customize->add_setting( 'safeguard_social_facebook' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_twitter' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_pinterest' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_google' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_icon_1' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_url_1' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_icon_2' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_url_2' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_icon_3' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_setting( 'safeguard_social_custom_url_3' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'esc_url'
		) );


        $wp_customize->add_control(
			'safeguard_social_facebook',
			array(
				'label'    => esc_html__( 'Facebook URL', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_facebook',
				'type'     => 'url',
				'priority'   => 10
			)
		);

		$wp_customize->add_control(
			'safeguard_social_twitter',
			array(
				'label'    => esc_html__( 'Twitter URL', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_twitter',
				'type'     => 'url',
				'priority'   => 20
			)
		);

        $wp_customize->add_control(
			'safeguard_social_pinterest',
			array(
				'label'    => esc_html__( 'Pinterest URL', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_pinterest',
				'type'     => 'url',
				'priority'   => 30
			)
		);

		$wp_customize->add_control(
			'safeguard_social_google',
			array(
				'label'    => esc_html__( 'Google+ URL', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_google',
				'type'     => 'url',
				'priority'   => 40
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_icon_1',
			array(
				'label'    => esc_html__( 'Custom Icon 1', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_icon_1',
				'type'     => 'text',
				'priority'   => 50
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_url_1',
			array(
				'label'    => esc_html__( 'Custom URL 1', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_url_1',
				'type'     => 'url',
				'priority'   => 55
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_icon_2',
			array(
				'label'    => esc_html__( 'Custom Icon 2', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_icon_2',
				'type'     => 'text',
				'priority'   => 60
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_url_2',
			array(
				'label'    => esc_html__( 'Custom URL 2', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_url_2',
				'type'     => 'url',
				'priority'   => 65
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_icon_3',
			array(
				'label'    => esc_html__( 'Custom Icon 3', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_icon_3',
				'type'     => 'text',
				'priority'   => 70
			)
		);

		$wp_customize->add_control(
			'safeguard_social_custom_url_3',
			array(
				'label'    => esc_html__( 'Custom URL 3', 'safeguard' ),
				'section'  => 'safeguard_social_settings',
				'settings' => 'safeguard_social_custom_url_3',
				'type'     => 'url',
				'priority'   => 75
			)
		);


    }
?>