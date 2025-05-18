<?php
function safeguard_fonts_url($post_id) {
	$fonts_url = '';
	$main_font = get_post_meta($post_id, 'page_google_font', 1);
	$main_font_title = get_post_meta($post_id, 'page_google_font_title', 1);
	$main_font_subtitle = get_post_meta($post_id, 'page_google_font_subtitle', 1);
	$safeguard_font = safeguard_get_option('font', get_option('safeguard_default_font'));
	$safeguard_font_weights = safeguard_get_option('font_weights', get_option('safeguard_default_font_weights'));
	$safeguard_title = safeguard_get_option('title_font', get_option('safeguard_default_title'));
	$safeguard_title_weights = safeguard_get_option('title_font_weights', get_option('safeguard_default_title_weights'));
	$safeguard_subtitle = safeguard_get_option('subtitle_font', get_option('safeguard_default_subtitle'));
	$safeguard_subtitle_weights = safeguard_get_option('subtitle_font_weights', get_option('safeguard_default_subtitle_weights'));

    $safeguard = _x( 'on', 'Roboto fonts: on or off', 'safeguard' );

	if ( 'off' !== $safeguard || $main_font != '' || $main_font_title != '') {
		$font_families = array();

        if ( 'off' !== $safeguard ) {
			$font_families[] = 'Source Sans Pro:300,400,500,600,700';
		}

		if ( $main_font != '' ) {
			$font_families[] = $main_font;
		}

		if ( $main_font_title != '' ) {
			$font_families[] = $main_font_title;
		}

		if( $safeguard_font != '' ) {
			$cf = $safeguard_font;
			if ( $safeguard_font_weights != '' )
				$cf .= ':'.$safeguard_font_weights;
			$font_families[] = $cf;
		}

		if( $safeguard_title != '' ) {
			$cf = $safeguard_title;
			if ( $safeguard_title_weights != '' )
				$cf .= ':'.$safeguard_title_weights;
			$font_families[] = $cf;
		}

		if( $safeguard_subtitle != '' ) {
			$cf = $safeguard_subtitle;
			if ( $safeguard_subtitle_weights != '' )
				$cf .= ':'.$safeguard_subtitle_weights;
			$font_families[] = $cf;
		}

		$query_args = array(
			'family' => str_replace('%2B', '+', urlencode( implode( '|', $font_families ) )),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

add_filter('woocommerce_enqueue_styles', 'safeguard_load_woo_styles');
function safeguard_load_woo_styles($styles){
	if (isset($styles['woocommerce-general']) && isset($styles['woocommerce-general']['src'])){
		$styles['woocommerce-general']['src'] = get_template_directory_uri() . '/assets/woocommerce/css/woocommerce.css';
	}
	return $styles;
}

function safeguard_load_styles(){

    wp_enqueue_style('safeguard-style', get_stylesheet_uri());

    /* PRIMARY CSS */
	if (safeguard_get_option('general_settings_responsive','1')){
		wp_enqueue_style('safeguard-responsive', get_template_directory_uri() . '/css/responsive.css');
	}else{
		wp_enqueue_style('safeguard-no-responsive', get_template_directory_uri() . '/css/no-responsive.css');
	}
    wp_enqueue_style('safeguard-fonts', safeguard_fonts_url(get_the_ID()), array(), null );



	/* THEMES CSS */
    wp_enqueue_style('safeguard-global', get_template_directory_uri() . '/css/global.css');
    
    // ASSETS CSS

	if (safeguard_get_option('minify_styles_scripts' ) != 'yes') {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css');
	    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css');
	    wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/fancybox/fancybox.css');
	    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/owl/owl.css');
	    wp_enqueue_style('bxslider', get_template_directory_uri() . '/assets/bxslider/bxslider.css');
	    wp_enqueue_style('flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css');
	    wp_enqueue_style('slabText', get_template_directory_uri() . '/assets/slabText/css/slabtext.css');
	    wp_enqueue_style('og-grid', get_template_directory_uri() . '/assets/og-grid/og-grid.css');
	    wp_enqueue_style('easydropdown', get_template_directory_uri() . '/assets/easydropdown/css/easydropdown.metro.css');
        wp_enqueue_style('og-grid', get_template_directory_uri() . '/assets/og-grid/og-grid.css');
        wp_enqueue_style('safeguard-header', get_template_directory_uri() . '/assets/header/header.css');
        wp_enqueue_style('safeguard-header-yamm', get_template_directory_uri() . '/assets/header/yamm.css');
        wp_enqueue_style('safeguard-preloader', get_template_directory_uri() . '/assets/preloader/preloader.css');
        
        
        
        
        
	} 
    else {
  	 	wp_enqueue_style('minify-css', get_template_directory_uri() . '/assets/minify/minify.css');
	}
    
    
    


    
   	ob_start();
	include(get_template_directory() . '/library/dynamic-styles/index.php');
	$dynamic_styles = ob_get_contents();
	ob_clean();		
	
	wp_add_inline_style( 'safeguard-header-yamm', $dynamic_styles );

}
add_action('wp_enqueue_scripts', 'safeguard_load_styles');


function safeguard_dynamic_styles() {
	include( get_template_directory().'/library/dynamic-styles/index.php' );
	exit;
}


function safeguard_load_scripts(){

    $map_api = safeguard_get_option('map_api', 'AIzaSyBqQ_bBw186KJnMcRByvn5ffZueg88wp1E');


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
        
    /* Assets JS */   
    
    
	    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array('jquery') , '', false);
	    wp_enqueue_script('slabText', get_template_directory_uri() . '/assets/slabText/js/jquery.slabtext.js', array() , '1.0', true);
	    wp_enqueue_script('cssua', get_template_directory_uri() . '/assets/cssua/cssua.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/waypoints/waypoints.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/modernizr/modernizr.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('easypiechart', get_template_directory_uri() . '/assets/easypiechart/easypiechart.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('jarallax', get_template_directory_uri() . '/assets/jarallax/jarallax.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/og-grid/og-grid.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/isotope/isotope.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/owl/owl.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('cd-pricing', get_template_directory_uri() . '/assets/cd-pricing/cd-pricing.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/wow/wow.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('sticky-kit', get_template_directory_uri() . '/assets/sticky-kit/sticky-kit.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('scrollie', get_template_directory_uri() . '/assets/scrollie/scrollie.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/scrollie/scrollie.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.js', array('jquery') , '1.0', false);
	    wp_enqueue_script('easydropdown', get_template_directory_uri() . '/assets/easydropdown/js/jquery.easydropdown.js', array('jquery') , '1.0', false);
        wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/fancybox/fancybox.js', array('jquery') , '1.0', false);
         wp_enqueue_script('bxSlider', get_template_directory_uri() . '/assets/bxslider/bxslider.js', array('jquery') , '1.0', false);
        wp_enqueue_script('og-grid', get_template_directory_uri() . '/assets/og-grid/og-grid.js', array('jquery') , '1.0', false);
        

	    
    

    
    
    

    /* HEADER JS */
    wp_enqueue_script('safeguard-slidebar', get_template_directory_uri() . '/assets/header/slidebar.js', array('jquery') , '1.0', false);
	wp_enqueue_script('safeguard-header', get_template_directory_uri() . '/assets/header/header.js', array('jquery') , '1.0', true);
	wp_enqueue_script('safeguard-slidebars', get_template_directory_uri() . '/assets/header/slidebars.js', array('jquery') , '1.0', true);
    
    /* LOADER JS */
   wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/preloader/imagesloaded.pkgd.js', array() , '1.0', true);
   wp_enqueue_script('TweenMax', get_template_directory_uri() . '/assets/preloader/TweenMax.min.js', array() , '1.0', true);
   wp_enqueue_script('fl-page-loader', get_template_directory_uri() . '/assets/preloader/fl-page-loader.js', array() , '1.0', true);

     // CUSTOM SCRIPT
    wp_enqueue_script('safeguard-custom', get_template_directory_uri() . '/js/theme.js', array() , '1.1', true);
	
	wp_add_inline_script( 'safeguard-custom', 'jQuery(document).ready(function($) {Grid.init();});' );


	



}
add_action('wp_enqueue_scripts', 'safeguard_load_scripts');


add_filter('safeguard_grid_portfolio_enq', 'safeguard_portfolio_enqueue');
function safeguard_portfolio_enqueue() {
	wp_enqueue_style( 'safeguard-grid' );
    wp_enqueue_script( 'safeguard-grid' );
}


add_filter('body_class','safeguard_browser_body_class');
function safeguard_browser_body_class($classes = '') {

    if( ( get_post_meta(get_the_ID(), 'page_main_color', 1) != '' && get_post_meta(get_the_ID(), 'page_gradient_color', 1) != '')
    	|| ( get_post_meta(get_the_ID(), 'page_main_color', 1) == '' && safeguard_get_option('style_settings_gradient_color', get_option('safeguard_default_gradient_color')) != '' ) ){
		$classes[] = 'enable-gradient';
	} else {
		$classes[] = 'disable-gradient';
	}

    return $classes;
}

?>