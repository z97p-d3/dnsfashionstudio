<?php
function safeguard_customize_services_tab($wp_customize, $theme_name) {

	$wp_customize->add_section( 'safeguard_services_settings' , array(
        'title'      => esc_html__( 'Services', 'safeguard' ),
        'priority'   => 60,
    ) );

	$wp_customize->add_setting( 'safeguard_services_settings_page', array(
		'default'           => '0',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_setting( 'safeguard_services_settings_related', array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_setting( 'safeguard_services_settings_share', array(
		'default'           => 1,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_setting( 'safeguard_services_image_header', array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( 'safeguard_services_settings_page', array(
		'label'    => esc_html__( 'Select Page For All Services', 'safeguard' ),
		'section'  => 'safeguard_services_settings',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_control( 'safeguard_services_settings_related', array(
        'label'    => esc_html__( 'Display Related Services', 'safeguard' ),
        'section'  => 'safeguard_services_settings',
        'settings' => 'safeguard_services_settings_related',
        'type'     => 'select',
        'choices'  => array(
            '1' => esc_html__( 'On', 'safeguard' ),
            '0'  => esc_html__( 'Off', 'safeguard' ),
        ),
        'priority'   => 20
	) );

    $wp_customize->add_control( 'safeguard_services_settings_share', array(
            'label'    => esc_html__( 'Display Share on Services', 'safeguard' ),
            'section'  => 'safeguard_services_settings',
            'settings' => 'safeguard_services_settings_share',
            'type'     => 'select',
            'choices'  => array(
                '1' => esc_html__( 'On', 'safeguard' ),
                '0'  => esc_html__( 'Off', 'safeguard' ),
            ),
            'priority'   => 30
    ) );

 $wp_customize->add_control( 'safeguard_services_image_header', array(
            'label'    => esc_html__( 'Use service image for service header', 'safeguard' ),
            'section'  => 'safeguard_services_settings',
            'settings' => 'safeguard_services_image_header',
            'type'     => 'select',
            'choices'  => array(
                '1' => esc_html__( 'On', 'safeguard' ),
                '0'  => esc_html__( 'Off', 'safeguard' ),
            ),
            'priority'   => 40
    ) );

}