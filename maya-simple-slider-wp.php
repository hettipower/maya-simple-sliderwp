<?php
/*
Plugin Name: Maya Simple Slider Wordpress
Plugin URI: http://www.mclanka.com
Description:  Maya Simple Slider (slider for simple settings) <code>[ms_slider]</code>
Version: 2.0
Author: TharinduH
Text Domain: maya
*/

//register_activation_hook( __FILE__, 'plugin_activated' );
function plugin_activated(){
	$optPre = '_ms_opt_';
}

/********************************************************************************************/
/******************************************Plugin Constants***********************/
/************************************************************************************************/
define('MSS_URL',plugin_dir_url(__FILE__));
define('MSS_URL_CSS',MSS_URL.'css');
define('MSS_URL_JS',MSS_URL.'js');
define('MSS_URL_LIB',MSS_URL.'lib');

function maya_sim_slider_front_styles() {
	wp_enqueue_style('mss-style', MSS_URL_CSS.'/mss.css',array() , '1.0.0', 'screen');
  	wp_enqueue_style('OwlCarousel2-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',array() , '1.0.0', 'screen');
  	wp_enqueue_style('OwlCarousel2-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',array() , '1.0.0', 'screen');
}
add_action('wp_print_styles', 'maya_sim_slider_front_styles'); 

function maya_sim_slider_front_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('mss-js',MSS_URL_JS.'/mss.js', array('jquery'),'1.0',true);
	wp_enqueue_script('OwlCarousel2-js','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'),'1.0',true);
}
add_action('wp_print_scripts', 'maya_sim_slider_front_scripts');


function maya_sim_slider_admin_style() {
    wp_enqueue_style('admin-mss-style', MSS_URL_CSS.'/admin/admin_mss.css',array() , '1.0.0', 'screen');
    wp_enqueue_script('mss-admin-js',MSS_URL_JS.'/admin/mss_admin.js', array('jquery'),'1.0',true);
}
add_action( 'admin_enqueue_scripts', 'maya_sim_slider_admin_style' );

/**********************************************************************************************************************/
/*********************************************defines include*********************************************************/
/**********************************************************************************************************************/

//Custom Post Types
require_once( 'inc/post_type/slider_type.php');

//Shortcode
require_once( 'inc/shortcode/slider_shortcode.php');

//Libraries

//CMB2
if ( file_exists( dirname( __FILE__ ) . '/inc/lib/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/lib/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/inc/lib/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/lib/CMB2/init.php';
}

//Mobile Detect
require_once( 'inc/lib/vendor/autoload.php');