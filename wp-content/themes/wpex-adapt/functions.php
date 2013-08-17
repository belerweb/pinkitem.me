<?php
/**
 * Adapt functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
 */



/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'WPEX_JS_DIR', get_template_directory_uri().'/js' );
define( 'WPEX_CSS_DIR', get_template_directory_uri().'/css' );



/*--------------------------------------*/
/* Globals
/*--------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 980;
require_once( get_template_directory() .'/functions/theme-setup.php');



/*--------------------------------------*/
/* Admin Panel
/*--------------------------------------*/
require_once ( get_template_directory() .'/admin/index.php' );
require_once( get_template_directory() .'/functions/return-smof-data.php' );



/*--------------------------------------*/
/* Include functions
/*--------------------------------------*/
require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );
require_once ( get_template_directory() .'/functions/helpers.php' );

if ( wpex_get_data( 'portfolio_post_type' , '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types-taxonomies/register-portfolio.php' );
	require_once( get_template_directory() .'/functions/helpers.php' );
}
if ( wpex_get_data( 'highlights_post_type' , '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types-taxonomies/register-highlights.php' );
}
if ( wpex_get_data( 'slides_post_type' , '1' ) == '1' ) {
	require_once( get_template_directory() .'/functions/post-types-taxonomies/register-slides.php' );
}

require_once( get_template_directory() .'/functions/post-types-taxonomies/taxonomies-labels.php' );
require_once( get_template_directory() .'/functions/post-types-taxonomies/post-type-labels.php' );

if( is_admin() ) {	
	require_once ( get_template_directory() .'/functions/meta/usage.php' );	
} else {
	require_once( get_template_directory() .'/functions/scripts.php' );
	require_once( get_template_directory() .'/functions/excerpts.php' );
	require_once( get_template_directory() .'/functions/posts-per-page.php' );
	require_once( get_template_directory() .'/functions/external-plugins-support.php' );
	require_once( get_template_directory() .'/functions/comments-callback.php');
	require_once( get_template_directory() .'/functions/image-default-sizes.php');
	require_once( get_template_directory() .'/functions/pagination.php');
	require_once( get_template_directory() .'/functions/aqua-resizer.php');
	
	if ( wpex_get_data ( 'builtin_retina', '0' ) == '1' ) {
		require_once( get_template_directory() .'/functions/aqua-resizer-ratio-check.php');
	}
	
}