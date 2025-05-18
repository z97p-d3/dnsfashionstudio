<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-scrolling-animations="true" >

<?php

	if ( ! class_exists( 'TmplCustom' ) ){
		$additional_custom_class = 'tmpl-plugins-not-activated';
	}else{
		$additional_custom_class = 'tmpl-plugins-activated';
	}

	$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : get_the_ID();
	$safeguard_page_layout = get_post_meta($post_ID, 'page_layout', 1) != '' ? get_post_meta($post_ID, 'page_layout', 1) : safeguard_get_option('style_general_settings_layout', 'normal');
	$safeguard_blog_layout = safeguard_get_option('blog_settings_type', 'classic');
	if( class_exists( 'WooCommerce' ) ){
		$post_ID = $post_ID ? $post_ID : get_option( 'woocommerce_shop_page_id' );
	}
	$safeguard_woo_layout = get_post_meta($post_ID, 'pix_woo_layout', 1) != '' ? get_post_meta($post_ID, 'pix_woo_layout', 1) : safeguard_get_option('woo_layout', 'default');
	
	if( class_exists( 'WooCommerce' ) && safeguard_is_woo_page() && safeguard_get_option('safeguard_woo_header_global','1') ){
		$post_ID = get_option( 'woocommerce_shop_page_id' ) ? get_option( 'woocommerce_shop_page_id' ) : $post_ID;
	} 

	$safeguard_header = apply_filters('safeguard_header_settings', $post_ID);

	$safeguard_footer_fixed = get_post_meta($post_ID, 'pix_fixed_footer', 1) != '' ? get_post_meta($post_ID, 'pix_fixed_footer', 1) : safeguard_get_option('footer_fixed', '0');
	$safeguard_footer_fixed = $safeguard_footer_fixed ? 'fixed-footer-layout' : '';
	
	$safeguard_global_color = safeguard_get_option('style_settings_global_color', '1')
	            && (safeguard_get_option('style_settings_main_color', get_option('safeguard_default_main_color')) != get_option('safeguard_default_main_color')
                    || safeguard_get_option('style_settings_additional_color', get_option('safeguard_default_additional_color')) != get_option('safeguard_default_additional_color')
                    ) ? 'global-customizer-color' : '';
?>

<?php if( (safeguard_get_option('page_loader_settings_use','off') == 'usemain' && is_front_page()) || safeguard_get_option('page_loader_settings_use','off') == 'useall' ) : ?>
   
    
       <!-- ========================== --> 
  <!-- Loader  --> 
  <!-- ========================== -->
  
    <div id="fl-page--preloader">
        <span class="fl-top-progress">
            <span class="fl-loader_right"></span>
            <span class="fl-loader_left"></span>
        </span>


        <div class="fl-top-background-preloader"></div>
        <div class="fl-bottom-background-preloader"></div>
        <div class="fl--preloader-progress-bar"><span></span></div>
        <img src="" class="save_loader_bugs">
        <div class="fl-preloader--text-percent">
            <p class="fl--preloader-percent fl-text-title-style">0%</p>
        </div>
    </div>
    
<!-- Loader end -->
          
      
         
    
<?php endif; ?>
    
    

        

<div   class="layout-theme <?php echo safeguard_get_option('font_globally') == 'yes' ? 'kaswara-theme-font' : '' ?>  <?php echo esc_attr($additional_custom_class)?> <?php echo esc_attr($safeguard_footer_fixed); ?> <?php echo esc_attr($safeguard_global_color); ?> animated-css page-layout-<?php echo esc_attr($safeguard_page_layout); ?> woo-layout-<?php echo esc_attr($safeguard_woo_layout); ?> blog-layout-<?php echo esc_attr($safeguard_blog_layout); ?>" >

<?php
	if ( safeguard_get_option('header_search')  ) { 
		include(get_template_directory() . '/templates/header/header_menu/search.php');
	}
	if ( in_array($safeguard_header['header_menu_add_position'], array('left', 'right', 'top', 'bottom'))  && $safeguard_header['header_type'] != 'header3' ) {
		include(get_template_directory() . '/templates/header/header_menu/slide.php');
	}
	?>
	<div data-off-canvas="slidebar-5 left overlay" class="mobile-slidebar-menu">
		<button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button">
			<span class="toggle-menu-button-icon"><span></span> <span></span> <span></span> <span></span>
				<span></span> <span></span></span>
		</button>
		<?php
			if ( has_nav_menu( 'mobile_nav' ) ) {
				wp_nav_menu(array(
					'theme_location'  => 'mobile_nav',
	                'container'       => false,
	                'menu_id'		  => 'mobile-menu',
	                'menu_class'      => 'nav navbar-nav'
				));
			} else {
				echo safeguard_site_menu('yamm main-menu nav navbar-nav');
			}
		?>
	</div>
	<?php
	if ( $safeguard_header['header_menu_add_position'] == 'screen' && $safeguard_header['header_type'] != 'header3' ) {
		include(get_template_directory() . '/templates/header/header_menu/full-screen.php');
	}
?>

<?php if($safeguard_header['header_sidebar_view'] == 'fixed') : ?>
	<!-- FIXED SIDEBAR MENU  -->
	<div class="wrap-left-open ">
<?php endif; ?>

<?php
	if($safeguard_header['header_type'] == 'header3')
		safeguard_get_theme_header($safeguard_header['header_type']);
?>

<?php if($safeguard_header['header_menu_animation'] == 'reveal') : ?>
	<!-- ========================== -->
	<!-- CONTAINER SLIDE MENU  -->
	<!-- ========================== -->
	<div data-canvas="container">
<?php endif; ?>

<?php
	if($safeguard_header['header_type'] != 'header3')
		safeguard_get_theme_header($safeguard_header['header_type']);

	if (!is_page_template('page-home.php')) {
		safeguard_load_block('header/header_bgimage');
	}
?>








