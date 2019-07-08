<?php
/*
Plugin Name: Maya Simple Slider Wordpress
Plugin URI: http://www.mclanka.com
Description:  Maya Simple Slider (slider for simple settings) <code>[ms_slider]</code>
Version: 2.0
Author: TharinduH
Text Domain: maya-creations
*/


register_activation_hook( __FILE__, 'plugin_activated' );

function plugin_activated(){
	$optPre = '_ms_opt_';

	//Defult Options
	/*update_option($optPre."slider_mode", 'horizontal');
	update_option($optPre."slider_speed", '500');
	update_option($optPre."slider_randomStart", 'false');
	update_option($optPre."slider_infiniteLoop", 'true');
	update_option($optPre."slider_adaptiveHeight", 'false');
	//update_option($optPre."slider_video", 'false');
	update_option($optPre."slider_responsive", 'true');
	update_option($optPre."slider_touchEnabled", 'true');
	update_option($optPre."slider_preventDefaultSwipeX", 'true');
	update_option($optPre."slider_preventDefaultSwipeY", 'false');
	update_option($optPre."slider_pager", 'true');
	update_option($optPre."slider_controls", 'true');
	update_option($optPre."slider_nextText", 'Next');
	update_option($optPre."slider_prevText", 'Prev');
	update_option($optPre."slider_autoControls", 'true');
	update_option($optPre."slider_auto", 'false');
	update_option($optPre."slider_autoDirection", 'next');
	update_option($optPre."slider_autoHover", 'false');
	update_option($optPre."slider_category_opt", 'bxslider');*/
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

//Librerys
//require_once( 'inc/lib/metabox/init.php');

//Shortcode
require_once( 'inc/shortcode/slider_shortcode.php');

//Admin
//require_once( 'inc/admin/admin_option.php');

function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'inc/lib/metabox/init.php' );
    }
}
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );