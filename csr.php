<?php
/**
 * Plugin Name: Campsite Reports OFFICIAL Wordpress Plugin
 * Description: Integrate your Campsite Reports account into Wordpress websites.
 * Version: 1.0.0
 * Author: Brian Prom
 * Author URI: http://promincproductions.com/blog
 * License: Campsite Reports & Brian Prom
 */

defined('ABSPATH') or die("No script kiddies please!");


function csr_wp_plugin_init() {
	/* Load stylesheet for CSR functions */
	wp_register_style( 'csr_wp_plugin_stylesheet_admin', plugins_url('css/admin/csr.css?t=' . rand(), __FILE__) );

	/* Register database fields */
	add_action( 'admin_init', 'csr_wp_plugin_register_settings_admin' );

	/* Defin Admin Pages */
	$page_main = add_menu_page('CSR Settings', 'CSR Settings', 'administrator', 'csr_wp_plugin', 'csr_wp_plugin_page_main', plugins_url( 'images/csr_icon_20x20.png', __FILE__ ) );
	$page_instructions = add_submenu_page( 'csr_wp_plugin', 'How To', 'Instructions', 'administrator', 'csr_wp_plugin_howto', 'csr_wp_plugin_howto' );

	/* Add CSS to Admin pages */
	add_action( 'admin_print_styles-' . $page_instructions, 'csr_wp_plugin_admin_styles' );
}
add_action( 'admin_menu', 'csr_wp_plugin_init' );


/* Register form input fields */
function csr_wp_plugin_register_settings_admin() {
	register_setting('csr_wp_plugin', 'csr_park_id');
	register_setting('csr_wp_plugin', 'csr_show_link');
}


/* Enqueue admin CSS */
function csr_wp_plugin_admin_styles() {
	wp_enqueue_style( 'csr_wp_plugin_stylesheet_admin' );
}


/* Enqueue frontend CSS */
function csr_wp_plugin_admin_styles_frontend() {
	wp_enqueue_style( 'csr_wp_plugin_stylesheet_frontend', plugins_url('css/frontend/csr.css?t=' . rand(), __FILE__) );
}


/* Adds csr_api class to body element for frontend pages genereated via shortcodes */
function add_csr_class_to_body_class($classes) {
	$classes[] = 'csr_api';
	return $classes;
}
add_filter('body_class', 'add_csr_class_to_body_class');


/* ADMIN PAGES | START */
	/* Settings */
	function csr_wp_plugin_page_main() {
		if ( !current_user_can( 'manage_options' ) )  { wp_die( __( 'You do not have sufficient permissions to access this page.' ) ); }
		include 'pages/admin/main.php';
	}


	/* HowTo */
	function csr_wp_plugin_howto() {
		if ( !current_user_can( 'manage_options' ) )  { wp_die( __( 'You do not have sufficient permissions to access this page.' ) ); }
		include 'pages/admin/instructions.php';
	}
/* ADMIN PAGES | END */


/* CSR Link for Frontend pages */
function get_csr_link_frontend(){
	if( get_option('csr_show_link') ) {
		return '<a href="http://www.campsitereports.com/htm/free-campground-reservation-system.php" target="_blank" class="csr_api_site_link">Reservation system powered by Campsite Reports</a>';
	}
}


/* SHORTCODES | START */
	/* Add Reservation page via API */
	function csr_api_get_reservations( $atts, $content = null ) {
	   	if( $csr_park_id = get_option('csr_park_id') ) {
	   		csr_wp_plugin_admin_styles_frontend(); /* Add CSS */
			$return_content = '<iframe src="http://www.campsitereports.com/htm/API-Reservations.php?pid='.$csr_park_id.'" width="100%" height="750" frameborder="0"></iframe>';
			$return_content .= get_csr_link_frontend();
			return $return_content;
		} else {
			return false;
		}
	}
	$shortcode_reservations = add_shortcode( 'csr_api_reservations', 'csr_api_get_reservations' );
	apply_filters('body_class',$shortcode_reservations);  /* Add body class */


	/* Add Success page via API */
	function csr_api_get_success( $atts, $content = null ) {
		$return_content = '<iframe src="http://www.campsitereports.com/htm/API-ReservationSuccess.php" width="100%" height="750" frameborder="0"></iframe>';
		$return_content .= get_csr_link_frontend();
		return $return_content;
	}
	$shortcode_success = add_shortcode( 'csr_api_success', 'csr_api_get_success' );
	apply_filters('body_class',$shortcode_success);  /* Add body class */


	/* Add Not-Purchased page via API */
	function csr_api_get_notpurchased( $atts, $content = null ) {
		$return_content = '<iframe src="http://www.campsitereports.com/htm/API-ReservationNotPurchased.php" width="100%" height="750" frameborder="0"></iframe>';
		$return_content .= get_csr_link_frontend();
		return $return_content;
	}
	$shortcode_notpurchased = add_shortcode( 'csr_api_notpurchased', 'csr_api_get_notpurchased' );
	apply_filters('body_class',$shortcode_notpurchased);  /* Add body class */
/* SHORTCODES | END */

?>