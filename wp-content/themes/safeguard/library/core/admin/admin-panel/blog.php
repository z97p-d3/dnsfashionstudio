<?php
    function safeguard_customize_blog_tab($wp_customize, $theme_name){

        $wp_customize->add_section( 'safeguard_blog_settings' , array(
            'title'      => esc_html__( 'Blog', 'safeguard' ),
            'priority'   => 65,
        ) );


        $wp_customize->add_setting( 'safeguard_blog_settings_type' , array(
			'default'     => 'classic',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

        $wp_customize->add_control(
            'safeguard_blog_settings_type',
            array(
                'label'    => esc_html__( 'Blog display type', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_type',
                'type'     => 'select',
                'choices'  => array(
                    'classic'  => esc_html__( 'Classic', 'safeguard' ),
                    'grid' => esc_html__( 'Grid', 'safeguard' ),
                ),
                'priority'   => 10
            )
        );


        $wp_customize->add_setting( 'safeguard_blog_settings_date' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );
        
		$wp_customize->add_setting( 'safeguard_blog_settings_author_name' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'safeguard_blog_settings_author' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'safeguard_blog_settings_comments' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

        $wp_customize->add_setting( 'safeguard_blog_settings_categories' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'safeguard_blog_settings_tags' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );
		
        $wp_customize->add_setting( 'safeguard_blog_settings_share' , array(
            'default'     => '1',
            'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
            'sanitize_callback' => 'esc_attr',
        ) );
        
        $wp_customize->add_setting( 'safeguard_blog_settings_readmore' , array(
            'default'     => esc_html__( 'Read more', 'safeguard' ),
            'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
		    'sanitize_callback' => 'esc_html',
        ) );


        $wp_customize->add_control(
            'safeguard_blog_settings_date',
            array(
                'label'    => esc_html__( 'Display Date on blog posts', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_date',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'safeguard' ),
                    '1' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 50
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_author_name',
            array(
                'label'    => esc_html__( 'Display Author name on blog page and single post', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_author_name',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'safeguard' ),
                    '1' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 60
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_author',
            array(
                'label'    => esc_html__( 'Display About Author block on single post', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_author',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'safeguard' ),
                    '1' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 70
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_comments',
            array(
                'label'    => esc_html__( 'Display Comments on single post', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_comments',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'safeguard' ),
                    '1' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 80
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_categories',
            array(
                'label'    => esc_html__( 'Display Categories', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_categories',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'safeguard' ),
                    '1' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 90
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_tags',
            array(
                'label'    => esc_html__( 'Display Tags', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_tags',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'safeguard' ),
                    'on' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 100
            )
        );
        
        $wp_customize->add_control(
            'safeguard_blog_settings_share',
            array(
                'label'    => esc_html__( 'Display share buttons on single post', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_share',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'safeguard' ),
                    'on' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 110
            )
        );
        
		$wp_customize->add_setting( 'safeguard_blog_settings_sidebar' , array(
            'default'     => 'on',
            'transport'   => 'refresh',
            'theme_supports' => 'safeguard_customize_opt',
            'sanitize_callback' => 'esc_attr',
        ) );		
		$wp_customize->add_control(
            'safeguard_blog_settings_sidebar',
            array(
                'label'    => esc_html__( 'Sticky Sidebar', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_sidebar',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'safeguard' ),
                    'on' => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 120
            )
        );

        $wp_customize->add_control(
            'safeguard_blog_settings_readmore',
            array(
                'label'    => esc_html__( 'Read More button text', 'safeguard' ),
                'section'  => 'safeguard_blog_settings',
                'settings' => 'safeguard_blog_settings_readmore',
                'type'     => 'textfield',
                'priority'   => 10
            )
        );


    }
?>