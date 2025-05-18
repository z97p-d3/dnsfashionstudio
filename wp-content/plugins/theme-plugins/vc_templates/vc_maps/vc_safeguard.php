<?php

	$args = array( 'hide_empty' => false );
	$categories = get_terms( $args );
	$cats = $cats_woo = $cats_serv = array();
	foreach($categories as $category){
		if( is_object($category) ){
			if( $category->taxonomy == 'portfolio_category' ){
				$cats[$category->name] = $category->slug;
			} 
		}
	}

	$args = array( 'post_type' => 'portfolio');
	$portfolio = get_posts($args);
	$port = array();
	if(empty($portfolio['errors'])){
		foreach($portfolio as $port_card){
			$port[$port_card->post_title] = $port_card->ID;
		}
	}


	$icon_attributes = array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__( "Content", 'safeguard' ),
			"param_name" => "content",
			"value" => '',
			"description" => '',
		),
	);

	vc_add_params( 'vc_icon', $icon_attributes );


	
	/// safeguard_big_title
	vc_map(
		array(
			'name' => esc_html__( 'Big Title', 'safeguard' ),
			'base' => 'safeguard_big_title',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'safeguard' ),
					'description' => esc_html__( 'Title param.', 'safeguard' )
				),

 				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Color', 'safeguard' ),
					'param_name' => 'color',
					'value' => '',
					'description' => esc_html__( 'Leave empty to use theme colors.', 'safeguard' ),
				),
 
				vc_map_add_css_animation(),
				array(
					'type' => 'checkbox',
					'holder' => 'div',
					'heading' => esc_html__( 'Shuffle', 'safeguard' ),
					'param_name' => 'shuffle',
					'value' =>  'shuffle'   ,
					'description' => esc_html__( 'Enable shuffle effect.', 'safeguard' )
				)
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Big_Title extends WPBakeryShortCode {

		}
	}
	
	

	/// safeguard_icon_card
	vc_map(
		array(
			'name' => esc_html__( 'Icon Card', 'safeguard' ),
			'base' => 'safeguard_icon_card',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array_merge(
				array(
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Title', 'safeguard' ),
						'param_name' => 'title',
						'value' => esc_html__( 'I am title', 'safeguard' ),
						'description' => esc_html__( 'Add Title ', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Subtitle', 'safeguard' ),
						'param_name' => 'subtitle',
						'value' => '',
						'description' => ''
					),
				),
				safeguard_get_vc_icons($vc_icons_data),
				array(
					array(
						'type' => 'vc_link',
						'holder' => 'div',
						'heading' => esc_html__( 'Button Link', 'safeguard' ),
						'param_name' => 'link',
						'value' => '',
						'description' =>''
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Button Text', 'safeguard' ),
						'param_name' => 'btn_text',
						'value' => '',
						'description' => '',
					),
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => esc_html__( 'Content', 'safeguard' ),
						'param_name' => 'content',
						'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
						'description' => esc_html__( 'Enter your content.', 'safeguard' )
					),
				)
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Icon_Card extends WPBakeryShortCode {

		}
	}


	/// safeguard_flip_box
	vc_map(
		array(
			'name' => esc_html__( 'Flip Box', 'safeguard' ),
			'base' => 'safeguard_flip_box',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array_merge( 
				array(
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Title', 'safeguard' ),
						'param_name' => 'title',
						'value' => esc_html__( 'I am title', 'safeguard' ),
						'description' => esc_html__( 'Add Title ', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Subtitle', 'safeguard' ),
						'param_name' => 'subtitle',
						'value' => '',
						'description' => esc_html__( 'Text under title.', 'safeguard' )
					),
				),
				safeguard_get_vc_icons($vc_icons_data),	
				array(
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => esc_html__( 'Content', 'safeguard' ),
						'param_name' => 'content',
						'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
						'description' => esc_html__( 'Enter your content.', 'safeguard' )
					)	
				)
			)	
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Flip_Box extends WPBakeryShortCode {

		}
	}


	

	////////////////////////
		

		/// safeguard_video_box
	vc_map(
		array(
			'name' => esc_html__( 'Video Box', 'safeguard' ),
			'base' => 'safeguard_video',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title Left', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'safeguard' ),
					'description' => esc_html__( 'Title param.', 'safeguard' )
				),
 
 			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title Right', 'safeguard' ),
					'param_name' => 'title2',
					'value' => esc_html__( 'I am Title', 'safeguard' ),
					'description' => esc_html__( 'Title param.', 'safeguard' )
				),
 
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Youtube ID', 'safeguard' ),
					'param_name' => 'youtube',
					'value' => 'qEJ4spdiTxw',
					'description' => esc_html__( 'Enter youtube video id.', 'safeguard' )
				)
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Video extends WPBakeryShortCode {

		}
	}



	$args = array( 'post_type' => 'wpcf7_contact_form');
	$forms = get_posts($args);
	$cform7 = array('Select Form' => '');
	if(empty($forms['errors'])){
		foreach($forms as $form){
			$cform7[$form->post_title] = $form->ID;
		}
	}


	if(function_exists('kaswara_cf7_forms')) {
		$cf_array = array(
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'heading' => esc_html__( 'Contact Form 7', 'safeguard' ),
				'param_name' => 'cf',
				'value' => $cform7,
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Select CF7 Style', 'safeguard'),
				'param_name' => 'cf7_style',
				'value' => kaswara_cf7_styles()
			),
		);
	} else {
		$cf_array = array(
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'heading' => esc_html__( 'Contact Form 7', 'safeguard' ),
				'param_name' => 'cf',
				'value' => $cform7,
			),
		);
	}
	/// safeguard_contact
	vc_map(
		array(
			'name' => esc_html__( 'Contact', 'safeguard' ),
			'base' => 'safeguard_contact',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array_merge( $cf_array,
				array(
					array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Marker Image', 'safeguard' ),
						'param_name' => 'image',
						'value' => '',
						'description' => esc_html__( 'Select image from media library.', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'LAT', 'safeguard' ),
						'param_name' => 'lat',
						'value' => '40.6700',
						'description' => esc_html__( 'Latitude', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'LNG', 'safeguard' ),
						'param_name' => 'lng',
						'value' => '-73.9400',
						'description' => esc_html__( 'Longtitude', 'safeguard' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"heading" => esc_html__( "Map Width", 'safeguard' ),
						"param_name" => "width",
						"value" => '',
						"description" => esc_html__( "Default 100%", 'safeguard' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"heading" => esc_html__( "Map Height", 'safeguard' ),
						"param_name" => "height",
						"value" => '',
						"description" => esc_html__( "Default 100%", 'safeguard' )
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"heading" => esc_html__( "Zoom", 'safeguard' ),
						"param_name" => "zoom",
						"value" => '',
						"description" => esc_html__( "Zoom 0-20. Default 8.", 'safeguard' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Scroll Wheel", 'safeguard' ),
						"param_name" => "scrollwheel",
						'value' => array(
							esc_html__( "Off", 'safeguard' ) => 'false',
							esc_html__( "On", 'safeguard' ) => 'true',
						),
						"description" => esc_html__( "Zoom map with scroll", 'safeguard' )
					),
				)
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Contact extends WPBakeryShortCode {

		}
	}	

	/// safeguard_services3
	vc_map(
		array(
			'name' => esc_html__( 'Threebox ', 'safeguard' ),
			'base' => 'safeguard_service3',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 1', 'safeguard' ),
					'param_name' => 'title1',
					'value' => esc_html__( 'Title1', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 
 			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 1', 'safeguard' ),
					'param_name' => 'icon1',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 1', 'safeguard' ),
					'param_name' => 'text1',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),
			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 2', 'safeguard' ),
					'param_name' => 'title2',
					'value' => esc_html__( 'Title1', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 
 			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 2', 'safeguard' ),
					'param_name' => 'icon2',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 2', 'safeguard' ),
					'param_name' => 'text2',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),
			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 3', 'safeguard' ),
					'param_name' => 'title3',
					'value' => esc_html__( 'Title3', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'value' => '',
					'description' => esc_html__( 'Link', 'safeguard' )
				),
 			array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 3', 'safeguard' ),
					'param_name' => 'icon3',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 3', 'safeguard' ),
					'param_name' => 'text3',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),				 			 
				vc_map_add_css_animation(),
		 
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Service3 extends WPBakeryShortCode {

		}
	}	
	
	/// safeguard_departaments
	vc_map(
		array(
			'name' => esc_html__( 'Departments Slider', 'safeguard' ),
			'base' => 'safeguard_departaments',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
			 	array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Ids', 'safeguard' ),
					'param_name' => 'ids',
					'value' => '',
					'description' => esc_html__( 'Separate by comma.', 'safeguard' )
				),		 			 
				vc_map_add_css_animation(),
		 
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Departaments extends WPBakeryShortCode {

		}
	}	


	/// safeguard_departaments
	vc_map(
		array(
			'name' => esc_html__( 'Threesteps', 'safeguard' ),
			'base' => 'safeguard_steps',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 1', 'safeguard' ),
					'param_name' => 'title1',
					'value' => esc_html__( 'Title1', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 
 				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 1', 'safeguard' ),
					'param_name' => 'icon1',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 	array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 1', 'safeguard' ),
					'param_name' => 'text1',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 2', 'safeguard' ),
					'param_name' => 'title2',
					'value' => esc_html__( 'Title1', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 
 				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 2', 'safeguard' ),
					'param_name' => 'icon2',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 	array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 2', 'safeguard' ),
					'param_name' => 'text2',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title 3', 'safeguard' ),
					'param_name' => 'title3',
					'value' => esc_html__( 'Title3', 'safeguard' ),
					'description' => esc_html__( 'Title', 'safeguard' )
				),
 
 				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon 3', 'safeguard' ),
					'param_name' => 'icon3',
					'value' => '',
					'description' => esc_html__( 'Icon', 'safeguard' )
				),
			 	array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text 3', 'safeguard' ),
					'param_name' => 'text3',
					'value' => '',
					'description' => esc_html__( 'Text', 'safeguard' )
				),				 			 
				//vc_map_add_css_animation(),
		 
			)
		)
	);

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Steps extends WPBakeryShortCode {

		}
	}		
		
	






	/// box_teammember
	vc_map( array(
		"name" => esc_html__( "Team Member Box", 'safeguard' ),
		"base" => "safeguard_teammember_box",
		"class" => "pix-safeguard-icon",
		"category" => esc_html__( "Theme Widgets", 'safeguard'),
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
				'description' => esc_html__( 'https://plus.google.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'safeguard' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post(__( 'Add icon fa-google-plus <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'safeguard' ),
				'param_name' => 'scn4',
				'description' => esc_html__( '//www.w3.org/TR/html5/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'safeguard' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post(__( 'Add icon fa-html5 <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 5', 'safeguard' ),
				'param_name' => 'scn5',
				'description' => esc_html__( 'https://github.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 5', 'safeguard' ),
				'param_name' => 'scn_icon5',
				'description' => wp_kses_post(__( 'Add icon fa-github <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 6', 'safeguard' ),
				'param_name' => 'scn6',
				'description' => esc_html__( 'https://github.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 6', 'safeguard' ),
				'param_name' => 'scn_icon6',
				'description' => esc_html__( 'Add icon fa-github <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )
			),
			vc_map_add_css_animation(),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Info", 'safeguard' ),
				"param_name" => "content",
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter information.", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Teammember_Box extends WPBakeryShortCode {
		}
	}
	////////////////////////


	/// safeguard_imagescarousel
	vc_map(
		array(
			"name" => esc_html__( "Images Carousel", 'safeguard' ),
			"base" => "safeguard_imagescarousel",
			"class" => "pix-safeguard-icon",
			"category" => esc_html__( "Theme Widgets", 'safeguard'),
			"params" => array(
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Images', 'safeguard' ),
					'param_name' => 'images',
					'value' => '',
					'description' => esc_html__( 'Select images from media library.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'safeguard' ),
					'param_name' => 'img_size',
					'value' => 'thumbnail',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'safeguard' ),
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Desktop Items Count', 'safeguard' ),
                    'param_name' => 'itemscount',
                    'value' => '4',
                    'description' => esc_html__( 'Enter desktop items count', 'safeguard' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Mobile Items Count', 'safeguard' ),
                    'param_name' => 'ritemcount',
                    'value' => '2',
                    'description' => esc_html__( 'Enter mobile items count', 'safeguard' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Enable pagination', 'safeguard' ),
                    'param_name' => 'pagination',
                    'value' => array(
                        esc_html__( "Yes", 'safeguard' ) => 'true',
                        esc_html__( "No", 'safeguard' ) => 'false',
                    ),
                    'description' => esc_html__( 'Enable or disable pagination', 'safeguard' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Enable navigation', 'safeguard' ),
                    'param_name' => 'navigation',
                    'value' => array(
                        esc_html__( "Yes", 'safeguard' ) => 'true',
                        esc_html__( "No", 'safeguard' ) => 'false',
                    ),
                    'description' => esc_html__( 'Enable or disable pagination', 'safeguard' ),
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Auto Play', 'safeguard' ),
					'param_name' => 'autoplay',
					'value' => '4000',
					'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'safeguard' ),
				),

				vc_map_add_css_animation(),
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Imagescarousel extends WPBakeryShortCode {

		}
	}

	/// section_laptop
	vc_map(
		array(
			"name" => esc_html__( "Laptop Images Carousel", 'safeguard' ),
			"base" => "safeguard_laptop",
			"class" => "pix-safeguard-icon",
			"category" => esc_html__( "Theme Widgets", 'safeguard'),
			"params" => array(
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Images', 'safeguard' ),
					'param_name' => 'images',
					'value' => '',
					'description' => esc_html__( 'Select images from media library.', 'safeguard' )
				),
				 
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'More Works Link', 'safeguard' ),
					'param_name' => 'link',
					'value' => '4000',
					'description' => esc_html__( 'Enter link for more works page', 'safeguard' ),
				),
				vc_map_add_css_animation(),
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Laptop extends WPBakeryShortCode {
			
		}
	}



	/// safeguard_tabs_vertical
	vc_map( array(
		'name' => esc_html__( 'Vertical Content Tabs ', 'safeguard' ),
		'base' => 'safeguard_tabs_vertical',
		'class' => 'pix-safeguard-icon',
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Tab Values', 'safeguard' ),
				'param_name' => 'tabs',
				'params' => array_merge(
					array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'safeguard' ),
							'param_name' => 'title',
							'description' => esc_html__( 'Tab title.', 'safeguard' )
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__( 'Image', 'safeguard' ),
							'param_name' => 'image',
							'value' => '',
							'description' => esc_html__( 'Select image from media library.', 'safeguard' )
						),
					),
					safeguard_get_vc_icons($vc_icons_data),
					array(
						array(
							'type' => 'textarea',
							'holder' => 'div',
							'heading' => esc_html__( 'Content', 'safeguard' ),
							'param_name' => 'content',
							'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
							'description' => esc_html__( 'Enter your content.', 'safeguard' )
						),
					)
				),
			),
		),
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Tabs_Vertical extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////


	/// safeguard_anchor
	vc_map( array(
		'name' => esc_html__( 'Anchor Link', 'safeguard' ),
		'base' => 'safeguard_anchor',
		'class' => 'pix-safeguard-icon',
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array_merge(
			array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Tab title.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Anchor', 'safeguard' ),
					'param_name' => 'anchor',
					'value' => '',
					'description' => esc_html__( 'Anchor for section', 'safeguard' )
				),
			),
			safeguard_get_vc_icons($vc_icons_data)
		),
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Anchor extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////

    //////// Content  Container /////////
    vc_map(
        array(
            "name" => esc_html__( "Content  Container", 'safeguard' ),
            "base" => "safeguard_content_container",
            "class" => "pix-safeguard-icon",
            "category" => esc_html__( "Theme Widgets", 'safeguard'),
            "content_element" => true,
            "show_settings_on_create" => true,
            'as_parent' => array('except' => 'safeguard_content_container'),
            "js_view" => 'VcColumnView',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => "Style",
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( "Default", 'safeguard' ) => 'default',
                        esc_html__( "Shadow", 'safeguard' ) => 'shadow',
                    ),
                    'description' => esc_html__( "Style of content", 'safeguard' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => "Container position",
                    'param_name' => 'position',
                    'value' => array(
                        esc_html__( "Left", 'safeguard' ) => 'left',
                        esc_html__( "Right", 'safeguard' ) => 'right',
                        esc_html__( "Center", 'safeguard' ) => 'center'
                    ),
                    'description' => esc_html__( "Style of content", 'safeguard' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => "Container Width",
                    'param_name' => 'cwidth',
                    'value' => '100%',
                    'description' => esc_html__( "Enter container width eg. ( 100px or  70% )", 'safeguard' ),
                ),
				array(
                    'type' => 'textfield',
                    'heading' => "Box Width",
                    'param_name' => 'width',
                    'value' => '100%',
                    'description' => esc_html__( "Enter box width eg. ( 100px or  70% )", 'safeguard' ),
                ),
				array(
                    'type' => 'textfield',
                    'heading' => "Box height",
                    'param_name' => 'height',
                    'value' => '100%',
                    'description' => esc_html__( "Enter box height eg. ( 100px or  70% )", 'safeguard' ),
                ),
				array(
                    'type' => 'textfield',
                    'heading' => "Extra class name",
                    'param_name' => 'class_name',
                    'value' => '',
                    'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'safeguard' ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'CSS box', 'safeguard' ),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'safeguard' ),
                )
            )
        )
    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_safeguard_Content_Container extends WPBakeryShortCodesContainer {
        }
    }
    /////////////////////////////////

	//////// Carousel Reviews ////////
	vc_map( array(
		'name' => esc_html__( 'Reviews', 'safeguard' ),
		'base' => 'safeguard_reviews',
		'class' => 'pix-safeguard-icon pix-theme-icon_info',
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Display Type', 'safeguard' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Double', 'safeguard') => 'double',
					esc_html__('Single', 'safeguard') => 'single',
				),
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
				'description' => esc_html__( 'On/off carousel', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => 'double',
				),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Reviews', 'safeguard' ),
				'param_name' => 'reviews_d',
				'params' => array(
					array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Image', 'safeguard' ),
						'param_name' => 'image_d',
						'description' => esc_html__( 'Select image.', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Name', 'safeguard' ),
						'param_name' => 'name_d',
						'description' => esc_html__( 'Person name.', 'safeguard' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Position', 'safeguard' ),
						'param_name' => 'position',
						'description' => esc_html__( 'Text under the name.', 'safeguard' ),
					),
					array(
						'type' => 'vc_link',
						'heading' => esc_html__( 'Link', 'safeguard' ),
						'param_name' => 'link',
						'description' => esc_html__( 'Author link', 'safeguard' )
					),
					array(
						"type" => "textarea",
						"holder" => "div",
						"heading" => esc_html__( "Review Text", 'safeguard' ),
						"param_name" => "content_d",
						"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
						"description" => esc_html__( "Enter text.", 'safeguard' )
					),
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'double',
				),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Reviews', 'safeguard' ),
				'param_name' => 'reviews_s',
				'params' => array(
					array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Image', 'safeguard' ),
						'param_name' => 'image_s',
						'description' => esc_html__( 'Select image.', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Name', 'safeguard' ),
						'param_name' => 'name_s',
						'description' => esc_html__( 'Person name.', 'safeguard' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'safeguard' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Review title', 'safeguard' ),
					),
					array(
						"type" => "dropdown",
						"holder" => "div",
						"heading" => esc_html__( "Rating", 'safeguard' ),
						"param_name" => "rating",
						'value' => array('5', '4', '3', '2', '1', ''),
						"description" => '',
					),
					array(
						"type" => "textarea",
						"holder" => "div",
						"heading" => esc_html__( "Review Text", 'safeguard' ),
						"param_name" => "content_s",
						"value" => esc_html__( "I am test text block. Click edit button to change this text.", 'safeguard' ),
						"description" => esc_html__( "Enter text.", 'safeguard' )
					),
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'single',
				),
			)
		),


	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Reviews extends WPBakeryShortCode {
		}
	}


		
	// safeguard_amount_box
	$params1 = array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Completed projects', 'safeguard' ),
					'description' => esc_html__( 'Title.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Amount', 'safeguard' ),
					'param_name' => 'amount',
					'value' => esc_html__( '25', 'safeguard' ),
					'description' => esc_html__( 'Amount.', 'safeguard' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text', 'safeguard' ),
					'param_name' => 'text',
					'value' => esc_html__( 'Pellentesque eget quam vel velit mollis	tempus a nec mauris.', 'safeguard' ),
					'description' => esc_html__( 'Text.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Icon', 'safeguard' ),
					'param_name' => 'icon',
					'value' => esc_html__( 'arrow_move', 'safeguard' ),
					'description' => esc_html__( 'Icon.', 'safeguard' )
				),
			);
		$params2 = array(
				vc_map_add_css_animation(),
			);
	 
		$params = array_merge($params1, $params2);
	 
	vc_map(
		array(
			'name' => esc_html__( 'Amount Box', 'safeguard' ),
			'base' => 'safeguard_amount_box',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => $params,
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Amount_Box extends WPBakeryShortCode {

		}
	}

	// safeguard_amount_single
	$params1 = array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Completed projects', 'safeguard' ),
					'description' => esc_html__( 'Title.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Amount', 'safeguard' ),
					'param_name' => 'amount',
					'value' => esc_html__( '25', 'safeguard' ),
					'description' => esc_html__( 'Amount.', 'safeguard' )
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Text', 'safeguard' ),
					'param_name' => 'text',
					'value' => esc_html__( '', 'safeguard' ),
					'description' => esc_html__( 'Text.', 'safeguard' )
				),
			);
		
	 
		$params = array_merge($params1);
	 
	vc_map(
		array(
			'name' => esc_html__( 'Amount Single', 'safeguard' ),
			'base' => 'safeguard_amount_single',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => $params,
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Amount_Single extends WPBakeryShortCode {

		}
	} 




	/////////////////////////////////

	//////// Carousel Reviews ////////
	vc_map( array(
		'name' => esc_html__( 'Smart Tabs', 'safeguard' ),
		'base' => 'safeguard_tab_links',
		'class' => 'pix-safeguard-icon',
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'heading' => esc_html__( 'Links or Content', 'safeguard' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Links', 'safeguard') => 'links',
					esc_html__('Content', 'safeguard') => 'contents',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Can be empty.', 'safeguard' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'heading' => esc_html__( 'ID', 'safeguard' ),
				'param_name' => 'tab_id',
				'description' => esc_html__( 'Necessary for container item.', 'safeguard' ),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Links', 'safeguard' ),
				'param_name' => 'tab_links',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Tab Title', 'safeguard' ),
						'param_name' => 'tab_title',
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Active on Load', 'safeguard' ),
						'param_name' => 'active',
						'value' => array(
							esc_html__('No', 'safeguard') => '',
							esc_html__('Yes', 'safeguard') => 'active',
						),
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Content ID', 'safeguard' ),
						'param_name' => 'content_id',
						'description' => esc_html__( 'Link to Content ID', 'safeguard' )
					),
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'links'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Active on Load', 'safeguard' ),
				'param_name' => 'active_content',
				'value' => array(
					esc_html__('No', 'safeguard') => '',
					esc_html__('Yes', 'safeguard') => 'active',
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'contents'
				)
			),
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Content', 'safeguard' ),
				'param_name' => 'content',
				'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
				'description' => esc_html__( 'Enter text.', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => 'contents'
				)
			),
		)

	) );
	vc_map( array(
		'name' => esc_html__( 'Smart Tabs Content', 'safeguard' ),
		'base' => 'safeguard_tab_content',
		'class' => 'pix-safeguard-icon',
		'as_parent' => array('only' => 'safeguard_tab_links'),
		'content_element' => true,
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'content_title',
			),
		),
		'js_view' => 'VcColumnView',
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_safeguard_Tab_Content extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Tab_Links extends WPBakeryShortCode {
		}
	}
	///////////////////////////////
	

	//////// Carousel History ////////
	vc_map( array(
		'name' => esc_html__( 'History', 'safeguard' ),
		'base' => 'safeguard_history',
		'class' => 'pix-safeguard-icon',
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Type', 'safeguard' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Horizontal', 'safeguard') => 'horizontal',
					esc_html__('Vertical', 'safeguard') => 'vertical',
				),
				'description' => ''
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'History blocks per page', 'safeguard' ),
				'param_name' => 'count',
				'value' => '3',
				'description' => esc_html__( 'If empty, display all blocks', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => 'vertical'
				)
			),
		 	array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Moments', 'safeguard' ),
				'param_name' => 'moments_h',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'safeguard' ),
						'param_name' => 'title_h',
						'description' => esc_html__( 'Review title', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Date', 'safeguard' ),
						'param_name' => 'd_h',
						'value' =>   '25 MAY, 2017',
						'description' => ''
					),
					array(
						'type' => 'textarea',
						'holder' => 'div',
						'heading' => esc_html__( 'Text', 'safeguard' ),
						'param_name' => 'content_h',
						'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
						'description' => esc_html__( 'Enter text', 'safeguard' )
					),
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'horizontal'
				)
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Moments', 'safeguard' ),
				'param_name' => 'moments_v',
				'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Position On Timeline', 'safeguard' ),
						'param_name' => 'position',
						'value' => array(
							esc_html__('Left', 'safeguard') => 'left',
							esc_html__('Right', 'safeguard') => 'right',
						),
						'description' => esc_html__( 'Left/right position on timeline', 'safeguard' ),
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Image', 'safeguard' ),
						'param_name' => 'image',
						'description' => esc_html__( 'Select image.', 'safeguard' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'safeguard' ),
						'param_name' => 'title_v',
						'description' => esc_html__( 'Review title', 'safeguard' )
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'heading' => esc_html__( 'Date', 'safeguard' ),
						'param_name' => 'd_v',
						'value' =>   '25 MAY, 2017',
						'description' => ''
					),
					array(
						'type' => 'textarea',
						'holder' => 'div',
						'heading' => esc_html__( 'Text', 'safeguard' ),
						'param_name' => 'content_v',
						'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
						'description' => esc_html__( 'Enter text', 'safeguard' )
					),
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'vertical'
				)
			),
		),
	) );
	vc_map( array(
		'name' => esc_html__( 'Date', 'safeguard' ),
		'base' => 'safeguard_date',
		'class' => 'pix-safeguard-icon',
		'as_child' => array('only' => 'safeguard_dates'),
		'content_element' => true,
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
 
 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Review title', 'safeguard' )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"heading" => esc_html__( "Text", 'safeguard' ),
				"param_name" => "content",
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter text.", 'safeguard' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"heading" => esc_html__( "Date", 'safeguard' ),
				"param_name" => "d",
				"value" =>   '25 MAY, 2017',
				"description" => esc_html__( "date", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_History extends WPBakeryShortCode {
		}
	}
	/////////////////////////////////	
	



	vc_map( array(
		'name' => esc_html__( 'My Services', 'safeguard' ),
		'base' => 'safeguard_service',
		'class' => 'pix-safeguard-icon',
		'as_child' => array('only' => 'safeguard_services'),
		'content_element' => true,
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
 
 
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title text', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Text title', 'safeguard' )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Text", 'safeguard' ),
				"param_name" => "content",
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter text.", 'safeguard' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Button Text", 'safeguard' ),
				"param_name" => "btn",
				"value" => wp_kses_post(__( "Learn More", 'safeguard' )),
				"description" => esc_html__( "Enter text.", 'safeguard' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Button Link", 'safeguard' ),
				"param_name" => "link",
				"value" => wp_kses_post(__( "#", 'safeguard' )),
				"description" => esc_html__( "Enter text.", 'safeguard' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Service title", 'safeguard' ),
				"param_name" => "service_title",
				"value" =>   'title',
				"description" => esc_html__( "Service title", 'safeguard' )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Service icon", 'safeguard' ),
				"param_name" => "icon",
				"value" =>   'title',
				"description" => esc_html__( "Service icon", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_safeguard_Services extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Service extends WPBakeryShortCode {
		}
	}
	/////////////////////////////////		
	
	
	
	/// safeguard_team
	//////// Our Team ////////
	vc_map( array(
		'name' => esc_html__( 'Team Members', 'safeguard' ),
		'base' => 'safeguard_team',
		'class' => 'pix-safeguard-icon',
		'as_parent' => array('only' => 'safeguard_team_member'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
		 	array(
				'type' => 'dropdown',
				'heading' => "Type",
				'param_name' => 'type',
				'value' => array(
					esc_html__( "Type 1", 'safeguard' ) => '',
					esc_html__( "Type 2", 'safeguard' ) => '-mod',	 
				),
				'description' => esc_html__( "Type of box", 'safeguard' ),
	 
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Title of box', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => '-mod',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Text', 'safeguard' ),
				'param_name' => 'text',
				'description' => esc_html__( 'Text.', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => '-mod',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button text', 'safeguard' ),
				'param_name' => 'button',
				'description' => esc_html__( 'Button text.', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => '-mod',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Link', 'safeguard' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Button Link.', 'safeguard' ),
				'dependency' => array(
					'element' => 'type',
					'value' => '-mod',
				),
			),
			vc_map_add_css_animation(),
		),
		'js_view' => 'VcColumnView',

	) );
	vc_map( array(
		'name' => esc_html__( 'Team Member', 'safeguard' ),
		'base' => 'safeguard_team_member',
		'class' => 'pix-safeguard-icon',
		'as_child' => array('only' => 'safeguard_team'),
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
				'description' => wp_kses_post(__( 'Add icon social_facebook_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
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
				'description' => wp_kses_post(__( 'Add icon social_twitter_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'safeguard' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://www.pinterest.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'safeguard' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post(__( 'Add icon social_pinterest_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'safeguard' ),
				'param_name' => 'scn4',
				'description' => esc_html__( 'https://plus.google.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'safeguard' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post(__( 'Add icon social_googleplus_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			vc_map_add_css_animation(),
		 
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_safeguard_Team extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Team_Member extends WPBakeryShortCode {
		}
	}
	////////////////////////



	vc_map( array(
		'name' => esc_html__( 'Item Options', 'safeguard' ),
		'base' => 'safeguard_item_options',
		'class' => 'pix-safeguard-icon',
		'category' => esc_html__( 'Theme Widgets', 'safeguard'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Item Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__( 'Options', 'safeguard' ),
				'param_name' => 'options',
				'params' => array_merge(
					array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'safeguard' ),
							'param_name' => 'title',
							'description' => ''
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html__( 'Image', 'safeguard' ),
							'param_name' => 'image_inner',
							'description' => esc_html__( 'Select image. (Size 476x850 px)', 'safeguard' )
						),
					),
					safeguard_get_vc_icons($vc_icons_data),
					array(
						array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content', 'safeguard' ),
							'param_name' => 'content',
							'description' => ''
						),
					)
				),
			),
		),

	) );

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Item_Options extends WPBakeryShortCode {
		}
	}
	////////////////////////
	
	
 
	vc_map( array(
		'name' => esc_html__( 'Quote', 'safeguard' ),
		'base' => 'safeguard_quote',
		'class' => 'pix-safeguard-icon',
 		"category" => esc_html__( "Theme Widgets", 'safeguard'),
		'params' => array(
		 	array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Quote title.', 'safeguard' )
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Text', 'safeguard' ),
				'param_name' => 'text',
				'description' => esc_html__( 'Quote text.', 'safeguard' )
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Signature', 'safeguard' ),
				'param_name' => 'signature',
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
		 
			 
			vc_map_add_css_animation(),
		 
		)
	) );
 
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Quote extends WPBakeryShortCode {
		}
	}
	////////////////////////



///////////////////////////////////// Theme Post Types Widgets /////////////////////////////////////

	/// safeguard_posts_block
	vc_map(
		array(
			"name" => esc_html__( "News Block", 'safeguard' ),
			"base" => "safeguard_posts_block",
			"class" => "pix-safeguard-icon",
			"category" => esc_html__( "Theme Widgets", 'safeguard'),
			"params" => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Posts Count', 'safeguard' ),
					'param_name' => 'count',
					'description' => esc_html__( 'If empty, display all posts.', 'safeguard' )
				),
			)
		)
	);
	
	//////////////////////////////////////////////////////////////////////
	
	
	/// safeguard_brand
	vc_map(
		array(
			'name' => esc_html__( 'Brand Box', 'safeguard' ),
			'base' => 'safeguard_brand',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'safeguard' ),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'safeguard' )
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => esc_html__( 'Url', 'safeguard' ),
					'param_name' => 'url',
					'value' => '',
					'description' => '',
				),
				vc_map_add_css_animation(),
			)
		)
	);
	
	
	////////////////////////	
	
	
	/***   Widget Order   ***/
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Brand extends WPBakeryShortCode {
		}
	}
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Posts_Block extends WPBakeryShortCode {
		}
	}
	
	/// safeguard_imagebox
	vc_map(
		array(
			'name' => esc_html__( 'Image box', 'safeguard' ),
			'base' => 'safeguard_imagebox',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'safeguard' ),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'safeguard' )
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => esc_html__( 'Url', 'safeguard' ),
					'param_name' => 'url',
					'value' => '',
					'description' => '',
				),
				array(
                    'type' => 'textfield',
                    'heading' => "Title",
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__( "Title param.", 'safeguard' ),
                ),
							
					array(
						'type' => 'textarea_html',
						'holder' => 'div',
						'heading' => esc_html__( 'Content', 'safeguard' ),
						'param_name' => 'content',
						'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
						'description' => esc_html__( 'Enter your content.', 'safeguard' )
					)	,
					   
				  array(
                    'type' => 'dropdown',
                    'heading' => "Style",
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( "Box-Padding", 'safeguard' ) => 'padding',
                        esc_html__( "Box-Shadow", 'safeguard' ) => 'shadow',
                    ),
                    'description' => esc_html__( "Style of Image Box", 'safeguard' ),
                ),
				  array(
                    'type' => 'textfield',
                    'heading' => "Extra class name",
                    'param_name' => 'class_name',
                    'value' => '',
                    'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'safeguard' ),
                ),
			

			)
		)
	);
	
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Imagebox extends WPBakeryShortCode {
		}
	}


	$args = array( 'post_type' => '');
	$posts_custom = get_posts($args);
	$post_customs_array = array();
	if(empty($posts_custom['errors'])){
		foreach($posts_custom as $port_card){
			$post_customs_array[$port_card->post_title] = $port_card->ID;
		}
	}


	/// safeguard_customposts
	vc_map(
		array(
			'name' => esc_html__( 'Сustom Post', 'safeguard' ),
			'base' => 'safeguard_customposts',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
					array(
                    'type' => 'dropdown',
                    'heading' => "Post",
                    'param_name' => 'posts',
                    'value' => $post_customs_array,
                    'description' => esc_html__( "Select post to display", 'safeguard' ),
                ),


				  array(
                    'type' => 'dropdown',
                    'heading' => "Style",
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( "Box-Padding", 'safeguard' ) => 'padding',
                        esc_html__( "Box-simple", 'safeguard' ) => 'shadow',
                    ),
                    'description' => esc_html__( "Style of Сustom Post", 'safeguard' ),
                ),
				  array(
                    'type' => 'textfield',
                    'heading' => "Extra class name",
                    'param_name' => 'class_name',
                    'value' => '',
                    'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'safeguard' ),
                ),
			

			)
		)
	);
	
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Customposts extends WPBakeryShortCode {
		}
	}

		$args = array( 'post_type' => 'product', 'numberposts' => '-1');
	$products_custom = get_posts($args);
	$product_customs_array = array();
	if(empty($products_custom['errors'])){
		foreach($products_custom as $port_card){
			$product_customs_array[$port_card->post_title] = $port_card->ID;
		}
	}
