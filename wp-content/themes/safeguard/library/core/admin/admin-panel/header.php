<?php

	function safeguard_header_type_callback( $control ) {
	    if ( $control->manager->get_setting('safeguard_header_type')->value() == 'header3' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_type12_callback( $control ) {
	    if ( $control->manager->get_setting('safeguard_header_type')->value() != 'header3' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_type4_callback( $control ) {
	    if ( $control->manager->get_setting('safeguard_header_type')->value() == 'header4' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_background_callback( $control ) {
	    if (  in_array($control->manager->get_setting('safeguard_header_background')->value(), array('trans-white', 'trans-black')) ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_menu_callback( $control ) {
	    if (  $control->manager->get_setting('safeguard_header_menu')->value() != 0 ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_decore_callback ( $control ) {
		if ( $control->manager->get_setting('safeguard_header_type')->value() == 'header4' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_header_type5_callback( $control ) {
	    if ( $control->manager->get_setting('safeguard_header_type')->value() == 'header5' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function safeguard_customize_header_tab($wp_customize, $theme_name){

		$header_elements = array(
			'logo'  => esc_html__( 'Logo', 'safeguard' ),
			'menu' => esc_html__( 'Menu', 'safeguard' ),
			'hamburger' => esc_html__( 'Hamburger Menu', 'safeguard' ),
			'logo_menu' => esc_html__( 'Menu With Centered Logo', 'safeguard' ),
			'search'  => esc_html__( 'Search', 'safeguard' ),
			'cart'  => esc_html__( 'Cart', 'safeguard' ),
			'socials' => esc_html__( 'Socials', 'safeguard' ),
			'phone'  => esc_html__( 'Phone', 'safeguard' ),
			'email' => esc_html__( 'E-mail', 'safeguard' ),
			'text' => esc_html__( 'Custom Text', 'safeguard' ),
		);

		$header_elements_position = array(
			'1'  => esc_html__( 'On', 'safeguard' ),
			'0'  => esc_html__( 'Off', 'safeguard' ),
			'level_1_left'  => esc_html__( 'Level 1 Left', 'safeguard' ),
			'level_1_right' => esc_html__( 'Level 1 Right', 'safeguard' ),
			'level_1_center' => esc_html__( 'Level 1 Center', 'safeguard' ),
			'level_2_left'  => esc_html__( 'Level 2 Left', 'safeguard' ),
			'level_2_right'  => esc_html__( 'Level 2 Right', 'safeguard' ),
			'level_2_center' => esc_html__( 'Level 2 Center', 'safeguard' ),
			'top_bar_left'  => esc_html__( 'Top Bar Left', 'safeguard' ),
			'top_bar_right' => esc_html__( 'Top Bar Right', 'safeguard' ),
			'top_bar_center' => esc_html__( 'Top Bar Center', 'safeguard' ),
		);

		$wp_customize->add_panel('safeguard_header_panel',  array(
            'title' => 'Header',
            'priority' => 30,
            )
        );


		$wp_customize->add_section( 'safeguard_header_settings' , array(
		    'title'      => esc_html__( 'General Settings', 'safeguard' ),
		    'priority'   => 5,
			'panel' => 'safeguard_header_panel'
		) );

		$wp_customize->add_setting( 'safeguard_header_type' , array(
				'default'     => 'header1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_type',
            array(
                'label'    => esc_html__( 'Type', 'safeguard' ),
                'section'  => 'safeguard_header_settings',
                'settings' => 'safeguard_header_type',
                'type'     => 'select',
                'choices'  => array(
                    'header1'  => esc_html__( 'Classic', 'safeguard' ),
                    'header5' => esc_html__( 'Advanced', 'safeguard' ),
                ),
                'priority'   => 10
            )
        );

        /* MIDDLE TYPE */
        $wp_customize->add_setting( 'safeguard_header_type4_lmenu' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$args = array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => true,
		);
		$menus = get_terms( $args );
		$menus_arr = array();
		$menus_arr[''] = esc_html__( 'Select Menu', 'safeguard' );
		foreach ($menus as $key => $value) {
			if(is_object($value)) {
				$menus_arr[$value->term_id] = $value->name;
			}
		}
		$wp_customize->add_control( 'safeguard_header_type4_lmenu', array(
			'label'    => esc_html__( 'Left Menu', 'safeguard' ),
			'section'         => 'safeguard_header_settings',
			'settings' => 'safeguard_header_type4_lmenu',
			'type'          => 'select',
            'choices'       => $menus_arr,
            'active_callback' => 'safeguard_header_type4_callback',
			'priority'   => 11,
		));
		$wp_customize->add_setting( 'safeguard_header_type4_rmenu' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type4_rmenu', array(
			'label'    => esc_html__( 'Right Menu', 'safeguard' ),
			'section'         => 'safeguard_header_settings',
			'settings' => 'safeguard_header_type4_rmenu',
			'type'          => 'select',
            'choices'       => $menus_arr,
            'active_callback' => 'safeguard_header_type4_callback',
			'priority'   => 11
		));

		/* CREATE TINYMCE FIELD */
		class Text_Editor_Custom_Control extends WP_Customize_Control
		{
		    public $type = 'textarea';
		    public function render_content() {
		    	echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
		        $settings = array(
		            'media_buttons' => false,
		            'quicktags' => true,
		            'textarea_rows' => 5
		        );
		        $this->filter_editor_setting_link();
		        wp_editor($this->value(), $this->id, $settings );
		        do_action('admin_footer');
		        do_action('admin_print_footer_scripts');
		    }
		    private function filter_editor_setting_link() {
		        add_filter( 'the_editor', function( $output ) { 
		        	return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); 
		        } );
		    }
		}
		function editor_customizer_script() {
		    wp_enqueue_script( 'wp-editor-customizer', get_template_directory_uri() . '/library/core/admin/js/customizer.js', array( 'jquery' ), rand(), true );
		}
		add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' );

		/* ADVANCED TYPE */
		/* BLOCK 1 */
		$wp_customize->add_setting( 'safeguard_header_type5_block1_icon' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type5_block1_icon',
            array(
                'label'         => esc_html__( 'Block #1 Icon Class', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_type5_block1_icon',
                'type'          => 'text',
                'priority'   => 12,
                'active_callback' => 'safeguard_header_type5_callback',
            )
        );
		$wp_customize->add_setting( 'safeguard_header_type5_block1_content' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize -> add_control(
		    new Text_Editor_Custom_Control(
		        $wp_customize,
		        'safeguard_header_type5_block1_content',
		        array(
		            'label'         => esc_html__( 'Block #1 Content', 'safeguard' ),
	                'section'       => 'safeguard_header_settings',
	                'settings'      => 'safeguard_header_type5_block1_content',
	                'priority'   => 12,
	                'active_callback' => 'safeguard_header_type5_callback',
		        )
		    )
		);
        /* BLOCK 2 */
        $wp_customize->add_setting( 'safeguard_header_type5_block2_icon' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type5_block2_icon',
            array(
                'label'         => esc_html__( 'Block #2 Icon Class', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_type5_block2_icon',
                'type'          => 'text',
                'priority'   => 12,
                'active_callback' => 'safeguard_header_type5_callback',
            )
        );
		$wp_customize->add_setting( 'safeguard_header_type5_block2_content' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize -> add_control(
		    new Text_Editor_Custom_Control(
		        $wp_customize,
		        'safeguard_header_type5_block2_content',
		        array(
		            'label'         => esc_html__( 'Block #2 Content', 'safeguard' ),
	                'section'       => 'safeguard_header_settings',
	                'settings'      => 'safeguard_header_type5_block2_content',
	                'priority'   => 12,
	                'active_callback' => 'safeguard_header_type5_callback',
		        )
		    )
		);
        /* BLOCK 3 */
        $wp_customize->add_setting( 'safeguard_header_type5_block3_icon' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type5_block3_icon',
            array(
                'label'         => esc_html__( 'Block #3 Icon Class', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_type5_block3_icon',
                'type'          => 'text',
                'priority'   => 12,
                'active_callback' => 'safeguard_header_type5_callback',
            )
        );
		$wp_customize->add_setting( 'safeguard_header_type5_block3_content' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize -> add_control(
		    new Text_Editor_Custom_Control(
		        $wp_customize,
		        'safeguard_header_type5_block3_content',
		        array(
		            'label'         => esc_html__( 'Block #3 Content', 'safeguard' ),
	                'section'       => 'safeguard_header_settings',
	                'settings'      => 'safeguard_header_type5_block3_content',
	                'priority'   => 12,
	                'active_callback' => 'safeguard_header_type5_callback',
		        )
		    )
		);
		/* RIGHT BLOCK */
		$wp_customize->add_setting( 'safeguard_header_type5_rblock_text' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type5_rblock_text',
            array(
                'label'         => esc_html__( 'Right Block Text', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_type5_rblock_text',
                'type'          => 'text',
                'priority'   => 12,
                'active_callback' => 'safeguard_header_type5_callback',
            )
        );
        $wp_customize->add_setting( 'safeguard_header_type5_rblock_link' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'safeguard_header_type5_rblock_link',
            array(
                'label'         => esc_html__( 'Right Block Link', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_type5_rblock_link',
                'type'          => 'text',
                'priority'   => 12,
                'active_callback' => 'safeguard_header_type5_callback',
            )
        );


		$wp_customize->add_setting( 'safeguard_header_sidebar_view' , array(
				'default'     => 'fixed',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_sidebar_view',
            array(
                'label'    => esc_html__( 'Sidebar View', 'safeguard' ),
                'section'  => 'safeguard_header_settings',
                'settings' => 'safeguard_header_sidebar_view',
                'type'     => 'select',
                'choices'  => array(
                    'fixed'  => esc_html__( 'Fixed', 'safeguard' ),
                    'horizontal' => esc_html__( 'Horizontal Button', 'safeguard' ),
		            'vertical' => esc_html__( 'Vertical Button', 'safeguard' ),
                ),
                'active_callback' => 'safeguard_header_type_callback',
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'safeguard_header_sticky' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_sticky',
            array(
                'label'         => esc_html__( 'Behavior', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_sticky',
                'type'          => 'select',
                'choices'       => array(
                    '0' => esc_html__( 'Default', 'safeguard' ),
                    'sticky'  => esc_html__( 'Sticky Top', 'safeguard' ),
		            'fixed'  => esc_html__( 'Sticky and Scroll ', 'safeguard' ),
                    'scroll'  => esc_html__( 'Sticky Scroll ', 'safeguard' ),
                ),
                'priority'   => 30
            )
        );
        
        $wp_customize->add_setting( 'safeguard_header_decore' , array(
				'default'     => 'none',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_decore',
            array(
                'label'         => esc_html__( 'Header decore', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_decore',
                'type'          => 'select',
                'choices'       => array(
                    'none' => esc_html__( 'none', 'safeguard' ),
                    'style_1'  => esc_html__( 'Style 1', 'safeguard' ),
		            'style_2'  => esc_html__( 'Style 2', 'safeguard' ),
                ),
                'priority'   => 30,
                'active_callback' => 'safeguard_header_decore_callback',
            )
        );


		$wp_customize->add_setting( 'safeguard_header_menu' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_menu',
            array(
                'label'    => esc_html__( 'Menu', 'safeguard' ),
                'section'  => 'safeguard_header_settings',
                'settings' => 'safeguard_header_menu',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'safeguard' ),
                    '0' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 40
            )
        );


		$wp_customize->add_setting( 'safeguard_header_menu_add' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$args = array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => true,
		);
		$menus = get_terms( $args );
		$menus_arr = array();
		$menus_arr[''] = esc_html__( 'Select Menu', 'safeguard' );
		foreach ($menus as $key => $value) {
			if(is_object($value)) {
				$menus_arr[$value->term_id] = $value->name;
			}
		}
        $wp_customize->add_control(
            'safeguard_header_menu_add',
            array(
                'label'         => esc_html__( 'Additional Menu', 'safeguard' ),
                'section'       => 'safeguard_header_settings',
                'settings'      => 'safeguard_header_menu_add',
                'type'          => 'select',
                'choices'       => $menus_arr,
                'active_callback' => 'safeguard_header_type12_callback',
                'priority'   => 50
            )
        );


		$wp_customize->add_setting( 'safeguard_header_menu_add_position' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_menu_add_position',
            array(
                'label'    => esc_html__( 'Additional Menu Position', 'safeguard' ),
                'section'  => 'safeguard_header_settings',
                'settings' => 'safeguard_header_menu_add_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left Sidebar', 'safeguard' ),
                    'right' => esc_html__( 'Right Sidebar', 'safeguard' ),
		            'top' => esc_html__( 'Top Sidebar', 'safeguard' ),
		            'bottom'  => esc_html__( 'Bottom Sidebar', 'safeguard' ),
                    'screen' => esc_html__( 'Full Screen', 'safeguard' ),
                    'fly' => esc_html__( 'Fly Menu', 'safeguard' ),
		            'disable' => esc_html__( 'Disabled', 'safeguard' ),
                ),
                'active_callback' => 'safeguard_header_type12_callback',
                'priority'   => 60
            )
        );


        $wp_customize->add_setting( 'safeguard_header_advanced_page' , array(
				'default'     => '0',
				'transport'   => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_advanced_page',
            array(
                'label'    => esc_html__( 'Advanced Options on Page', 'safeguard' ),
                'description'   => '',
                'section'  => 'safeguard_header_settings',
                'settings' => 'safeguard_header_advanced_page',
                'type'     => 'select',
                'choices'  => array(
                    '0' => esc_html__( 'Off', 'safeguard' ),
                    '1'  => esc_html__( 'On', 'safeguard' ),
                ),
                'priority'   => 70
            )
        );



		/// HEADER STYLE ///

		$wp_customize->add_section( 'safeguard_header_settings_style' , array(
		    'title'      => esc_html__( 'Style', 'safeguard' ),
		    'priority'   => 10,
			'panel' => 'safeguard_header_panel'
		) );


		$wp_customize->add_setting( 'safeguard_header_layout' , array(
				'default'     => 'normal',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_layout',
            array(
                'label'    => esc_html__( 'Layout', 'safeguard' ),
                'section'  => 'safeguard_header_settings_style',
                'settings' => 'safeguard_header_layout',
                'type'     => 'select',
                'choices'  => array(
                    'normal'  => esc_html__( 'Normal', 'safeguard' ),
                    'boxed' => esc_html__( 'Boxed', 'safeguard' ),
		            'full' => esc_html__( 'Full Width', 'safeguard' ),
                ),
                'priority'   => 10
            )
        );


		$wp_customize->add_setting( 'safeguard_header_background' , array(
				'default'     => 'trans-black',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_background',
            array(
                'label'    => esc_html__( 'Background', 'safeguard' ),
                'description'   => esc_html__( 'Background header color', 'safeguard' ),
                'section'  => 'safeguard_header_settings_style',
                'settings' => 'safeguard_header_background',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Default', 'safeguard' ),
                    'white' => esc_html__( 'White', 'safeguard' ),
		            'black' => esc_html__( 'Black', 'safeguard' ),
	                'trans-white' => esc_html__( 'Transparent White', 'safeguard' ),
		            'trans-black' => esc_html__( 'Transparent Black', 'safeguard' ),
                ),
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'safeguard_header_transparent' , array(
				'default'     => '4',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_transparent',
            array(
                'label'    => esc_html__( 'Transparent', 'safeguard' ),
                'section'  => 'safeguard_header_settings_style',
                'settings' => 'safeguard_header_transparent',
                'type'     => 'select',
                'choices'  => array(
                    '0' => "0.0",
					'1' => "0.1",
					'2' => "0.2",
					'3' => "0.3",
					'4' => "0.4",
					'5' => "0.5",
					'6' => "0.6",
					'7' => "0.7",
					'8' => "0.8",
					'9' => "0.9",
                ),
                'priority'   => 30
            )
        );


        $wp_customize->add_setting( 'safeguard_header_menu_animation' , array(
				'default'     => 'overlay',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_menu_animation',
            array(
                'label'         => esc_html__( 'Sidebar Menu Animation', 'safeguard' ),
                'description'   => esc_html__( 'Overlay or reveal Sidebar menu animation', 'safeguard' ),
                'section'       => 'safeguard_header_settings_style',
                'settings'      => 'safeguard_header_menu_animation',
                'type'          => 'select',
                'choices'       => array(
                    'overlay' => esc_html__( 'Overlay', 'safeguard' ),
                    'reveal'  => esc_html__( 'Reveal', 'safeguard' ),
                ),
                'priority'   => 40
            )
        );


		$wp_customize->add_setting( 'safeguard_header_hover_effect' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_hover_effect',
            array(
                'label'    => esc_html__( 'Menu Hover Effect', 'safeguard' ),
                'section'  => 'safeguard_header_settings_style',
                'settings' => 'safeguard_header_hover_effect',
                'type'     => 'select',
                'choices'  => array(
                    '0' => esc_html__( 'Without effect', 'safeguard' ),
					'1' => "a",
					'3' => "b",
					'4' => "c",
					'6' => "d",
					'7' => "e",
					'8' => "f",
					'9' => "g",
					'11' => "h",
					'12' => "i",
		            '13' => "j",
					'14' => "k",
		            '17' => "l",
					'18' => "m",
                ),
                'active_callback' => 'safeguard_header_menu_callback',
                'priority'   => 50
            )
        );


		$wp_customize->add_setting( 'safeguard_header_marker' , array(
				'default'     => 'menu-marker-arrow',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'safeguard_header_marker',
			array(
				'label'    => esc_html__( 'Menu Markers', 'safeguard' ),
				'section'  => 'safeguard_header_settings_style',
				'settings' => 'safeguard_header_marker',
				'type'     => 'select',
				'choices'  => array(
						'menu-marker-arrow'  => esc_html__( 'Arrows', 'safeguard' ),
						'menu-marker-dot' => esc_html__( 'Dots', 'safeguard' ),
						'no-marker' => esc_html__( 'Without markers', 'safeguard' ),
				),
				'active_callback' => 'safeguard_header_menu_callback',
				'priority'   => 60
			)
		);




        /// HEADER ELEMENTS ///

		$wp_customize->add_section( 'safeguard_header_settings_elements' , array(
		    'title'      => esc_html__( 'Elements', 'safeguard' ),
		    'priority'   => 15,
			'panel' => 'safeguard_header_panel'
		) );


		$wp_customize->add_setting( 'safeguard_header_bar' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'safeguard_header_bar',
			array(
				'label'    => esc_html__( 'Top Bar', 'safeguard' ),
				'section'  => 'safeguard_header_settings_elements',
				'settings' => 'safeguard_header_bar',
				'type'     => 'select',
				'choices'  => array(
						'1'  => esc_html__( 'On', 'safeguard' ),
						'0' => esc_html__( 'Off', 'safeguard' ),
				),
				'priority'   => 10
			)
		);


		$wp_customize->add_setting( 'safeguard_header_minicart' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_minicart',
            array(
                'label'    => esc_html__( 'Minicart', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements',
                'settings' => 'safeguard_header_minicart',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'safeguard' ),
                    '0' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'safeguard_header_search' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_search',
            array(
                'label'    => esc_html__( 'Search', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements',
                'settings' => 'safeguard_header_search',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'safeguard' ),
                    '0' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 30
            )
        );


		$wp_customize->add_setting( 'safeguard_header_socials' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_socials',
            array(
                'label'    => esc_html__( 'Socials', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements',
                'settings' => 'safeguard_header_socials',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'safeguard' ),
                    '0' => esc_html__( 'Off', 'safeguard' ),
                ),
                'priority'   => 40
            )
        );





		/// HEADER ELEMENTS POSITION ///

		$wp_customize->add_section( 'safeguard_header_settings_elements_position' , array(
		    'title'      => esc_html__( 'Elements Position', 'safeguard' ),
		    'priority'   => 20,
			'panel' => 'safeguard_header_panel'
		) );


		$wp_customize->add_setting( 'safeguard_header_topbarbox_1_position' , array(
				'default'     => 'left',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_topbarbox_1_position',
            array(
                'label'    => esc_html__( 'Top Bar Email', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_topbarbox_1_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 50
            )
        );

		$wp_customize->add_setting( 'safeguard_header_topbarbox_2_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_topbarbox_2_position',
            array(
                'label'    => esc_html__( 'Top Bar Menu', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_topbarbox_2_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 60
            )
        );


		$wp_customize->add_setting( 'safeguard_header_navibox_1_position' , array(
				'default'     => 'left',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_navibox_1_position',
            array(
                'label'    => esc_html__( 'Logo', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_navibox_1_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 70
            )
        );


		$wp_customize->add_setting( 'safeguard_header_navibox_2_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_navibox_2_position',
            array(
                'label'    => esc_html__( 'Main Menu', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_navibox_2_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 80
            )
        );


		$wp_customize->add_setting( 'safeguard_header_navibox_3_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_navibox_3_position',
            array(
                'label'    => esc_html__( 'Socials And Phone', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_navibox_3_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 90
            )
        );


		$wp_customize->add_setting( 'safeguard_header_navibox_4_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'safeguard_header_navibox_4_position',
            array(
                'label'    => esc_html__( 'Minicart', 'safeguard' ),
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_navibox_4_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'safeguard' ),
                    'right' => esc_html__( 'Right', 'safeguard' ),
                ),
                'priority'   => 100
            )
        );


		$wp_customize->add_setting( 'safeguard_header_adm_bar' , array(
				'default'     => '0',
				'sanitize_callback' => 'sanitize_text_field'
		) );
        $wp_customize->add_control(
            'safeguard_header_adm_bar',
            array(
                'label'    => esc_html__( 'Admin Bar Opacity', 'safeguard' ),
                'description'   => '',
                'section'  => 'safeguard_header_settings_elements_position',
                'settings' => 'safeguard_header_adm_bar',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'No', 'safeguard' ),
                    '1' => esc_html__( 'Yes', 'safeguard' ),
                ),
                'priority'   => 110
            )
        );




        /// HEADER INFO ///

		$wp_customize->add_section( 'safeguard_header_settings_info' , array(
		    'title'      => esc_html__( 'Phone and email', 'safeguard' ),
		    'priority'   => 25,
			'panel' => 'safeguard_header_panel'
		) );


		$wp_customize->add_setting( 'safeguard_header_phone' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control(
			'safeguard_header_phone',
			array(
				'label'    => esc_html__( 'Phone', 'safeguard' ),
				'section'  => 'safeguard_header_settings_info',
				'settings' => 'safeguard_header_phone',
				'type'     => 'text',
				'priority'   => 10
			)
		);


		$wp_customize->add_setting( 'safeguard_header_email' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
		) );
		$wp_customize->add_control(
			'safeguard_header_email',
			array(
				'label'    => esc_html__( 'Email', 'safeguard' ),
				'section'  => 'safeguard_header_settings_info',
				'settings' => 'safeguard_header_email',
				'type'     => 'text',
				'priority'   => 20
			)
		);

		
	}
		
?>