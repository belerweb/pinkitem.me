<?php
if ( ! class_exists( 'Symple_Highlights_Post_Type' ) ) :
class Symple_Highlights_Post_Type {

	function __construct() {

		// Adds the highlights post type and taxonomies
		add_action( 'init', array( &$this, 'highlights_init' ), 0 );

		// Thumbnail support for highlights posts
		add_theme_support( 'post-thumbnails', array( 'hp_highlights' ) );

		// Adds columns in the admin view for thumbnail and taxonomies
		add_filter( 'manage_edit-hp_highlights_columns', array( &$this, 'hp_highlights_edit_columns' ) );
		add_action( 'manage_posts_custom_column', array( &$this, 'hp_highlights_column_display' ), 10, 2 );

		// Give the highlights menu item a unique icon
		add_action( 'admin_head', array( &$this, 'highlights_icon' ) );
	}
	

	function highlights_init() {

		/**
		 * Enable the Highlights custom post type
		 * http://codex.wordpress.org/Function_Reference/register_post_type
		 */

		$labels = array(
			'name'					=> __( 'Highlights', 'wpex' ),
			'singular_name'			=> __( 'Highlights Item', 'wpex' ),
			'add_new'				=> __( 'Add New Item', 'wpex' ),
			'add_new_item'			=> __( 'Add New Highlights Item', 'wpex' ),
			'edit_item'				=> __( 'Edit Highlights Item', 'wpex' ),
			'new_item'				=> __( 'Add New Highlights Item', 'wpex' ),
			'view_item'				=> __( 'View Item', 'wpex' ),
			'search_items'			=> __( 'Search Highlights', 'wpex' ),
			'not_found'				=> __( 'No highlights items found', 'wpex' ),
			'not_found_in_trash'	=> __( 'No highlights items found in trash', 'wpex' )
		);
		
		$args = array(
	    	'labels'			=> $labels,
	    	'public'			=> true,
			'supports'			=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'custom-fields', 'revisions' ),
			'capability_type'	=> 'post',
			'rewrite'			=> array("slug"	=> "highlights"), // Permalinks format
			'has_archive'		=> true
		); 
		
		$args = apply_filters('symple_highlights_args', $args);
		
		register_post_type( 'hp_highlights', $args );
	}

	/**
	 * Add Columns to Highlights Edit Screen
	 * http://wptheming.com/2010/07/column-edit-pages/
	 */

	function hp_highlights_edit_columns( $highlights_columns ) {
		$highlights_columns = array(
			"cb"					=> "<input type=\"checkbox\" />",
			"title"					=> __('Title', 'column name'),
			"highlights_thumbnail"	=> __('Thumbnail', 'wpex'),
			"author" 				=> __('Author', 'wpex'),
			"comments" 				=> __('Comments', 'wpex'),
			"date" 					=> __('Date', 'wpex'),
		);
		$highlights_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
		return $highlights_columns;
	}

	function hp_highlights_column_display( $highlights_columns, $post_id ) {

		// Code from: http://wpengineer.com/display-post-thumbnail-post-page-overview

		switch ( $highlights_columns ) {

			// Display the thumbnail in the column view
			case "highlights_thumbnail":
				$width = (int) 80;
				$height = (int) 80;
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

				// Display the featured image in the column view if possible
				if ( $thumbnail_id ) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				}
				if ( isset( $thumb ) ) {
					echo $thumb;
				} else {
					echo __('None', 'wpex');
				}
				break;
	
		}

	}

	/**
	 * Displays the custom post type icon in the dashboard
	 */

	function highlights_icon() { ?>
	    <style type="text/css" media="screen">
	        #menu-posts-hp_highlights .wp-menu-image {
	            background: url(<?php echo get_template_directory_uri(). '/images/post-types/highlights-icon.png'; ?>) no-repeat 6px 6px !important;
	        }
			#menu-posts-hp_highlights:hover .wp-menu-image, #menu-posts-hp_highlights.wp-has-current-submenu .wp-menu-image {
	            background-position: 6px -26px !important;
	        }
	    </style>
	<?php }

}

new Symple_Highlights_Post_Type;

endif;