<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
*/
 
if ( ! function_exists( 'wpex_img' ) ) {

	function wpex_img($args){

		//slider
		if( $args == 'slider_width' ) return '940';
		
		if( $args == 'slider_height' ) {
			if ( wpex_get_data('slider_height','400') !== '' ) {
				 return wpex_get_data('slider_height','400');
			} else {
				return 9999;
			}
		}
		
		if( $args == 'slider_crop' ) { 
			if ( wpex_get_data('slider_height','400') !== '' ) {
				return true;
			} else {
				return false;
			}
		}

		//blog entries
		if( $args == 'blog_entry_width' ) return '230';
		if( $args == 'blog_entry_height' ) return '180';
		if( $args == 'blog_entry_crop' ) return true;

		//blog post
		if( $args == 'blog_post_width' ) return '230';
		if( $args == 'blog_post_height' ) return '180';
		if( $args == 'blog_post_crop' ) return true;

		//portfolio entries
		if( $args == 'portfolio_entry_width' ) return '230';
		if( $args == 'portfolio_entry_height' ) return '180';
		if( $args == 'portfolio_entry_crop' ) return true;
		
		//portfolio post
		if( $args == 'portfolio_post_width' ) return '535';
		if( $args == 'portfolio_post_height' ) return '9999';
		if( $args == 'portfolio_post_crop' ) return false;

	}

}