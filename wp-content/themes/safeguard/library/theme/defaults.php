<?php 
/**  Theme defaults values  **/

add_action('after_setup_theme', 'safeguard_theme_defaults');
function safeguard_theme_defaults(){
	
	// Colors and Fonts
	update_option( 'safeguard_default_main_color', '#f26520' );
	update_option( 'safeguard_default_gradient_color', '' );
	update_option( 'safeguard_default_additional_color', '#d0311b' );
	update_option( 'safeguard_default_font', 'Rubik' );
	update_option( 'safeguard_default_font_weights', '300,400,500,700,900' );
	update_option( 'safeguard_default_font_weight', '400' );
	update_option( 'safeguard_default_title', 'Rubik' );
	update_option( 'safeguard_default_title_weights',  '300,400,500,700,900'  );
	update_option( 'safeguard_default_title_weight', '500' );
	update_option( 'safeguard_default_subtitle', 'Rubik' );
	update_option( 'safeguard_default_title_weights',  '300,400,500,700,900'  );
	update_option( 'safeguard_default_subtitle_weight', '500' );
	
	// Header Title and Breadcrumbs
	update_option( 'safeguard_default_tab_bg_color', '#000000' );
	update_option( 'safeguard_default_tab_bg_color_gradient', '' );
	update_option( 'safeguard_default_tab_gradient_direction', 'to bottom' );
	update_option( 'safeguard_default_tab_bg_opacity', '0.8' );
	update_option( 'safeguard_default_tab_padding_top', '150' );
	update_option( 'safeguard_default_tab_padding_bottom', '50' );
	update_option( 'safeguard_default_tab_margin_bottom', '80' );
	update_option( 'safeguard_default_tab_bottom_decor', '1' );
	update_option( 'safeguard_default_tab_border', '1' );

	update_option( 'safeguard_page_loader_bg_color', '#ffffff' );

}

