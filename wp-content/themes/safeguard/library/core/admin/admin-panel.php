<?php

	require_once(get_template_directory() . '/library/core/admin/admin-panel/class.customizer.fonts.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/general.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/page-loader.php' );
	require_once(get_template_directory() . '/library/core/admin/admin-panel/style.php' );
	require_once(get_template_directory() . '/library/core/admin/admin-panel/header.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/page-tab.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/responsive.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/search.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/footer.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/shop.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/portfolio.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/services.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/blog.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/social.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/sanitizer.php' );
 
	
	function safeguard_customize_register( $wp_customize ) {

		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('colors');

		/** GENERAL SETTINGS **/
		safeguard_customize_general_tab($wp_customize,'safeguard');
		
		
		/** PAGE LOADER SETTINGS **/
		safeguard_customize_page_loader_tab($wp_customize,'safeguard');


		/** STYLE SECTION **/

		safeguard_customize_style_tab($wp_customize, 'safeguard');
		
		
		/** HEADER SECTION **/

		safeguard_customize_header_tab($wp_customize,'safeguard');


		/** RESPONSIVE SECTION **/

		safeguard_customize_responsive_tab($wp_customize,'safeguard');


		/** SEARCH SECTION **/

		safeguard_customize_search_tab($wp_customize,'safeguard');


		/** PAGE TITLE AND BREADCRUMBS SECTION **/

		safeguard_customize_page_t_a_b_tab($wp_customize,'safeguard');


		/** FOOTER SECTION **/

		safeguard_customize_footer_tab($wp_customize,'safeguard');


		/** SHOP SECTION **/

		safeguard_customize_shop_tab($wp_customize,'safeguard');


		/** PORTFOLIO SECTION **/

		safeguard_customize_portfolio_tab($wp_customize, 'safeguard');


		/** SERVICES SECTION **/

		safeguard_customize_services_tab($wp_customize, 'safeguard');


		/** BLOG SECTION **/

		safeguard_customize_blog_tab($wp_customize,'safeguard');

		/** SOCIAL SECTION **/

		safeguard_customize_social_tab($wp_customize,'safeguard');

		/** Remove unused sections */

		$removedSections = apply_filters('safeguard_admin_customize_removed_sections', array('header_image','background_image'));
		foreach ($removedSections as $_sectionName){
			$wp_customize->remove_section($_sectionName);
		}

    }
    
    
	add_action( 'customize_register', 'safeguard_customize_register' );

?>