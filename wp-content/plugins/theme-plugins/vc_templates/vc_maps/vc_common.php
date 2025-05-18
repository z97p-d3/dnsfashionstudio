<?php

	$vc_icons_data = safeguard_init_vc_icons();

	$args = array( 'hide_empty' => true );
	$categories = get_terms( $args );
	$cats = $cats_woo = $cats_serv = array();
	foreach($categories as $category){
		if( is_object($category) ){
			if( $category->taxonomy == 'portfolio_category' ){
				$cats[$category->name] = $category->slug;
			} elseif( $category->taxonomy == 'product_cat' ) {
				$cats_woo[$category->name] = $category->term_id;
			} elseif( $category->taxonomy == 'services_category' ) {
				$cats_serv[$category->name] = $category->slug;
			}
		}
	}

	$args = array( 'post_type' => 'services');
	$services = get_posts($args);
	$serv = array();
	if(empty($services['errors'])){
		foreach($services as $service){
			$serv[$service->post_title] = $service->ID;
		}
	}
	
	$args = array( 'post_type' => 'wpcf7_contact_form');
	$forms = get_posts($args);
	$cform7 = array();
	if(empty($forms['errors'])){
		foreach($forms as $form){		
			$cform7[$form->post_title] = $form->ID;
		}
	}

	$add_animation = array(
		vc_map_add_css_animation(),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Animation Settings', 'safeguard' ),
			'param_name' => 'animation_settings',
			'value' => array(
				esc_html__( 'Default', 'safeguard' ) => '',
				esc_html__( 'Custom', 'safeguard' ) => 'custom',
			),
			'description' => esc_html__( 'Use default/custom animation settings.', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Duration", 'safeguard' ),
			'param_name' => 'wow_duration',
			'value' => '',
			'description' => esc_html__( 'Change the animation duration in seconds.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Delay", 'safeguard' ),
			'param_name' => 'wow_delay',
			'value' => '',
			'description' => esc_html__( 'Delay before the animation starts in seconds.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Offset", 'safeguard' ),
			'param_name' => 'wow_offset',
			'value' => '',
			'description' => esc_html__( 'Distance to start the animation (related to the browser bottom) in pixels.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Iteration", 'safeguard' ),
			'param_name' => 'wow_iteration',
			'value' => '',
			'description' => esc_html__( 'Number of times the animation is repeated.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
	);

	$add_animation_group = array(
		vc_map_add_css_animation(),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Animation Settings', 'safeguard' ),
			'param_name' => 'animation_settings',
			'value' => array(
				esc_html__( 'Default', 'safeguard' ) => '',
				esc_html__( 'Custom', 'safeguard' ) => 'custom',
			),
			'description' => esc_html__( 'Use default/custom animation settings.', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Items in Group", 'safeguard' ),
			'param_name' => 'wow_group',
			'value' => '',
			'description' => esc_html__( 'Items number in animated group.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Group Delay Offset", 'safeguard' ),
			'param_name' => 'wow_group_delay',
			'value' => '',
			'description' => esc_html__( 'Offset delay before the next group animation starts in seconds.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Duration", 'safeguard' ),
			'param_name' => 'wow_duration',
			'value' => '',
			'description' => esc_html__( 'Change the animation duration in seconds.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Delay", 'safeguard' ),
			'param_name' => 'wow_delay',
			'value' => '',
			'description' => esc_html__( 'Delay before the animation starts in seconds.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Offset", 'safeguard' ),
			'param_name' => 'wow_offset',
			'value' => '',
			'description' => esc_html__( 'Distance to start the animation (related to the browser bottom) in pixels.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Iteration", 'safeguard' ),
			'param_name' => 'wow_iteration',
			'value' => '',
			'description' => esc_html__( 'Number of times the animation is repeated.', 'safeguard' ),
			'dependency' => array(
				'element' => 'animation_settings',
				'not_empty' => true,
			),
		),
	);


	$jarallax = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( "Background Style", 'safeguard' ),
			'param_name' => 'bgstyle',
			'value' => array(
				esc_html__( "Default", 'safeguard' ) => '',
				esc_html__( "Parallax", 'safeguard' ) => 'jarallax',
				esc_html__( "Fixed", 'safeguard' ) => 'attachment',
			),
			'description' => esc_html__( "Image background style", 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( "Background Image", 'safeguard' ),
			'param_name' => 'bgimage',
			'value' => '',
			'description' => esc_html__( "Background image ", 'safeguard' ),
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => array('jarallax', 'attachment'),
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( "Stretch Content", 'safeguard' ),
			'param_name' => 'jarstretch',
			'value' => array('No', 'Yes'),
			'description' => esc_html__( 'Select stretching options for content.', 'safeguard' ),
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( "Type", 'safeguard' ),
			'param_name' => 'jartype',
			'value' => array('Default', 'scale', 'opacity', 'scroll-opacity', 'scale-opacity'),
			'description' => '',
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__( "Speed", 'safeguard' ),
			"param_name" => "jarspeed",
			"value" => '',
			"description" => esc_html__( "Provide numbers from -1.0 to 2.0", 'safeguard' ),
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => "Text Color",
			'param_name' => 'ptextcolor',
			'value' => array("Default" , "White" , "Black"),
			'description' => esc_html__( "Text Color", 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),

		// Gradient
        array(
            'type' => 'param_group',
            'value' => '',
            'heading' => esc_html__( 'Gradient', 'safeguard' ),
            'param_name' => 'gradient_colors',
            // Note params is mapped inside param-group:
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'value' => '',
                    'heading' => esc_html__( 'Color For Gradient', 'safeguard' ),
                    'param_name' => 'gradient_color',
                )
            ),
		    'group' => esc_html__( 'Gradient', 'safeguard' ),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Direction', 'safeguard' ),
			'param_name' => 'gradient_direction',
			'value' => array(
				esc_html__( 'To Right ', 'safeguard' ).html_entity_decode('&rarr;') => 'to right',
				esc_html__( 'To Left ', 'safeguard' ).html_entity_decode('&larr;') => 'to left',
				esc_html__( 'To Bottom ', 'safeguard' ).html_entity_decode('&darr;') => 'to bottom',
				esc_html__( 'To Top ', 'safeguard' ).html_entity_decode('&uarr;') => 'to top',
				esc_html__( 'To Bottom Right ', 'safeguard' ).html_entity_decode('&#8600;') => 'to bottom right',
				esc_html__( 'To Bottom Left ', 'safeguard' ).html_entity_decode('&#8601;') => 'to bottom left',
				esc_html__( 'To Top Right ', 'safeguard' ).html_entity_decode('&#8599;') => 'to top right',
				esc_html__( 'To Top Left ', 'safeguard' ).html_entity_decode('&#8598;') => 'to top left',
				esc_html__( 'Angle ', 'safeguard' ).html_entity_decode('&#10227;') => 'angle',
			),
			'description' => '',
			'group' => esc_html__( 'Gradient', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle Direction', 'safeguard' ),
			'param_name' => 'gradient_angle',
			'value' => "90",
			'description' => esc_html__( 'Values -360 - 360', 'safeguard' ),
			'dependency' => array(
				'element' => 'gradient_direction',
				'value' => 'angle',
			),
			'group' => esc_html__( 'Gradient', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Opacity', 'safeguard' ),
			'param_name' => 'gradient_opacity',
			'value' => "1",
			'description' => esc_html__( 'Values 0.01 - 0.99', 'safeguard' ),
			'group' => esc_html__( 'Gradient', 'safeguard' ),
		),

		// Decors
		// Top Decor
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Show Section Top Decor', 'safeguard' ),
			'param_name' => 'pdecor',
			'value' => array(
				esc_html__( "No", 'safeguard' ) => '0',
				esc_html__( "Yes", 'safeguard' ) => '1',
			),
			'description' => esc_html__( "Show decor at the top of the section.", 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Height', 'safeguard' ),
			'param_name' => 'decor_height',
			'value' => '90',
			'description' => esc_html__( 'Values 0 - 300', 'safeguard' ),
			'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Show Border', 'safeguard' ),
			'param_name' => 'decor_border',
			'value' => array(
				esc_html__( 'No', 'safeguard' ) => '0',
				esc_html__( 'Yes', 'safeguard' ) => '1',
			),
			'description' => '',
			'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Show Point Circle', 'safeguard' ),
			'param_name' => 'decor_circles',
			'value' => array(
				esc_html__( 'No', 'safeguard' ) => '0',
				esc_html__( 'Yes', 'safeguard' ) => '1',
			),
			'description' => '',
			'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Top Decor Opacity', 'safeguard' ),
			'param_name' => 'decor_opacity',
			'value' => '',
			'description' => esc_html__( 'Values 0.01 - 0.99', 'safeguard' ),
			'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Top Decor Points', 'safeguard' ),
			'param_name' => 'decor_points_top',
			'value' => '',
			'description' => esc_html__( 'Example: 0,10 5,8 23,75 41,35 59,60 77,10 95,55 100,30', 'safeguard' ),
			'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Overlay', 'safeguard' ),
			'param_name' => 'poverlay',
			'value' => array(
				esc_html__( "Use", 'safeguard' ) => 'pix-row-overlay',
				esc_html__( "None", 'safeguard' ) => 'no-overlay',
			),
			'description' => '',
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),

	);

	$attributes2 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Disable Gap', 'safeguard' ),
			'param_name' => 'pix_gap',
			'value' => array(
				esc_html__( 'No', 'safeguard' ) => '',
				esc_html__( 'Yes', 'safeguard' ) => 'disable',
			),
			'description' => esc_html__( 'No padding between columns.', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Use Section Anchor', 'safeguard' ),
			'param_name' => 'panchor',
			'value' => array("No" , "Yes"),
			'description' => esc_html__( 'Need Row ID. ', 'safeguard' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding', 'safeguard' ),
			'param_name' => 'ppadding',
			'value' => array(
				esc_html__( "No Padding", 'safeguard' ) => 'pix-vc_row-no-padding',
				esc_html__( "Both", 'safeguard' ) => 'vc_row-padding-both',
				esc_html__( "Top", 'safeguard' ) => 'vc_row-padding-top',
				esc_html__( "Bottom", 'safeguard' ) => 'vc_row-padding-bottom',
			),
			'description' => esc_html__( 'Top, bottom, both', 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
	);

	$attributes3 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Vertical Row Title', 'safeguard' ),
			'param_name' => 'row_title',
			'value' => array(
				esc_html__( 'No', 'safeguard' ) => '0',
				esc_html__( 'Yes', 'safeguard' ) => '1',
			),
			'description' => esc_html__( "Show vertical title of the section.", 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Title Position', 'safeguard' ),
			'param_name' => 'title_pos',
			'value' => array(
				esc_html__( 'Left', 'safeguard' ) => 'left',
				esc_html__( 'Right', 'safeguard' ) => 'right',
			),
			'dependency' => array(
				'element' => 'row_title',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'safeguard' ),
			'param_name' => 'title',
			'description' => esc_html__( 'Title', 'safeguard' ),
			'dependency' => array(
				'element' => 'row_title',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Subtitle', 'safeguard' ),
			'param_name' => 'subtitle',
			'description' => esc_html__( 'Subtitle', 'safeguard' ),
			'dependency' => array(
				'element' => 'row_title',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Number', 'safeguard' ),
			'param_name' => 'num',
			'description' => esc_html__( 'Number', 'safeguard' ),
			'dependency' => array(
				'element' => 'row_title',
				'value' => '1',
			),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'animation_style',
			'heading' => esc_html__( 'Animate Title', 'safeguard' ),
			'param_name' => 'title_animate',
			'value' => '',
			'dependency' => array(
				'element' => 'row_title',
				'value' => '1',
			),
			'description' => esc_html__( 'Use title animation.', 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
	);
	$attributes = array_merge($attributes2, safeguard_get_vc_icons($vc_icons_data), $jarallax, $attributes3);
	vc_add_params( 'vc_row', $attributes );
	vc_add_params( 'vc_row_inner', array(vc_map_add_css_animation()) );
	vc_add_params( 'vc_row_inner', $jarallax );
	vc_add_params( 'vc_column', $jarallax );


	///// VC_MAP /////
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Box_Container extends WPBakeryShortCodesContainer {
			protected $controls_css_settings = 'out-tc vc_controls-content-widget';
			protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );

			public function __construct( $settings ) {
				parent::__construct( $settings );
			}

			public function contentAdmin( $atts, $content = null ) {

				$elem = $this->getElementHolder( '' );
				$elem = str_ireplace( 'wpb_content_element', '', $elem );
				$elem = str_ireplace( '%wpb_element_content%', '<div class="wpb_column_container vc_container_for_children vc_clearfix vc_empty-container ui-sortable ui-droppable"></div>', $elem );
				$output = $elem;

				return $output;
			}
		}
	}


	
	safeguard_vc_map(
		array(
			"name" => esc_html__( "Portfolio", 'safeguard' ),
			"base" => "common_portfolio",
			"class" => "pix-templ-icon",
			'category' => esc_html__( 'Theme Widgets', 'safeguard' ),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display Type', 'safeguard' ),
					'param_name' => 'display',
					'value' => array(
						esc_html__( 'Isotop', 'safeguard' ) => 'isotop',
					),
					'description' => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Show filter', 'safeguard' ),
					'param_name' => 'filter',
					'value' => array(
						esc_html__( "Yes", 'safeguard' ) => 'yes',
						esc_html__( "No", 'safeguard' ) => 'no',
					),
					'description' => '',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Categories', 'safeguard' ),
					'param_name' => 'cat_port',
					'value' => $cats,
					'description' => esc_html__( 'Select categories to show their portfolio.', 'safeguard' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns Number', 'safeguard' ),
					'param_name' => 'perrow',
					'value' => array(
						esc_html__( '2 Columns', 'safeguard' ) => '2',
						esc_html__( '3 Columns', 'safeguard' ) => '3',
						esc_html__( '4 Columns', 'safeguard' ) => '4',
					),
					'dependency' => array(
						'element' => 'display',
						'value' => array('isotop'),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items Count', 'safeguard' ),
					'param_name' => 'count',
					'description' => esc_html__( 'Select number portfolio works to show per page. Leave empty to show all warks.', 'safeguard' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Item type', 'safeguard' ),
					'param_name' => 'type',
					'value' => array(
						esc_html__( 'Without space', 'safeguard' ) => 'type_without_space',
					),
					'dependency' => array(
						'element' => 'display',
						'value' => array('isotop'),
					),
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Project Link text', 'safeguard' ),
                    'param_name' => 'btntext_pl',
                    'value' => '',
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array('type_with_icons'),
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Client Link text', 'safeguard' ),
                    'param_name' => 'btntext_cl',
                    'value' => '',
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array('type_with_icons'),
                    ),
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Show Load more button', 'safeguard' ),
					'param_name' => 'btnshow',
					'value' => array(
						esc_html__( 'No', 'safeguard' ) => 'no',
						esc_html__( 'Yes', 'safeguard' ) => 'yes',
					),
					'dependency' => array(
						'element' => 'display',
						'value' => array('isotop'),
					),
					'description' => esc_html__( 'Show or not button Load more', 'safeguard' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'safeguard' ),
					'param_name' => 'btntext',
					'value' => esc_html__( 'Load more', 'safeguard' ),
					'dependency' => array(
						'element' => 'btnshow',
						'value' => array('yes'),
					),
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'heading' => esc_html__( 'Description', 'safeguard' ),
					'param_name' => 'content',
					'value' => '',
				),
				array(
					'type' => 'tab_id',
					'heading' => esc_html__( 'ID', 'safeguard' ),
					'param_name' => "tab_id",
				),
			)
		),
		$add_animation_group
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Portfolio extends WPBakeryShortCode {

		}
	}

	////////////////////////


	
	/// common_services_cat
	vc_map(
		array(
			"name" => esc_html__( "Departments", 'safeguard' ),
			"base" => "common_services_cat",
			"class" => "pix-safeguard-icon",
			"category" => esc_html__( "Theme Widgets", 'safeguard'),
			"params" => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Departments', 'safeguard' ),
					'param_name' => 'cats',
					'value' => $cats_serv,
					'description' => esc_html__( 'Select departments to show', 'safeguard' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Appearance', 'safeguard' ),
					'param_name' => 'appearance',
					'value' => array(
						esc_html__( 'Departament 1 (With Icon Only)', 'safeguard' ) => 'department-1',
						esc_html__( 'Departament 2 (With Hover Image)', 'safeguard' ) => 'department-2',
						esc_html__( 'Departament 3 (With Background Image)', 'safeguard' ) => 'department-3',
					),
					'description' => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Items Per Row', 'safeguard' ),
					'param_name' => 'per_row',
					'value' => array(
						"1" => 1,
						"2" => 2,
						"3" => 3,
						"4" => 4,
						"5" => 5,
						"6" => 6,
					),
					'description' => '',
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'heading' => esc_html__( 'Limit Text Description', 'safeguard' ),
					'param_name' => 'limit_text',
					'description' => esc_html__( 'Default 20 characters.', 'safeguard' ),
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'heading' => esc_html__( 'Button Text', 'safeguard' ),
					'param_name' => 'btn_text',
					'description' => esc_html__( 'Leave empty to hide.', 'safeguard' ),
					'dependency' => array(
						'element' => 'appearance',
						'value' => array('department-1', 'department-2'),
					),
				),
				array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Use Links', 'safeguard' ),
                    'param_name' => 'links',
                    'value' => array(
                        esc_html__( 'Yes', 'safeguard' ) => '',
                        esc_html__( 'No', 'safeguard' ) => 'dprtm-disable-links',
                    ),

                ),
				vc_map_add_css_animation(),
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Services_Cat extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	/// common_services
	vc_map(
		array(
			"name" => esc_html__( "Services", 'safeguard' ),
			"base" => "common_services",
			"class" => "pix-safeguard-icon",
			"category" => esc_html__( "Theme Widgets", 'safeguard'),
			"params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Style', 'safeguard' ),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( "Classic", 'safeguard' ) => 'classic',
                        esc_html__( "Boxed", 'safeguard' ) => 'boxed'
                    ),
                    'description' => esc_html__('Select services display style', 'safeguard' ),
                ),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Use Template With', 'safeguard' ),
					'param_name' => 'template',
					'value' => array(
						esc_html__( "With Department Menu", 'safeguard' ) => 'menu',
						esc_html__( "Isotop Filter", 'safeguard' ) => 'isotop',
						esc_html__( "Without Menu And Filter", 'safeguard' ) => 'landing',
					),
					'description' => esc_html__('In "With Department Menu" template you can\'t select departments.', 'safeguard' ),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Departmens', 'safeguard' ),
					'param_name' => 'cat_serv',
					'value' => $cats_serv,
					'description' => esc_html__( 'Select departmens to show their services.', 'safeguard' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('isotop', 'landing'),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Items Per Row', 'safeguard' ),
					'param_name' => 'per_row',
					'value' => array(
						esc_html__( "4 ", 'safeguard' ) => 'col-md-3 col-sm-6',
						esc_html__( "3 ", 'safeguard' ) => 'col-md-4',
					),
					'dependency' => array(
						'element' => 'template',
						'value' => array('landing'),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items Count', 'safeguard' ),
					'param_name' => 'count',
					'description' => esc_html__( 'Select number services to show.', 'safeguard' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('menu', 'landing'),
					),
				),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Sticky Department Menu', 'safeguard' ),
                    'param_name' => 'sticky',
                    'value' => array(
                        esc_html__( 'Yes', 'safeguard' ) => 'sticky-bar',
                        esc_html__( 'No', 'safeguard' ) => 'no-sticky-bar',
                    ),
                    'dependency' => array(
                        'element' => 'template',
                        'value' => array('menu'),
                    ),
                ),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'safeguard' ),
					'param_name' => 'buttext',
					'value' => esc_html__( 'READ MORE', 'safeguard' ),
					'description' => '',
				),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Text Position', 'safeguard' ),
                    'param_name' => 'textposition',
                    'value' => array(
                        esc_html__( "Center", 'safeguard' ) => 'center',
                        esc_html__( "Left", 'safeguard' ) => 'left',
                        esc_html__( "Right", 'safeguard' ) => 'right'
                    ),
                    'description' => esc_html__('Text Position', 'safeguard' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Text Transform', 'safeguard' ),
                    'param_name' => 'texttransform',
                    'value' => array(
                        esc_html__( "Normal", 'safeguard' ) => 'normal',
                        esc_html__( "Uppercase", 'safeguard' ) => 'uppercase',
                        esc_html__( "Lowercase", 'safeguard' ) => 'lowercase'

                    ),
                    'description' => esc_html__('Text Transform', 'safeguard' ),
                ),
                array(
			'type' => 'widgetised_sidebars',
			'heading' => __( 'Sidebar', 'js_composer' ),
			'param_name' => 'sidebar_id',
			'description' => __( 'Select widget area to display.', 'js_composer' ),
		),
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Services extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	// Shopping Cart
	vc_map( array(
		'name' => esc_html__( 'Single Shopping Cart', 'safeguard' ),
		'base' => 'common_shopping_cart',
		'class' => 'pix-safeguard-icon',
		'category' => esc_html__( 'Theme Widgets' , 'safeguard' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'heading' => esc_html__( 'Product ID', 'safeguard' ),
				'param_name' => 'product_id',
				'value' => '',
				'description' => wp_kses_post(sprintf(__( 'See product ID <a target="_blank" href="%s">here</a>.', 'safeguard' ), esc_url(admin_url().'edit.php?post_type=product'))),
			)
		)
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Shopping_cart extends WPBakeryShortCode {
		}
	}
	

	/// common_section_pricetable
	//////// Price Table ////////
	vc_map( array(
		'name' => esc_html__( 'Price Table', 'safeguard' ),
		'base' => 'common_pricetable',
		'class' => 'wpb_vc_tta_tabs pix-safeguard-icon',
		'as_parent' => array('only' => 'common_pricecol'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Table Type', 'safeguard' ),
				'param_name' => 'typetable',
				'value' => array(
					esc_html__( "Both", 'safeguard' ) => '',
					esc_html__( "Monthly only", 'safeguard' ) => 'monthly',
					esc_html__( "Yearly only", 'safeguard' ) => 'yearly',
				),
				'description' => '',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Monthly', 'safeguard' ),
				'param_name' => 'monthtext',
				'value' => 'Monthly',
				'description' => esc_html__( 'Change text for button', 'safeguard' ),
				'dependency' => array(
					'element' => 'typetable',
					'value' => array('', 'monthly'),
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Yearly', 'safeguard' ),
				'param_name' => 'yeartext',
				'value' => 'Yearly',
				'description' => esc_html__( 'Change text for button', 'safeguard' ),
				'dependency' => array(
					'element' => 'typetable',
					'value' => array('', 'yearly'),
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Monthly Short', 'safeguard' ),
				'param_name' => 'monthshort',
				'value' => 'month',
				'description' => esc_html__( 'Change price duration', 'safeguard' ),
				'dependency' => array(
					'element' => 'typetable',
					'value' => array('', 'monthly'),
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Yearly Short', 'safeguard' ),
				'param_name' => 'yearshort',
				'value' => 'year',
				'description' => esc_html__( 'Change price duration', 'safeguard' ),
				'dependency' => array(
					'element' => 'typetable',
					'value' => array('', 'yearly'),
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Currency', 'safeguard' ),
				'param_name' => 'currency',
				'value' => '$',
				'description' => esc_html__( 'Change currency', 'safeguard' )
			),
		),
		'admin_enqueue_js' => get_template_directory_uri().'/js/custom-vc-admin.js',
		'js_view' => 'VcPixContainerView',

	) );

	vc_map( array(
		'name' => esc_html__( 'Price Column', 'safeguard' ),
		'base' => 'common_pricecol',
		'class' => 'pix-theme-icon',
		'as_child' => array('only' => 'common_pricetable'),
		'content_element' => true,
		'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Column title.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Subtitle', 'safeguard' ),
					'param_name' => 'subtitle',
					'description' => esc_html__( 'Subtitle text.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Month Price', 'safeguard' ),
					'param_name' => 'monthprice',
					'description' => esc_html__( 'Price for the month.', 'safeguard' ),

				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Year Price', 'safeguard' ),
					'param_name' => 'yearprice',
					'description' => esc_html__( 'Price for the year.', 'safeguard' ),
				),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => esc_html__( "Is Popular", 'safeguard' ),
					"param_name" => "ispopular",
					"description" => esc_html__( "Marked if checked.", 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Text', 'safeguard' ),
					'param_name' => 'btntext',
					'description' => esc_html__( 'Button text.', 'safeguard' )
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Item link.', 'safeguard' )
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Content", 'safeguard' ),
					"param_name" => "content",
					"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
					"description" => esc_html__( "Enter information.", 'safeguard' )
				),
		),
	) );
	if ( class_exists( 'WPBakeryShortCode_Box_Container' ) ) {
		class WPBakeryShortCode_Common_Pricetable extends WPBakeryShortCode_Box_Container {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Pricecol extends WPBakeryShortCode {
		}
	}
	////////////////////////


	/// common_mailchimp
	vc_map(
		array(
			'name' => esc_html__( 'Mailchimp Box', 'safeguard' ),
			'base' => 'common_mailchimp',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'show_settings_on_create' => false,
			'content_element' => true,
			'params' => array(),
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Mailchimp extends WPBakeryShortCode {

		}
	}


	/// common_twitter
	vc_map(
		array(
			"name" => esc_html__( 'Twitter Box', 'safeguard' ),
			"base" => 'common_twitter',
			 "class" => 'pix-safeguard-icon',
			"category" => esc_html__( 'Theme Widgets', 'safeguard'),
			'show_settings_on_create' => true,
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Latest from twitter', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Username', 'safeguard' ),
					'param_name' => 'username',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Consumer Key', 'safeguard' ),
					'param_name' => 'consumer_key',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Consumer Secret', 'safeguard' ),
					'param_name' => 'consumer_secret',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Access Token', 'safeguard' ),
					'param_name' => 'access_token',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Access Token Secret', 'safeguard' ),
					'param_name' => 'access_token_secret',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number of Tweets to show', 'safeguard' ),
					'param_name' => 'num_of_tweets',
					'value' => '5',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Carousel', 'safeguard' ),
					'param_name' => 'carousel',
					'value' => array(
						esc_html__('Enable', 'safeguard') => 1,
						esc_html__('Disable', 'safeguard') => 0,
					),
					'description' => esc_html__( 'On/off carousel', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Auto Play', 'safeguard' ),
					'param_name' => 'autoplay',
					'value' => '4000',
					'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'safeguard' ),
				),
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Twitter extends WPBakeryShortCode {
			public function hyperlinks($text) {
				$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a target=\"_blank\" href=\"$1\" class=\"twitter-link\">$1</a>", $text);
				$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a target=\"_blank\" href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
				// match name@address
				$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a target=\"_blank\" href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
					//mach #trendingtopics. Props to Michael Voigt
				$text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a target=\"_blank\" href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
				return $text;
			}
			/**
			 * Find twitter usernames and link to them
			 */
			public function twitter_users($text) {
				   $text = preg_replace('/([\.|\,|\:|\?|\?|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
				   return $text;
			}
		}
	}
	
	/// common_icon_box
	safeguard_vc_map(
		array(
			"name" => esc_html__( "Around Icon Box", 'safeguard' ),
			"base" => "common_icon_box",
			"class" => "pix-theme-icon-common pix-theme-icon_info",
			"category" => esc_html__( 'Theme Widgets', 'safeguard'),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"heading" => esc_html__( "Title", 'safeguard' ),
					"param_name" => "title",
					"value" => esc_html__( "I am title", 'safeguard' ),
					"description" => esc_html__( "Add Title ", 'safeguard' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon Position', 'safeguard' ),
					'param_name' => 'position',
					'value' => array(
							esc_html__( 'Top', 'safeguard' ) => '',
							esc_html__( 'Left', 'safeguard' ) => 'divider-left-top',
							esc_html__( 'Bottom', 'safeguard' ) => 'divider-left-bot',
							esc_html__( 'Right', 'safeguard' ) => 'divider-right-top',
					),
					'description' => '',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Spin Icon', 'safeguard' ),
					'param_name' => 'spin',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Dotted Decor After Icon', 'safeguard' ),
					'param_name' => 'show_decor',
					'value' => 'true',
					'description' => '',
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'value' => '',
					'description' => esc_html__( 'Icon link', 'safeguard' )
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Select Icon Color', 'safeguard' ),
					'param_name' => 'color',
					'value' => '',
					'description' => '',
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"heading" => esc_html__( "Content", 'safeguard' ),
					"param_name" => "content",
					"value" => '',
					"description" => esc_html__( "Enter information.", 'safeguard' )
				),
			)
		),
		$add_animation,
		safeguard_get_vc_icons($vc_icons_data),
		2 // icon field order
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Common_Icon_Box extends WPBakeryShortCode {

		}
	}


?>