<?php

function safeguard_import_files() {
    
    add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
    
    add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
    
    return array(
        
		array(
            'import_file_name'           => esc_html__( 'Safeguard Demo', 'safeguard' ),
            'import_file_url'            => esc_url('http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/safeguard.xml'),
            'import_widget_file_url'     => esc_url('http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/safeguard.wie'),
            'import_customizer_file_url' => esc_url('http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/safeguard.dat'),
            'import_preview_image_url'   => esc_url('http://assets.templines.com/plugins/theme/safeguard/kgu2pf8nb98qmhtar5zagg5f3nvt/safeguard.jpg'),
            'import_notice'              => '',
        ),
         
        
    );
	
}
add_filter( 'pt-ocdi/import_files', 'safeguard_import_files' );


function safeguard_after_import( $selected_import ) {

    $menu_arr = array();
    
    $main_menu = get_term_by('name', 'safeguard', 'nav_menu');
    $top_menu = get_term_by('name', 'top', 'nav_menu');
    
    if ( 'Safeguard Demo' === $selected_import['import_file_name'] ) {
    	$main_menu = get_term_by('name', 'main', 'nav_menu');
        $top_menu = get_term_by('name', 'top', 'nav_menu');
    } 
    
        
    
    
    if(is_object($main_menu)) {
    	$menu_arr['primary_nav'] = $main_menu->term_id;
    }
    if(is_object($top_menu)) {
    	$menu_arr['top_nav'] = $top_menu->term_id;
    }
    set_theme_mod( 'nav_menu_locations', $menu_arr );

   
    
    
    
    
    if ('Safeguard Demo' === $selected_import['import_file_name']) {
		
        $slider_array = array(
        plugin_dir_path(__FILE__)."/revslider/home1.zip",
        plugin_dir_path(__FILE__)."/revslider/home2.zip",
        plugin_dir_path(__FILE__)."/revslider/home3.zip",
    );
          
	}
    
    

    
    

    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'News' );
	
	
	

    update_option( 'show_on_front', 'page' );
    
    if ( 'Safeguard Demo' === $selected_import['import_file_name'] ) {
    	update_option( 'page_on_front', 16611 );
    } 
    
        
   
    
    
    update_option( 'page_for_posts', $blog_page_id->ID );
    
    
     if ( 'Safeguard Demo' === $selected_import['import_file_name'] ) {
    	set_theme_mod( 'safeguard_footer_block', '14960' );
    } 
    
    

    
    

    $absolute_path = __FILE__;
    $path_to_file = explode( 'wp-content', $absolute_path );
    $path_to_wp = $path_to_file[0];

    require_once( $path_to_wp.'/wp-load.php' );
    require_once( $path_to_wp.'/wp-includes/functions.php');

    $slider = new RevSlider();

    foreach($slider_array as $filepath){
     $slider->importSliderFromPost(true,true,$filepath);
    }
	
	update_post_meta($blog_page_id->ID,'pix_selected_sidebar','sidebar-1');

}
add_action( 'pt-ocdi/after_import', 'safeguard_after_import' );

?>