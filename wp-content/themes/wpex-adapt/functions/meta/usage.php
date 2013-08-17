<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'wpex_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function wpex_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'wpex_';
	
	// Highlights
	$meta_boxes[] = array(
		'id'         => 'wpex_slides_metabox',
		'title'      => __('Slide Options','wpex'),
		'pages'      => array( 'slides', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name'	 => __('Video URL','wpex'),
				'desc'	 =>  __('Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpex'),
				'id'	 => $prefix . 'slides_video',
				'type'	 => 'oembed',
				'std'	 => '',
			),
			array(
				'name'	 => __('Link URL','wpex'),
				'desc'	 =>  __('Enter a URL to link this slide to. Example: http://authenticthemes.com', 'wpex') .'</a>',
				'id'	 => $prefix . 'slides_url',
				'type'	 => 'text',
				'std'	 => '',
			),
			array(
				'name'	 	=> __('Link Target','wpex'),
				'desc'	 	=>  __('Select a target for the URL.', 'wpex') .'</a>',
				'id'	 	=> $prefix . 'slides_url_target',
				'type'		=> 'select',
				'std'		=> 'self',
				'options' => array(
					array( 'name' => 'Self', 'value' => 'self', ),
					array( 'name' => 'Blank', 'value' => 'blank', ),
				),
			),
		),
	);
	
	// Highlights
	$meta_boxes[] = array(
		'id'         => 'wpex_highlights_metabox',
		'title'      => __('Highlight Options','wpex'),
		'pages'      => array( 'hp_highlights', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name'		=> __('URL', 'wpex'),
				'id'		=> $prefix .'highlights_url',
				'type'		=> 'text',
				'options'	=> '',
				'std' 		=> '',
				'desc' 		=> __('Enter a custom url for this higlight.', 'wpex')
			),
		),
	);


	// Portfolio
	$meta_boxes[] = array(
		'id'         => 'wpex_portfolio_metabox',
		'title'      => __('Project Options','wpex'),
		'pages'      => array( 'portfolio', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Post Media Alternative', 'wpex'),
				'id' => $prefix .'portfolio_post_media_alternative',
				'desc' => __('Enter content here to override the default featured image/slider area. You can use this for videos, multiple images...etc.', 'wpex'),
				'type' => 'wysiwyg',
				'std' => '',
				'options' => array(	'textarea_rows' => 5, ),
			),
		),
	);
	

	return $meta_boxes;
}

add_action( 'init', 'cmb_initializewpexmeta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initializewpexmeta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once( get_template_directory() .'/functions/meta/init.php');

}