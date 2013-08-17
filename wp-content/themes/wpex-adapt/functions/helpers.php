<?php
/**
 * Create array of portfolio categories
 *
 * @since 2.0
*/
if ( ! function_exists( 'wpex_port_cat_array' ) ) {
	function wpex_port_cat_array() {
		$port_categories = array();  
		if ( !taxonomy_exists( 'portfolio_category' ) ) return array( __( 'No terms', 'wpex' ) );
		$port_categories_obj = get_terms( 'portfolio_category', array( 'hide_empty'	=> '0' ) );
		foreach ($port_categories_obj as $port_cat) {
			$port_categories[$port_cat->term_id] = $port_cat->slug;}
		$categories_tmp = array_unshift($port_categories, "All");
		return $port_categories;
	}
}


/**
 * Create array of standard categories
 *
 * @since 2.0
*/
if ( ! function_exists( 'wpex_blog_cat_array' ) ) {
	function wpex_blog_cat_array() {
		$blog_categories = array();  
		$blog_categories_obj 	= get_categories( 'hide_empty=0' );
		foreach ($blog_categories_obj as $blog_cat) {
		    $blog_categories[$blog_cat->cat_ID] = $blog_cat->slug;}
		$categories_tmp = array_unshift($blog_categories, "All");
		return $blog_categories;
	}
}