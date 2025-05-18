<?php

function safeguard_customize_style_tab($wp_customize, $theme_name) {

	$wp_customize->add_panel('safeguard_style_panel',  array(
        'title' => 'Style Settings',
        'priority' => 25,
        )
    );



	/// COLOR SETTINGS ///

	$wp_customize->add_section( 'safeguard_style_general_settings' , array(
	    'title'      => esc_html__( 'Layout', 'safeguard' ),
	    'priority'   => 10,
		'panel' => 'safeguard_style_panel'
	) );


	$wp_customize->add_setting( 'safeguard_style_general_settings_layout' , array(
        'default'     => 'normal',
        'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control(
        'safeguard_style_general_settings_layout',
        array(
            'label'    => esc_html__( 'Page Layout', 'safeguard' ),
            'section'  => 'safeguard_style_general_settings',
            'settings' => 'safeguard_style_general_settings_layout',
            'type'     => 'select',
            'choices'  => array(
                'normal'  => esc_html__( 'Normal', 'safeguard' ),
                'full-width' => esc_html__( 'Full Width', 'safeguard' ),
		        'boxed' => esc_html__( 'Boxed', 'safeguard' ),
            ),
            'priority'   => 10,
        )
    );



	/// COLOR SETTINGS ///

	$wp_customize->add_section( 'safeguard_style_settings' , array(
	    'title'      => esc_html__( 'Color', 'safeguard' ),
	    'priority'   => 20,
		'panel' => 'safeguard_style_panel'
	) );


	$wp_customize->add_setting(
		'safeguard_style_settings_main_color',
		array(
			'default' => get_option('safeguard_default_main_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'safeguard_style_settings_main_color',
			array(
				'label' => esc_html__( 'Main Color', 'safeguard' ),
				'section' => 'safeguard_style_settings',
				'settings' => 'safeguard_style_settings_main_color',
				'priority'   => 10
			)
		)
	);

	$wp_customize->add_setting(
		'safeguard_style_settings_gradient_color',
		array(
			'default' => get_option('safeguard_default_gradient_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'safeguard_style_settings_gradient_color',
			array(
				'label' => esc_html__( 'Gradient Color', 'safeguard' ),
				'section' => 'safeguard_style_settings',
				'settings' => 'safeguard_style_settings_gradient_color',
				'priority'   => 15
			)
		)
	);

	$wp_customize->add_setting(
		'safeguard_style_settings_additional_color',
		array(
			'default' => get_option('safeguard_default_additional_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'safeguard_style_settings_additional_color',
			array(
				'label' => esc_html__( 'Additional Color', 'safeguard' ),
				'section' => 'safeguard_style_settings',
				'settings' => 'safeguard_style_settings_additional_color',
				'priority'   => 20
			)
		)
	);

	$wp_customize->add_setting(
		'safeguard_style_settings_bg_color',
		array(
			'default' => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'safeguard_style_settings_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'safeguard' ),
				'section' => 'safeguard_style_settings',
				'settings' => 'safeguard_style_settings_bg_color',
				'priority'   => 30
			)
		)
	);
	
	



	/// FONT SETTINGS ///

	$wp_customize->add_section( 'safeguard_style_font_settings' , array(
		'title'      => esc_html__( 'Fonts', 'safeguard' ),
		'priority'   => 30,
		'panel' => 'safeguard_style_panel',
	) );


    $wp_customize->add_setting( 'safeguard_font_api' , array(
        'default'     => 'AIzaSyAAChcJ6xYHmHRRTRMvt9GLCXeQG1qasV4',
        'transport'   => 'refresh',
        'sanitize_callback' => 'esc_attr'
    ) );
    $wp_customize->add_control(
        'safeguard_font_api',
        array(
            'label' => esc_html__( 'Google Font Api Key', 'safeguard' ),
            'type' => 'text',
            'section' => 'safeguard_style_font_settings',
            'settings' => 'safeguard_font_api',
            'priority'   => 10
        )
    );
	
	$wp_customize->add_setting( 'safeguard_font' , array(
		'default'     => get_option('safeguard_default_font'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_attr'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Fonts_Control(
			$wp_customize,
			'safeguard_font',
			array(
				'label' => esc_html__( 'Font', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_font',
				'priority'   => 20
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_font_weights' , array(
		'default'     => get_option('safeguard_default_font_weights'),
		'transport'   => 'postMessage',
		'sanitize_callback' => 'esc_attr'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Control(
			$wp_customize,
			'safeguard_font_weights',
			array(
				'label' => esc_html__( 'Font Variants to Load', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_font_weights',
				'hidden_class' => 'font_value',
				'container_class' => 'font',
				'priority'   => 30
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_font_weight' , array(
		'default'     => get_option('safeguard_default_font_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Single_Control(
			$wp_customize,
			'safeguard_font_weight',
			array(
			    'label' => esc_html__( 'Font Weight', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_font_weight',
				'container_class' => 'font',
				'priority'   => 40
			)
        )
	);


	$wp_customize->add_setting( 'safeguard_title_font' , array(
		'default'     => get_option('safeguard_default_title'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Fonts_Control(
			$wp_customize,
			'safeguard_title_font',
			array(
				'label' => esc_html__( 'Title Font', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_title_font',
				'priority'   => 50
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_title_font_weights' , array(
		'default'     => get_option('safeguard_default_title_weights'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Control(
			$wp_customize,
			'safeguard_title_font_weights',
			array(
				'label' => esc_html__( 'Title Font Variants to Load', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_title_font_weights',
				'hidden_class' => 'title_font_value',
				'container_class' => 'title_font',
				'priority'   => 60
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_title_font_weight' , array(
		'default'     => get_option('safeguard_default_title_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Single_Control(
			$wp_customize,
			'safeguard_title_font_weight',
			array(
			    'label' => esc_html__( 'Title Font Weight', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_title_font_weight',
				'container_class' => 'title_font',
				'priority'   => 70
			)
        )
	);


	$wp_customize->add_setting( 'safeguard_subtitle_font' , array(
		'default'     => get_option('safeguard_default_subtitle'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Fonts_Control(
			$wp_customize,
			'safeguard_subtitle_font',
			array(
				'label' => esc_html__( 'Subtitle Font', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_subtitle_font',
				'priority'   => 80
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_subtitle_font_weights' , array(
		'default'     => get_option('safeguard_default_subtitle_weights'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Control(
			$wp_customize,
			'safeguard_subtitle_font_weights',
			array(
				'label' => esc_html__( 'Subtitle Font Variants to Load', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_subtitle_font_weights',
				'hidden_class' => 'subtitle_font_value',
				'container_class' => 'subtitle_font',
				'priority'   => 90
			)
		)
	);

	$wp_customize->add_setting( 'safeguard_subtitle_font_weight' , array(
		'default'     => get_option('safeguard_default_subtitle_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );
    $wp_customize->add_control(
        new safeguard_Google_Font_Weight_Single_Control(
			$wp_customize,
			'safeguard_subtitle_font_weight',
			array(
			    'label' => esc_html__( 'Subtitle Font Weight', 'safeguard' ),
				'section' => 'safeguard_style_font_settings',
				'settings' => 'safeguard_subtitle_font_weight',
				'container_class' => 'subtitle_font',
				'priority'   => 100
			)
        )
	);


	
	

}

