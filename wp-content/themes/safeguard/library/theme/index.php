<?php 
	/**  Theme_index  **/

	/* Define library Theme path */

    include_once( get_template_directory() . '/library/theme/styles_scripts.php' );
    include_once( get_template_directory() . '/library/theme/functions.php' );
    include_once( get_template_directory() . '/library/theme/blog.php' );
    include_once( get_template_directory() . '/library/theme/filters.php' );
    //include_once( get_template_directory() . '/library/theme/import.php' );
    include_once( get_template_directory() . '/library/theme/comment_walker.php' );
    include_once( get_template_directory() . '/library/theme/menu_walker.php' );
    include_once( get_template_directory() . '/library/theme/portfolio_walker.php' );
    include_once( get_template_directory() . '/library/theme/customizer.php' );
    include_once( get_template_directory() . '/library/theme/woo.php' );
    include_once( get_template_directory() . '/library/theme/defaults.php' );

	include_once( get_template_directory() . '/library/about.php');

	add_action('after_setup_theme', 'safeguard_theme_support_setup');
	function safeguard_theme_support_setup(){
		add_theme_support('safeguard_customize_opt');
		add_theme_support('default_customize_opt');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_image_size('safeguard-thumb', 70, 70, false);
		// Define various thumbnail sizes
		$width = ( ( safeguard_get_option( 'portfolio_settings_thumb_width', '556' ) ) &&
					 is_numeric( safeguard_get_option( 'portfolio_settings_thumb_width', '556' ) ) &&
					 safeguard_get_option( 'portfolio_settings_thumb_width', '556' ) > 0
				 ) ? safeguard_get_option( 'portfolio_settings_thumb_width', '556' ) : 556;
		$height = ( ( safeguard_get_option( 'portfolio_settings_thumb_height', '556' ) ) &&
					 is_numeric( safeguard_get_option( 'portfolio_settings_thumb_height', '556' ) ) &&
					 safeguard_get_option( 'portfolio_settings_thumb_height', '556' ) > 0
				 ) ? safeguard_get_option( 'portfolio_settings_thumb_height', '556' ) : 556;
		add_image_size('safeguard-portfolio-thumb', $width, $height, true);
		add_image_size('safeguard-pix-puzzle-thumb-x', $width, $height/2, true);
		add_image_size('safeguard-pix-puzzle-thumb-y', $width/2, $height, true);
		add_image_size('safeguard-pix-puzzle-thumb-xy', $width/2, $height/2, true);
		add_image_size('safeguard-portfolio-single', 620);
		add_image_size('safeguard-news-thumb', 620, 415, true );
		add_image_size('safeguard-services-thumb', 350, 233, true);
		add_image_size('safeguard-application-thumb', 215, 380, true);

		global $pagenow;

//		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
//
//			wp_redirect(admin_url("themes.php?page=adminpanel")); // Your admin page URL
//
//		}

	}

	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}

	//add_action( 'admin_menu', 'safeguard_dashboard_menu' );
	function safeguard_dashboard_menu(){
		remove_submenu_page( 'kaswara-framework', 'kaswara-demo-importer' );
	}

?>