<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
*/

add_action('wp_enqueue_scripts','wpex_load_scripts');
function wpex_load_scripts() {
	
	/*******
	*** CSS
	*******************/	
	wp_enqueue_style( 'adapt-style', get_stylesheet_uri(), '2.0' );
	wp_enqueue_style( 'google-font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyphoto.css', 'style' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style' );
	if ( wpex_get_data( 'responsive', '1' ) == '1' ) {
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', 'style' );
	}
	
	
	/*******
	*** jQuery
	*******************/
	wp_enqueue_script( 'jquery' );	
	wp_enqueue_script( 'fitvids', WPEX_JS_DIR. '/fitvids.js', array( 'jquery' ), true );
	wp_enqueue_script( 'hoverintent', WPEX_JS_DIR. '/hoverintent.js', array( 'jquery' ), true );
	wp_enqueue_script( 'superfish', WPEX_JS_DIR . '/superfish.js', array( 'jquery', 'hoverintent' ), true );
	wp_enqueue_script( 'flexslider', WPEX_JS_DIR . '/flexslider.js', array( 'jquery' ), true );
	wp_enqueue_script( 'prettyphoto', WPEX_JS_DIR . '/prettyphoto.js', array( 'jquery' ), true );
	wp_enqueue_script( 'wpex-global', WPEX_JS_DIR . '/global.js', array( 'jquery', 'superfish', 'hoverintent', 'prettyphoto', 'fitvids' ), true );
	wp_localize_script( 'wpex-global', 'wpexLocalize', array( 'responsiveMenuText' => wpex_get_data( 'responsive_menu_text', __('Menu','wpex') ) ) );
	
	if ( wpex_get_data( 'responsive', '1' ) == '1' ) {
		wp_enqueue_script( 'uniform', WPEX_JS_DIR . '/uniform.js', array( 'jquery' ), true );
		wp_enqueue_script( 'wpex-responsive', WPEX_JS_DIR . '/responsive.js', array( 'jquery', 'uniform' ), true );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script('comment-reply');
	}
	
}



/**
* Browser Specific CSS
* @Since 1.0
*/
add_action('wp_head', 'wpex_browser_dependencies');
if ( !function_exists('wpex_browser_dependencies') ) {
	function wpex_browser_dependencies() {
		
		echo '<!--[if lt IE 9]>';
			echo '<link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR .'/ancient-ie.css" />';
			echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<![endif]-->';
		
		echo '<!--[if IE 7]>';
			echo '<link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR .'/font-awesome-ie7.min.css" media="screen" />';
		echo '<![endif]-->';
		
	}
}


/**
* Retina Logo Support
* @Since 1.0
*/
add_action('wp_head', 'wpex_retina_logo');
	
if ( !function_exists( 'wpex_retina_logo' ) ) {
	
	function wpex_retina_logo() {
		
		if( wpex_get_data('custom_retina_logo') && wpex_get_data('logo_height') && wpex_get_data('logo_width') ) {
		
		// Get retina options from theme panel and set vars
		$logo_url = wpex_get_data( 'custom_retina_logo' );
		$logo_width = wpex_get_data( 'logo_height' );
		$logo_height = wpex_get_data( 'logo_width' );
				
		$wpex_retina_logo_js = '<!-- Retina Logo -->
		<script type="text/javascript">
		jQuery(function($){
			if (window.devicePixelRatio == 2) {
				$("#masterhead #logo img").attr("src", "'. $logo_url .'");
				$("#masterhead #logo img").attr("width", "'. $logo_width .'");
				$("#masterhead #logo img").attr("height", "'. $logo_height .'");
			 }
		});
		</script>';	
		
		// Remove spacing from js for speed
		$wpex_retina_logo_js =  preg_replace( '/\s+/', ' ', $wpex_retina_logo_js );
		
		// Output the custom retina logo js
		echo $wpex_retina_logo_js;
		
		} else {
			return;	
		}
		
	}
	
}



/**
* Site Tracking
* @Since 1.0
*/
add_action( 'wp_head', 'wpex_site_tracking' );
if ( !function_exists( 'wpex_site_tracking' ) ) {
	function wpex_site_tracking() {
		if ( wpex_get_data( 'google_analytics' ) ) {
			echo wpex_get_data( 'google_analytics' );
		}
	}
}