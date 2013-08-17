<?php
/**
 * Adds support for various external plugins
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
 */


/**
* Add support for portfolio items for the Gallery Metabox plugin
* @since 2.0
*/
add_filter( 'be_gallery_metabox_post_types', 'custom_be_gallery_metabox_post_types' );
if ( !function_exists( 'custom_be_gallery_metabox_post_types' ) ) :
	function custom_be_gallery_metabox_post_types( $classes ) {			
			$post_types = array( 'portfolio' );
			$classes = array_merge( $classes, $post_types );		
			return $classes;
	}
endif;