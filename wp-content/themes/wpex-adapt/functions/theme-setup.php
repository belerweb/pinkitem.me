<?php
/**
 * Lets setup our theme!
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 1.3
 */

add_action( 'after_setup_theme', 'wpex_setup' );
function wpex_setup() {
	
	// Localization support
	load_theme_textdomain( 'wpex', get_template_directory() .'/languages' );

	// Register navigation menus
	register_nav_menus (
		array(
			'menu' => __( 'Main', 'wpex' )
		)
	);
		
	// Add theme support
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );

}