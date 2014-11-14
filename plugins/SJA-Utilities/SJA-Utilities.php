<?php
/* Plugin Name: SJA Utilities
Plugin URI: n/a
Description:  
Version: ongoing
Author: 
Author URI: 
*/

//    ini_set('display_errors', 'on');
//    error_reporting(E_ALL);

//ob_start();

	# Dashboard Admin Settings
//    if (!defined('Redux_TEXT_DOMAIN'))
//    {
//        require_once("admin/options.php");
//    }
	
	# Shortcodes for embedding objects into posts/pages in Wordpress
//    include("Shortcodes/algeo.php");
//	include("Shortcodes/sja_show_posts.php");
	include("Shortcodes/grid-layout.php");
	
//	include("widgets/slide.php");
//	include("widgets/slide-css.php");
//    include('widgets/slider-widget.php');
//	include("widgets/aq_resizer.php");
//    include("widgets/ad-widget.php");

    # Functions
    include("library/functions.php");
include("widgets/1830.php");
include("widgets/adsense.php");
//include("Shortcodes/etickets.php");
//include("widgets/1830.php");
//    include("library/sja-debug.php");
//    include('library/sja-banner-wide.php');
	
	# Stylesheets
    # Enqueue plugin for basic styling of elements
    add_action( 'wp_enqueue_scripts', 'safely_add_stylesheet' );

    function safely_add_stylesheet() {

        if (sja_get_from_array($_SERVER,'REQUEST_URI') == '/'){
            wp_enqueue_style( 'gridlayout-css', plugins_url('css/sja_gridlayout_style.css', __FILE__) );
        }
    }


    function safely_add_slider_css(){
        wp_enqueue_style( 'sjawp-slider-css', plugins_url('css/banner_slider_widget.css', __FILE__) );
    }
    add_action( 'wp_enqueue_scripts', 'safely_add_slider_css' );

function sjawp_load_admin_only_scripts(){

    # Stylesheet for admin
    $stylesheetpath = plugins_url(). "/SJA-Utilities/css/home.css";
    wp_register_style( 'sja-home-override', $stylesheetpath, false, '1.0.0' );
    wp_enqueue_style( 'sja-home-override' );

//    echo 'running';

}
add_action( 'wp_enqueue_scripts', 'sjawp_load_admin_only_scripts' ,0);


	add_filter( 'page_template', 'wpa3396_page_template' );
	function wpa3396_page_template( $page_template )
	{
		if ( is_page( 'my-custom-page-slug' ) ) {
			$page_template = dirname( __FILE__ ) . 'templates/template-full-page.php';
		}
		return $page_template;
	}