/// safeguard_customproduct
	vc_map(
		array(
			'name' => esc_html__( 'Сustom Product', 'safeguard' ),
			'base' => 'safeguard_customproduct',
			'class' => 'pix-safeguard-icon',
			'category' => esc_html__( 'Theme Widgets', 'safeguard'),
			'params' => array(
					array(
                    'type' => 'dropdown',
                    'heading' => "Product",
                    'param_name' => 'product',
                    'value' => $product_customs_array,
                    'description' => esc_html__( "Select product to display", 'safeguard' ),
                ),
					array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Enable "Add to cart" button', 'safeguard' ),
                    'param_name' => 'button',
                    'value' => array(
                        esc_html__( "Yes", 'safeguard' ) => 'true',
                        esc_html__( "No", 'safeguard' ) => 'false',
                    ),
                    'description' => esc_html__( 'Enable or disable "Add to cart" button', 'safeguard' ),
                ),

				  array(
                    'type' => 'dropdown',
                    'heading' => "Style",
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__( "Box-Padding", 'safeguard' ) => 'padding',
                        esc_html__( "Box-Shadow", 'safeguard' ) => 'shadow',
                    ),
                    'description' => esc_html__( "Style of Сustom Post", 'safeguard' ),
                ),
				  array(
                    'type' => 'textfield',
                    'heading' => "Extra class name",
                    'param_name' => 'class_name',
                    'value' => '',
                    'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'safeguard' ),
                ),
			

			)
		)
	);
	
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_safeguard_Customproduct extends WPBakeryShortCode {
		}
	}
	
?>