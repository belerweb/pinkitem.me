<?php
/**
 * Changes custom tanomy labels based on theme options settings.
 * @package Adapt WordPress Theme
 * @since 2.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 */



/**
* Portfolio Cats & Tags
* @since 2.0
*/

// Cats
if ( ! function_exists( 'wpex_custom_portfolio_category_args' ) ) {
	function wpex_custom_portfolio_category_args( $args ) {
		
		//post name based on theme options
		$post_type_name = ( wpex_get_data('portfolio_labels','Portfolio') ) ? wpex_get_data('portfolio_labels','Portfolio') : 'Portfolio';
		$tax_slug = ( wpex_get_data('portfolio_cat_slug','portfolio-category') ) ? wpex_get_data('portfolio_cat_slug','portfolio-category') : 'portfolio-category';
		
		$taxonomy_portfolio_category_labels = array(
			'name' => $post_type_name . ' '. __( 'Categories', 'wpex' ),
			'singular_name' => $post_type_name . ' '. __( 'Category', 'wpex' ),
			'search_items' => __( 'Search','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'popular_items' => __( 'Popular','wpex') .' '. $post_type_name .' '. __('Categories', 'wpex' ),
			'all_items' => __( 'All','wpex') .' '. $post_type_name .' '. __('Categories', 'wpex' ),
			'parent_item' => __( 'Parent','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'parent_item_colon' => __( 'Parent','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'edit_item' => __( 'Edit','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'update_item' => __( 'Update','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'add_new_item' =>__( 'Add New','wpex') .' '. $post_type_name .' '. __('Category', 'wpex' ),
			'new_item_name' => __( 'New','wpex') .' '. $post_type_name .' '. __('Category name', 'wpex' ),
			'separate_items_with_commas' => __( 'Seperate','wpex') .' '. $post_type_name .' '. __('categories with commas', 'wpex' ),
			'add_or_remove_items' => __( 'Add or remove','wpex') .' '. $post_type_name .' '. __('categories', 'wpex' ),
			'choose_from_most_used' => __( 'Choose from the most used','wpex') .' '. $post_type_name .' '. __('categories', 'wpex' ),
			'menu_name' => $post_type_name .' '. __('Categories', 'wpex' ),
		);

		$custom_taxonomy_portfolio_category_args = array(
			'labels' => $taxonomy_portfolio_category_labels,
			'rewrite' => array( 'slug' => $tax_slug )
		);
		
		return $custom_taxonomy_portfolio_category_args + $args;
			
	}
	add_filter( 'symple_taxonomy_portfolio_category_args', 'wpex_custom_portfolio_category_args' );
}


// Tags
if ( ! function_exists( 'wpex_custom_portfolio_tag_args' ) ) {
	function wpex_custom_portfolio_tag_args( $args ) {
		
		//post name based on theme options
		$post_type_name = ( wpex_get_data('portfolio_labels','Portfolio') ) ? wpex_get_data('portfolio_labels','Portfolio') : 'Portfolio';
		$tax_slug = ( wpex_get_data('portfolio_tag_slug','portfolio-tag') ) ? wpex_get_data('portfolio_tag_slug','portfolio-tag') : 'portfolio-tag';
		
		$taxonomy_portfolio_tag_labels = array(
			'name' => $post_type_name . ' '. __( 'Tags', 'wpex' ),
			'singular_name' => $post_type_name . ' '. __( 'Tag', 'wpex' ),
			'search_items' => __( 'Search','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'popular_items' => __( 'Popular','wpex') .' '. $post_type_name .' '. __('Tags', 'wpex' ),
			'all_items' => __( 'All','wpex') .' '. $post_type_name .' '. __('Tags', 'wpex' ),
			'parent_item' => __( 'Parent','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'parent_item_colon' => __( 'Parent','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'edit_item' => __( 'Edit','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'update_item' => __( 'Update','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'add_new_item' =>__( 'Add New','wpex') .' '. $post_type_name .' '. __('Tag', 'wpex' ),
			'new_item_name' => __( 'New','wpex') .' '. $post_type_name .' '. __('Tag name', 'wpex' ),
			'separate_items_with_commas' => __( 'Seperate','wpex') .' '. $post_type_name .' '. __('tags with commas', 'wpex' ),
			'add_or_remove_items' => __( 'Add or remove','wpex') .' '. $post_type_name .' '. __('tags', 'wpex' ),
			'choose_from_most_used' => __( 'Choose from the most used','wpex') .' '. $post_type_name .' '. __('tags', 'wpex' ),
			'menu_name' => $post_type_name .' '. __('Tags', 'wpex' ),
		);

		$custom_taxonomy_portfolio_tag_args = array(
			'labels' => $taxonomy_portfolio_tag_labels,
			'rewrite' => array( 'slug' => $tax_slug )
		);
		
		return $custom_taxonomy_portfolio_tag_args + $args;
			
	}
	add_filter( 'symple_taxonomy_portfolio_tag_args', 'wpex_custom_portfolio_tag_args' );
}