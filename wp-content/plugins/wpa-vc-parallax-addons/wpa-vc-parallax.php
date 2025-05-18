<?php
/*
Plugin Name: Foreground Parallax For Visual Composer
Plugin URI: http://wpaddons.net
Description: The most attractive foreground parallax scrolling effect add-ons for Visual Composer page builder. This add-ons able to show multiple image on the left and right side in any VC row element.
Author: WPAddons
Version: 1.0
Author URI: http://wpaddons.net
Text Domain: wpa-parallax
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


// Defining Constance
define( 'WPA_PARALLAX_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'WPA_PARALLAX_PLUGIN_DIR', dirname(__FILE__));
define( 'WPA_PARALLAX_PLUGIN_PATH', dirname( plugin_basename(__FILE__) ) );

// Loading TextDomain
function wpaddons_parallax_plugin_init() {
	load_plugin_textdomain( 'wpa-parallax', false, WPA_PARALLAX_PLUGIN_PATH . '/languages/' );
}
add_action( 'plugins_loaded', 'wpaddons_parallax_plugin_init' );

// Loading Scripts
function wpaddons_parallax_scripts() {
	// style
	wp_enqueue_style('wpa-parallax-style', WPA_PARALLAX_PLUGIN_URL . 'css/style.css', array(), NULL);
	wp_enqueue_style('animate', WPA_PARALLAX_PLUGIN_URL . 'css/animate.css', array(), NULL);
	
	wp_enqueue_script( 'wpa-parallax-enllax', WPA_PARALLAX_PLUGIN_URL . 'js/jquery.enllax.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'wpa-parallax-scripts', WPA_PARALLAX_PLUGIN_URL . 'js/scripts.js', array('jquery'), NULL, true );
}
add_action( 'wp_enqueue_scripts', 'wpaddons_parallax_scripts' );


// Parallax addons file
if (class_exists('Vc_Manager')) {
	function wpaddons_parallax_addons_include(){
		include_once( WPA_PARALLAX_PLUGIN_DIR . '/wpa-vc-parallax-addons.php' );
	}
	add_action('init', 'wpaddons_parallax_addons_include');
}