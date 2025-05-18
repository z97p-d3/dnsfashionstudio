<?php


	/** Fonts Icon Loader */

	$vc_icons_data = safeguard_init_vc_icons();


	/// business_tabs
	vc_map(
		array(
			'name' => esc_html__( 'Tabs Content', 'safeguard' ),
			'base' => 'business_tabs',
			'class' => 'wpb_vc_tta_tabs pix-theme-icon-business pix-theme-icon_info',
			'as_parent' => array('only' => 'business_tab'),
			'content_element' => true,
			'show_settings_on_create' => false,
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Tabs Style', 'safeguard' ),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__('Default', 'safeguard') => 'tmpl-default-tabs',
                        esc_html__('Full width', 'safeguard') => 'full-width-tabs',
                    ),
                ),
            ),
			'admin_enqueue_js' => get_template_directory_uri().'/js/custom-vc-admin.js',
			'js_view' => 'VcPixContainerView',
		)
	);
	safeguard_vc_map(
		array(
			'name' => esc_html__( 'Tab', 'safeguard' ),
			'base' => 'business_tab',
			'class' => 'wpb_vc_tta_tabs pix-theme-icon-business pix-theme-icon_info',
			'as_child' => array('only' => 'business_tabs'),
			'as_parent' => array('except' => 'vc_tabs,vc_accordion'),
			'content_element' => true,
			'show_settings_on_create' => true,
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => '',
					'description' => esc_html__( 'Tab Title.', 'safeguard' )
				),
				array(
					'type' => 'tab_id',
					'heading' => esc_html__( 'Tab ID', 'safeguard' ),
					'param_name' => "tab_id",
				),
			),
			'admin_enqueue_js' => get_template_directory_uri().'/js/custom-vc-admin.js',
			'js_view' => 'VcPixContainerView',
		),
		array(),
		safeguard_get_vc_icons($vc_icons_data)
	);
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Business_Tabs extends WPBakeryShortCode_Box_Container {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Business_Tab extends WPBakeryShortCode_Box_Container {
		}
	}





	/// business_team
	//////// Our Team ////////
	vc_map( array(
		'name' => esc_html__( 'Our Team', 'safeguard' ),
		'base' => 'business_team',
		'class' => 'wpb_vc_tta_tabs pix-theme-icon-business pix-theme-icon_info',
		'as_parent' => array('only' => 'business_team_member'),
		'content_element' => true,
		'show_settings_on_create' => false,
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Carousel', 'safeguard' ),
				'param_name' => 'carousel',
				'value' => array(
					esc_html__( "Enable", 'safeguard' ) => 'owl-carousel enable-owl-carousel',
					esc_html__( "Disable", 'safeguard' ) => 'disable-owl-carousel',
				),
				'description' => esc_html__( 'On/off carousel', 'safeguard' )
			),
		),
		'admin_enqueue_js' => get_template_directory_uri().'/js/custom-vc-admin.js',
		'js_view' => 'VcPixContainerView',

	) );
	vc_map( array(
		'name' => esc_html__( 'Team Member', 'safeguard' ),
		'base' => 'business_team_member',
		'class' => 'pix-theme-icon-business pix-theme-icon_info',
		'as_child' => array('only' => 'business_team'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'safeguard' ),
				'param_name' => 'name',
				'description' => esc_html__( 'Team member name.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'safeguard' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Member position.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 1', 'safeguard' ),
				'param_name' => 'scn1',
				'description' => esc_html__( 'https://www.facebook.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 1', 'safeguard' ),
				'param_name' => 'scn_icon1',
				'description' => wp_kses_post(__( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 2', 'safeguard' ),
				'param_name' => 'scn2',
				'description' => esc_html__( 'https://twitter.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 2', 'safeguard' ),
				'param_name' => 'scn_icon2',
				'description' => wp_kses_post(__( 'Add icon fa-twitter <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'safeguard' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://instagram.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'safeguard' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post(__( 'Add icon fa-instagram <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'safeguard' ),
				'param_name' => 'scn4',
				'description' => esc_html__( 'https://pinterest.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'safeguard' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post(__( 'Add icon fa-pinterest <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 5', 'safeguard' ),
				'param_name' => 'scn5',
				'description' => esc_html__( 'https://vk.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 5', 'safeguard' ),
				'param_name' => 'scn_icon5',
				'description' => wp_kses_post(__( 'Add icon fa-vk <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Business_Team extends WPBakeryShortCode_Box_Container {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Business_Team_Member extends WPBakeryShortCode {
		}
	}
	////////////////////////





	/// business_accordion
	vc_map(
		array(
			'name' => esc_html__( 'Verticale icon tabs', 'safeguard' ),
			'base' => 'business_accordion',
			'class' => 'wpb_vc_tta_tabs pix-theme-icon-business pix-theme-icon_info',
			'as_parent' => array('only' => 'business_accordion_tab'),
			'content_element' => true,
			'show_settings_on_create' => false,
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => $add_animation,
			'admin_enqueue_js' => get_template_directory_uri().'/js/custom-vc-admin.js',
			'js_view' => 'VcPixContainerView',
		)
	);
	safeguard_vc_map(
		array(
			'name' => esc_html__( 'Tab', 'safeguard' ),
			'base' => 'business_accordion_tab',
			'class' => 'pix-theme-icon-business pix-theme-icon_info',
			'as_child' => array('only' => 'business_accordion'),
			'content_element' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Social title.', 'safeguard' )
				),
				array(
					'type' => 'tab_id',
					'heading' => esc_html__( 'Tab ID', 'safeguard' ),
					'param_name' => "tab_id",
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Info', 'safeguard' ),
					'param_name' => 'content',
					'description' => esc_html__( 'Enter information.', 'safeguard' ),
				),
			),
		),
		array(),
		safeguard_get_vc_icons($vc_icons_data),
		2 // order before icon field
	);
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Business_Accordion extends WPBakeryShortCode_Box_Container {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Business_Accordion_Tab extends WPBakeryShortCode {
		}
	}
	////////////////////////





?>