add_filter( 'safeguard_header_settings', 'safeguard_header_settings_var' );
function safeguard_header_settings_var( $post_ID=0 ){

	if(isset($post_ID) && $post_ID>0) {

		/// Header global parameters
		$safeguard['header_type'] = get_post_meta($post_ID, 'header_type', 1) != '' ? get_post_meta($post_ID, 'header_type', 1) : safeguard_get_option('header_type', 'header1');
		$safeguard['header_sidebar_view'] = $safeguard['header_type'] == 'header3' ? (get_post_meta($post_ID, 'header_sidebar_view', 1) != '' ? get_post_meta($post_ID, 'header_sidebar_view', 1) : safeguard_get_option('header_sidebar_view', 'fixed')) : '';
		$safeguard['header_background'] = get_post_meta($post_ID, 'header_background', 1) != '' ? get_post_meta($post_ID, 'header_background', 1) : (safeguard_get_option('header_background', 'trans-black'));
		$safeguard['header_transparent'] = get_post_meta($post_ID, 'header_transparent', 1) != '' ? get_post_meta($post_ID, 'header_transparent', 1) : safeguard_get_option('header_transparent', '4');
		$safeguard['header_hover_effect'] = get_post_meta($post_ID, 'header_hover_effect', 1) != '' ? get_post_meta($post_ID, 'header_hover_effect', 1) : safeguard_get_option('header_hover_effect', '0');
		$safeguard['header_marker'] = get_post_meta($post_ID, 'header_marker', 1) != '' ? get_post_meta($post_ID, 'header_marker', 1) : safeguard_get_option('header_marker', 'menu-marker-arrow');
		$safeguard['header_layout'] = get_post_meta($post_ID, 'header_layout', 1) != '' ? get_post_meta($post_ID, 'header_layout', 1) : safeguard_get_option('header_layout', 'normal');
		$safeguard['header_bar'] = get_post_meta($post_ID, 'header_bar', 1) != '' ? get_post_meta($post_ID, 'header_bar', 1) : safeguard_get_option('header_bar', '0');

		$safeguard['header_sticky'] = get_post_meta($post_ID, 'header_sticky', 1) != '' ? get_post_meta($post_ID, 'header_sticky', 1) : safeguard_get_option('header_sticky', 'sticky');
		$safeguard['mobile_sticky'] = get_post_meta($post_ID, 'mobile_sticky', 1) != '' ? get_post_meta($post_ID, 'mobile_sticky', 1) : safeguard_get_option('mobile_sticky', '');


		/// Header menu settings
		$safeguard['header_menu'] = get_post_meta($post_ID, 'header_menu', 1) != '' ? get_post_meta($post_ID, 'header_menu', 1) : safeguard_get_option('header_menu', '1');
		$safeguard['header_menu_add'] = get_post_meta($post_ID, 'header_menu_add', 1) != '' ? get_post_meta($post_ID, 'header_menu_add', 1) : safeguard_get_option('header_menu_add', '');
		$safeguard['header_menu_add_position'] = get_post_meta($post_ID, 'header_menu_add_position', 1) != '' ? get_post_meta($post_ID, 'header_menu_add_position', 1) : safeguard_get_option('header_menu_add_position', 'disable');
		$safeguard['header_menu_animation'] = get_post_meta($post_ID, 'header_menu_animation', 1) != '' ? get_post_meta($post_ID, 'header_menu_animation', 1) : safeguard_get_option('header_menu_animation', 'overlay');

		/// Header widgets
		$safeguard['header_minicart'] = get_post_meta($post_ID, 'header_minicart', 0) != '' ? get_post_meta($post_ID, 'header_minicart', 1) : safeguard_get_option('header_minicart', '1');
		$safeguard['header_search'] = get_post_meta($post_ID, 'header_search', 0) != '' ? get_post_meta($post_ID, 'header_search', 1) : safeguard_get_option('header_search', '0');
		$safeguard['header_socials'] = get_post_meta($post_ID, 'header_socials', 1) != '' ? get_post_meta($post_ID, 'header_socials', 1) : safeguard_get_option('header_socials', '1');


		$class = '';
		foreach ($safeguard as $key => $val) {
			if (!in_array($key, array('header_transparent', 'header_sticky', 'mobile_sticky', 'header_menu_animation')))
				$class .= $val . '-';
		}
		$safeguard['header_uniq_class'] = substr($class, 0, -1);

		$safeguard['header_phone'] = get_post_meta($post_ID, 'header_phone', 1) != '' ? get_post_meta($post_ID, 'header_phone', 1) : safeguard_get_option('header_phone', '');
		$safeguard['header_email'] = get_post_meta($post_ID, 'header_email', 1) != '' ? get_post_meta($post_ID, 'header_email', 1) : safeguard_get_option('header_email', '');

		/// Header elements position
		$safeguard['header_topbarbox_1_position'] = get_post_meta($post_ID, 'header_topbarbox_1_position', 1) != '' ? get_post_meta($post_ID, 'header_topbarbox_1_position', 1) : safeguard_get_option('header_topbarbox_1_position', 'left', 0);
		$safeguard['header_topbarbox_2_position'] = get_post_meta($post_ID, 'header_topbarbox_2_position', 1) != '' ? get_post_meta($post_ID, 'header_topbarbox_2_position', 1) : safeguard_get_option('header_topbarbox_2_position', 'right', 0);
		$safeguard['header_navibox_1_position'] = get_post_meta($post_ID, 'header_navibox_1_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_1_position', 1) : safeguard_get_option('header_navibox_1_position', 'left');
		$safeguard['header_navibox_2_position'] = get_post_meta($post_ID, 'header_navibox_2_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_2_position', 1) : safeguard_get_option('header_navibox_2_position', 'right');
		$safeguard['header_navibox_3_position'] = get_post_meta($post_ID, 'header_navibox_3_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_3_position', 1) : safeguard_get_option('header_navibox_3_position', 'right');
		$safeguard['header_navibox_4_position'] = get_post_meta($post_ID, 'header_navibox_4_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_4_position', 1) : safeguard_get_option('header_navibox_4_position', 'right');

		/// Responsive
		$safeguard['mobile_sticky'] = get_post_meta($post_ID, 'mobile_sticky', 1) != '' ? get_post_meta($post_ID, 'mobile_sticky', 1) : safeguard_get_option('mobile_sticky', '');
		$safeguard['mobile_topbar'] = get_post_meta($post_ID, 'mobile_topbar', 1) != '' ? get_post_meta($post_ID, 'mobile_topbar', 1) : safeguard_get_option('mobile_topbar', '');
		$safeguard['tablet_minicart'] = get_post_meta($post_ID, 'tablet_minicart', 1) != '' ? get_post_meta($post_ID, 'tablet_minicart', 1) : safeguard_get_option('tablet_minicart', '');
		$safeguard['tablet_search'] = get_post_meta($post_ID, 'tablet_search', 1) != '' ? get_post_meta($post_ID, 'tablet_search', 1) : safeguard_get_option('tablet_search', '');
		$safeguard['tablet_phone'] = get_post_meta($post_ID, 'tablet_phone', 1) != '' ? get_post_meta($post_ID, 'tablet_phone', 1) : safeguard_get_option('tablet_phone', '');
		$safeguard['tablet_socials'] = get_post_meta($post_ID, 'tablet_socials', 1) != '' ? get_post_meta($post_ID, 'tablet_socials', 1) : safeguard_get_option('tablet_socials', '');


		/// Logo
		$safeguard['logo'] = get_post_meta($post_ID, 'header_logo', 1) != '' ? get_post_meta($post_ID, 'header_logo', 1) : safeguard_get_option('general_settings_logo', '');
		$safeguard['logo_inverse'] = get_post_meta($post_ID, 'header_logo_inverse', 1) != '' ? get_post_meta($post_ID, 'header_logo_inverse', 1) : safeguard_get_option('general_settings_logo_inverse', '');


		return $safeguard;
	} else {

		/// Header global parameters
		$safeguard['header_type'] = safeguard_get_option('header_type', 'header1');
		$safeguard['header_sidebar_view'] = safeguard_get_option('header_sidebar_view', 'fixed');
		$safeguard['header_background'] = safeguard_get_option('header_background', 'trans-black');
		$safeguard['header_transparent'] = safeguard_get_option('header_transparent', '4');
		$safeguard['header_hover_effect'] = safeguard_get_option('header_hover_effect', '0');
		$safeguard['header_marker'] = safeguard_get_option('header_marker', 'menu-marker-arrow');
		$safeguard['header_layout'] = safeguard_get_option('header_layout', 'normal');
		$safeguard['header_bar'] = safeguard_get_option('header_bar', '0');

		$safeguard['header_sticky'] = safeguard_get_option('header_sticky', 'sticky');
		$safeguard['mobile_sticky'] = '';

		/// Header menu settings
		$safeguard['header_menu'] = '1';
		$safeguard['header_menu_add'] = safeguard_get_option('header_menu_add', '');
		$safeguard['header_menu_add_position'] = safeguard_get_option('header_menu_add_position', 'left');
		$safeguard['header_menu_animation'] = safeguard_get_option('header_menu_animation', 'overlay');

		/// Header widgets
		$safeguard['header_minicart'] = safeguard_get_option('header_minicart', '1');
		$safeguard['header_search'] = safeguard_get_option('header_search', '1');
		$safeguard['header_socials'] = safeguard_get_option('header_socials', '1');

		$class = '';
		foreach ($safeguard as $key => $val) {
			if (!in_array($key, array('header_transparent', '', 'mobile_sticky', 'header_menu_animation')))
				$class .= $val . '-';
		}
		$safeguard['header_uniq_class'] = substr($class, 0, -1);

		$safeguard['header_phone'] = '';
		$safeguard['header_email'] = '';

		/// Header elements position
		$safeguard['header_topbarbox_1_position'] = 'left';
		$safeguard['header_topbarbox_2_position'] = 'right';
		$safeguard['header_navibox_1_position'] = 'left';
		$safeguard['header_navibox_2_position'] = 'right';
		$safeguard['header_navibox_3_position'] = 'right';
		$safeguard['header_navibox_4_position'] = 'right';

		/// Responsive
		$safeguard['mobile_sticky'] = '';
		$safeguard['mobile_topbar'] = '';
		$safeguard['tablet_minicart'] = '';
		$safeguard['tablet_search'] = '';
		$safeguard['tablet_phone'] = '';
		$safeguard['tablet_socials'] = '';

		/// Logo
		$safeguard['logo'] = '';
		$safeguard['logo_inverse'] = '';

		return $safeguard;
	}
}