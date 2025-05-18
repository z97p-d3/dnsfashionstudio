<?php

function safeguard_customize_portfolio_tab($wp_customize, $theme_name) {

	$wp_customize->add_panel('safeguard_portfolio_settings',
	array(
		'title' => esc_html__( 'Portfolio', 'safeguard' ),
		'priority' => 55,
		)
	);

	// portfolio general settings
	$wp_customize->add_section( 'safeguard_portfolio_general_settings' , array(
		'title'      => esc_html__( 'Portfolio General', 'safeguard' ),
		'priority'   => 10,
		'panel' => 'safeguard_portfolio_settings'
	) );

	$wp_customize->add_setting( 'safeguard_portfolio_settings_thumb_width' , array(
		'default'     => '556',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_absinteger'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_thumb_width',
		array(
			'label'    => esc_html__( 'Portfolio Tumbnails Width (px)', 'safeguard' ),
			'section'  => 'safeguard_portfolio_general_settings',
			'settings' => 'safeguard_portfolio_settings_thumb_width',
			'type'     => 'textfield',
			'description' => esc_html__( 'Default: 556px', 'safeguard' ),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_thumb_height' , array(
		'default'     => '556',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_absinteger'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_thumb_height',
		array(
			'label'    => esc_html__( 'Portfolio Tumbnails Height (px)', 'safeguard' ),
			'section'  => 'safeguard_portfolio_general_settings',
			'settings' => 'safeguard_portfolio_settings_thumb_height',
			'type'     => 'textfield',
			'description' => esc_html__( 'Default: 556px', 'safeguard' ),
			'priority' => 20
		)
	);


	// portfolio categories page settings
	$wp_customize->add_section( 'safeguard_portfolio_categories_settings' , array(
		'title'      => esc_html__( 'Portfolio Category and Archive Pages', 'safeguard' ),
		'priority'   => 20,
		'panel' => 'safeguard_portfolio_settings'
	) );

	$wp_customize->add_setting( 'safeguard_portfolio_settings_type' , array(
		'default'     => 'type_without_icons',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_portfolio_type'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_type',
		array(
			'label'    => esc_html__( 'Item type', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_type',
			'description' => esc_html__( 'Portfolio items per row for portfolio category and archive pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'type_without_icons' => esc_html__( 'Without over icons with space', 'safeguard' ),
				'type_without_space' => esc_html__( 'Without over icons and space', 'safeguard' ),
				'type_with_icons' => esc_html__( 'With over icons', 'safeguard' ),
			),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_perrow' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_portfolio_perrow'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_perrow',
		array(
			'label'    => esc_html__( 'Portfolio Column Number', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_perrow',
			'description' => esc_html__( 'Portfolio items per row for portfolio category and archive pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'2' => esc_html__( '2 columns', 'safeguard' ),
				'3' => esc_html__( '3 columns', 'safeguard' ),
				'4' => esc_html__( '4 columns', 'safeguard' ),
			),
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_perpage' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_per_page'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_perpage',
		array(
			'label'    => esc_html__( 'Portfolio Item per page', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_perpage',
			'description' => esc_html__( 'Portfolio items per page for portfolio category and archive pages. Leave empty to show all items.', 'safeguard' ),
			'type'     => 'textfield',
			'priority' => 30
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_sidebar_type' , array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_sidebar_portfolio_type'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_sidebar_type',
		array(
			'label'    => esc_html__( 'Portfolio sidebar type', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_sidebar_type',
			'description' => esc_html__( 'Select sidebar type for portfolio category and archive pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'1' => esc_html__( 'Full width', 'safeguard' ),
				'2' => esc_html__( 'Right Sidebar', 'safeguard' ),
				'3' => esc_html__( 'Left Sidebar', 'safeguard' ),
			),
			'priority' => 40
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_sidebar_content' , array(
		'default'     => 'sidebar-1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_sidebar_portfolio_content'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_sidebar_content',
		array(
			'label'    => esc_html__( 'Portfolio sidebar content', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_sidebar_content',
			'description' => esc_html__( 'Select sidebar content for portfolio category and archive pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'sidebar-1' => esc_html__( 'WP Default Sidebar', 'safeguard' ),
				'global-sidebar-1' => esc_html__( 'Blog Sidebar', 'safeguard' ),
				'portfolio-sidebar-1' => esc_html__( 'Portfolio Sidebar', 'safeguard' ),
				'custom-area-1' => esc_html__( 'Custom Area', 'safeguard' ),
			),
			'priority' => 50
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_loadmore' , array(
		'default'     => esc_html__('Load more', 'safeguard' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_loadmore',
		array(
			'label'    => esc_html__( 'Load More button text', 'safeguard' ),
			'section'  => 'safeguard_portfolio_categories_settings',
			'settings' => 'safeguard_portfolio_settings_loadmore',
			'type'     => 'textfield',
			'priority' => 60
		)
	);


	// portfolio single page settings
	$wp_customize->add_section( 'safeguard_portfolio_single_settings' , array(
		'title'      => esc_html__( 'Portfolio Single Page', 'safeguard' ),
		'priority'   => 30,
		'panel' => 'safeguard_portfolio_settings'
	) );

	$wp_customize->add_setting( 'safeguard_portfolio_settings_related_show' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_related_show',
		array(
			'label'    => esc_html__( 'Show block Related projects', 'safeguard' ),
			'section'  => 'safeguard_portfolio_single_settings',
			'settings' => 'safeguard_portfolio_settings_related_show',
			'description' => esc_html__( 'Select on/off Related projects for portfolio single pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'on' => esc_html__( 'On', 'safeguard' ),
				'off' => esc_html__( 'Off', 'safeguard' ),
			),
			'priority' => 10
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_related_title' , array(
		'default'     => esc_html__('Related projects', 'safeguard' ),
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_related_title',
		array(
			'label'    => esc_html__( 'Title block Related Projects', 'safeguard' ),
			'section'  => 'safeguard_portfolio_single_settings',
			'settings' => 'safeguard_portfolio_settings_related_title',
			'type'     => 'textfield',
			'priority' => 20
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_related_desc' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_text'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_related_desc',
		array(
			'label'    => esc_html__( 'Description block Related Projects', 'safeguard' ),
			'section'  => 'safeguard_portfolio_single_settings',
			'settings' => 'safeguard_portfolio_settings_related_desc',
			'type'     => 'textarea',
			'priority' => 30
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_share' , array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback' => 'safeguard_sanitize_onoff'
	) );

	$wp_customize->add_control(
		'safeguard_portfolio_settings_share',
		array(
			'label'    => esc_html__( 'Show share', 'safeguard' ),
			'section'  => 'safeguard_portfolio_single_settings',
			'settings' => 'safeguard_portfolio_settings_share',
			'description' => esc_html__( 'Select on/off share for portfolio single pages.', 'safeguard' ),
			'type'     => 'select',
			'choices'  => array(
				'on' => esc_html__( 'On', 'safeguard' ),
				'off' => esc_html__( 'Off', 'safeguard' ),
			),
			'priority' => 40
		)
	);

	$wp_customize->add_setting( 'safeguard_portfolio_settings_link_to_all' , array(
		'default'     => '0',
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_url'
	) );
	$wp_customize->add_control( 'safeguard_portfolio_settings_page', array(
		'label'    => esc_html__( 'Select Page For All Works', 'safeguard' ),
		'section'  => 'safeguard_portfolio_single_settings',
		'settings' => 'safeguard_portfolio_settings_link_to_all',
		'type'     => 'dropdown-pages',
		'priority' => 50
	) );


}