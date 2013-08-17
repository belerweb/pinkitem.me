<?php
/**
 * Create options for this theme
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 1.0
 */

add_action( 'init','of_options' );

if (!function_exists( 'of_options' )) {
	
	function of_options() {
			
		//Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array ( 
			"disabled"	=> array (
			"placebo"	=> "placebo", //REQUIRED!
			), 
			"enabled"	=> array (
				"placebo"			=> "placebo", //REQUIRED!
				"home_tagline"		=> __( 'Site Description','wpex' ),
				"home_slider"		=> __( 'Slider','wpex' ),
				"home_content"		=> __( 'Page Content','wpex' ),
				"home_highlights"	=> __( 'Highlights','wpex' ),
				"home_portfolio"	=> __( 'Portfolio','wpex' ),
				"home_blog"			=> __( 'Blog','wpex' )
			),
		);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();



	// GENERAl SETTINGS
	$of_options[] = array( 
		"name"	=> "General",
		"type"	=> "heading"
	);

	//logos + fav
	$of_options[] = array(
		"name"	=> __( 'Custom Logo','wpex' ),
		"desc"	=> __( 'Use this field to upload your custom logo for use in the theme header','wpex' ),
		"id"	=> "custom_logo",
		"std"	=> "",
		"type"	=> "media"
	);
	
	$of_options[] = array(
		"name"	=> __("Retina Logo (optional)", "wpex"),
		"desc"	=> __("Upload your custom retina ready logo. This should be 2x the size of your standard logo.", "wpex"),
		"std"	=> "",
		"id"	=> "custom_retina_logo",
		"type"	=> "media",
	);
	
	$of_options[] = array(
		"name"	=> __("Standard Logo Height", "wpex"),
		"desc"	=> __("Enter your standard logo height in pixels. Used for retina purposes. Should be 1/2 the height of your retina logo dimensions and do not include the px. Example: 150", "wpex"),
		"std"	=> "",
		"id"	=> "logo_height",
		"type"	=> "text",
	);
		
	$of_options[] = array(
		"name"	=> __("Standard Logo Width", "wpex"),
		"desc"	=> __("Enter your standard logo width in pixels. Used for retina purposes. Should be 1/2 the width of your retina logo dimensions and do not include the px. Example: 80", "wpex"),
		"std"	=> "",
		"id"	=> "logo_width",
		"type"	=> "text",
	);
						
	$of_options[] = array(
		"name"	=> __( 'Custom Favicon','wpex' ),
		"desc"	=> __( 'Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.','wpex' ),
		"id"	=> "custom_favicon",
		"std"	=> "",
		"type"	=> "media"
	);
	
	//misc
	$of_options[] = array( 
		"name"	=> __( 'Responsiveness','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the responsive CSS for this theme?','wpex' ),
		"id"	=> "responsive",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
	
	$of_options[] = array( 
		"name"	=> __( 'Retina Support','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the built-in retina support? If using a caching system such as W3Total Cache or hosted on WPEngine, it is best to disable. When enabled this will create a second version of every cropped image that is 2x as large and save it on your server.','wpex' ),
		"id"	=> "builtin_retina",
		"std"	=> '0',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);

	// HOME SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Home','wpex' ),
		"type"	=> "heading"
	);
								
	$of_options[] = array(
		"name"	=> __( 'Homepage Layout Manager','wpex' ),
		"desc"	=> __( 'Organize how you want the layout to appear on the homepage.','wpex' ),
		"id"	=> "homepage_blocks",
		"std"	=> $of_options_homepage_blocks,
		"type"	=> "sorter"
	);
	
	//home highlights				
	$of_options[] = array(
		"name"	=> "",
		"desc"	=> "",
		"id"	=> "subheading",
		"std"	=> "<h3 style=\"margin: 0;\">". __( 'Highlights', 'wpex' ) ."</h3>",
		"icon"	=> true,
		"type"	=> "info"
	);
					
	$of_options[] = array( 
		"name"	=> __( 'Highlights Heading','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the highlights section heading?','wpex' ),
		"id"	=> "home_highlights_heading",
		"std"	=> '0',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
	
	$of_options[] = array( 
		"name"	=> __( 'Highlights Custom Heading','wpex' ),
		"desc"	=> __( 'Custom heading text for the homepage highlights section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.','wpex' ),
		"id"	=> "home_highlights_heading_txt",
		"std"	=> '',
		"fold"	=> 'home_highlights_heading',
		"type"	=> "text"
	);		
					
	//home portfolio				
	$of_options[] = array(
		"name"	=> "",
		"desc"	=> "",
		"id"	=> "subheading",
		"std"	=> "<h3 style=\"margin: 0;\">". __( 'Portfolio', 'wpex' ) ."</h3>",
		"icon"	=> true,
		"type"	=> "info"
	);
					
	$of_options[] = array( 
		"name"	=> __( 'Portfolio Heading','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the portfolio section heading?','wpex' ),
		"id"	=> "home_port_heading",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	); 
	
	$of_options[] = array( 
		"name"	=> __( 'Portfolio Custom Heading','wpex' ),
		"desc"	=> __( 'Custom heading text for the homepage portfolio section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.','wpex' ),
		"id"	=> "home_port_heading_txt",
		"std"	=> '',
		"fold"	=> 'home_port_heading',
		"type"	=> "text"
	);
									
	$of_options[] = array(
		"name"	=> __( 'Portfolio Count','wpex' ),
		"desc"	=> __( 'How many portfolio posts do you wish to show for the portfolio section?','wpex' ),
		"id"	=> "home_port_count",
		"std"	=> "4",
		"type"	=> "text"
	);
					
	$of_options[] = array(
		"name"		=> __( 'Portfolio Category','wpex' ),
		"desc"		=> __( 'Select a category for your homepage recent blog items.','wpex' ),
		"id"		=> "home_port_cat",
		"std"		=> '',
		"type"		=> "select",
		"options"	=> wpex_port_cat_array()
	);

	
	//home blog				
	$of_options[] = array(
		"name"	=> "",
		"desc"	=> "",
		"id"	=> "subheading",
		"std"	=> "<h3 style=\"margin: 0;\">". __( 'Blog', 'wpex' ) ."</h3>",
		"icon"	=> true,
		"type"	=> "info"
	);
					
	$of_options[] = array( 
		"name"	=> __( 'Blog Heading','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the blog section heading?','wpex' ),
		"id"	=> "home_blog_heading",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	); 
	
	$of_options[] = array( 
		"name"	=> __( 'Blog Intro Custom Heading','wpex' ),
		"desc"	=> __( 'Custom heading text for the homepage blog section.<br /><br /><strong>Note:</strong> Leave blank to show the translatable/localized default string.','wpex' ),
		"id"	=> "home_blog_heading_txt",
		"std"	=> '',
		"fold"	=> 'home_blog_heading',
		"type"	=> "text"
	);
					
									
	$of_options[] = array(
		"name"	=> __( 'Blog Count','wpex' ),
		"desc"	=> __( 'How many blog posts do you wish to show for the blog section?','wpex' ),
		"id"	=> "home_blog_count",
		"std"	=> "4",
		"type"	=> "text"
	);
					
	$of_options[] = array(
		"name"		=> __( 'Blog Category','wpex' ),
		"desc"		=> __( 'Select a category for your homepage recent blog items.','wpex' ),
		"id"		=> "home_blog_cat",
		"std"		=> '',
		"type"		=> "select",
		"options"	=> wpex_blog_cat_array()
	);
		
	// SLIDER SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Slider','wpex' ),
		"type"	=> "heading"
	);
				
	$of_options[] = array(
		"name"	=>  __( 'Slider Height','wpex' ),
		"desc"	=>  __( 'Select a custom height for the slider in px. If left blank the theme will not crop any images vertically so you can have different height slides.','wpex' ),
		"id"	=> "slider_height",
		"std"	=> "400",
		"type"	=> "text"
	);	

	$of_options[] = array(
		"name"		=>  __( 'Animation','wpex' ),
		"desc"		=>  __( 'Select your desired slider animation.','wpex' ),
		"id"		=> "slider_animation",
		"std"		=> "fade",
		"type"		=> "select",
		"options"	=> array(
			'fade'	=> 'fade',
			'slide'	=> 'slide',
		)
	);
					
	$of_options[] = array(
		"name"		=>  __( 'Animation Direction','wpex' ),
		"desc"		=>  __( 'Select your desired direction for the slider animation.<br /><br /><strong>Note:</strong> If you choose vertical slides, all slides must be the same height to prevent issues.','wpex' ),
		"id"		=> "slider_direction",
		"std"		=> "horizontal",
		"type"		=> "select",
		"options"	=> array(
			'horizontal'	=> 'horizontal',
			'vertical'		=> 'vertical',
		)
	);
					
	$of_options[] = array(
		"name"	=> __( 'Auto Slideshow','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the automatic slideshow','wpex' ),
		"id"	=> "slider_slideshow",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
					
	$of_options[] = array(
		"name"	=> __( 'Randomize Slideshow','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable random slide order.','wpex' ),
		"id"	=> "slider_randomize",
		"std"	=> '0',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
					
	$of_options[] = array(
		"name"	=> __( 'Slideshow Speed', 'wpex' ),
		"desc"	=> __( 'Adjust the slideshow speed of your homepage slider. Time in milliseconds','wpex' ),
		"id"	=> "slider_slideshow_speed",
		"std"	=> "7000",
		"min"	=> "2000",
		"step"	=> "500",
		"max"	=> "20000",
		"type"	=> "sliderui" ,
	);
				
	$of_options[] = array(
		"name"	=>  __( 'Slider Alternate','wpex' ),
		"desc"	=>  __( 'Use this field to insert a shortcode or other HTML to replace the default flexslider','wpex' ),
		"id"	=> "slider_alternative",
		"std"	=> "",
		"type"	=> "textarea",
	);
		
		
	// PORTFOLIO SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Portfolio','wpex' ),
		"type"	=> "heading"
	);
		
	$of_options[] = array(
			'name'	=> __( 'Custom Portfolio Labels', 'wpex' ),
			'desc'	=> __( 'Easily change the name of your post type here to say something else.<br /><br /><strong>IMPORTANT</strong>: Refresh your page to see the change live in your dashboard.', 'wpex' ),
			'id'	=> 'portfolio_labels',
			"std"	=> 'Portfolio',
			'type'	=> 'text'
		);
			
	$of_options[] = array(
		'name'	=> __( 'Custom Portfolio Slug', 'wpex' ),
		'desc'	=> __( 'Easily change the slug of your post type here to say something else.<br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex' ),
		'id'	=> 'portfolio_slug',
		"std"	=> 'portfolio',
		'type'	=> 'text'
	);
			
	$of_options[] = array(
		'name'	=> __( 'Custom Portfolio Category Slug', 'wpex' ),
		'desc'	=> __( 'Easily change the slug of your category taxonomy here to say something else. <br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex' ),
		'id'	=> 'portfolio_cat_slug',
		"std"	=> 'portfolio-category',
		'type'	=> 'text'
	);
			
	$of_options[] = array(
		'name'	=> __( 'Custom Portfolio Tag Slug', 'wpex' ),
		'desc'	=> __( 'Easily change the slug of your tag taxonomy here to say something else. <br /><br /><strong>IMPORTANT</strong>: You must re-save your permalinks after changing this setting.', 'wpex' ),
		'id'	=> 'portfolio_tag_slug',
		"std"	=> 'portfolio-tag',
		'type'	=> 'text',
	);
			
	$of_options[] = array(
	"name"	=> __( 'Posts Per Page','wpex' ),
							"desc"	=> __( 'How many posts per page to show for this post type archives.','wpex' ),
							"id"	=> "portfolio_pagination",
							"std"	=> '12',
							"type"	=> "text"
					);


		
	// BLOG SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Blog','wpex' ),
		"type"	=> "heading"
	);	
	
	$of_options[] = array(
		"name"	=> __( 'Custom Blog Title','wpex' ),
		"desc"	=> __( 'Enter your custom blog title. Used for the main heading on single posts. To change your main blog page title edit the page title in your page editor.','wpex' ),
		"id"	=> "blog_title",
		"std"	=> '',
		"type"	=> "text"
	);
		
	$of_options[] = array(
		'name'	=> __( 'Featured Images On Single Posts?', 'wpex' ),
		'desc'	=> __( 'Display featured images on single blog posts?', 'wpex' ),
		'id'	=> 'blog_single_thumbnail',
		"std"	=> '1',
			"on"	=> __( 'Enable','wpex' ),
			"off"	=> __( 'Disable','wpex' ),
			"type"	=> "switch"
		); 
		
	$of_options[] = array(
		'name'	=> __( 'Entry Excerpts', 'wpex' ),
		'desc'	=> __( 'Display excerpts on your standard post entries instead of the full posts?', 'wpex' ),
		'id'	=> 'blog_exceprt',
		"std"	=> '1',
			"on"	=> __( 'Enable','wpex' ),
			"off"	=> __( 'Disable','wpex' ),
			"type"	=> "switch"
		); 
			
	$of_options[] = array(
		'name'	=> __( 'Display Tags', 'wpex' ),
		'desc'	=> __( 'Display current post tags at the bottom of standard posts?', 'wpex' ),
		'id'	=> 'blog_tags',
		"std"	=> '1',
			"on"	=> __( 'Enable','wpex' ),
			"off"	=> __( 'Disable','wpex' ),
			"type"	=> "switch"
	);		

	// FOOTER SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Footer','wpex' ),
		"type"	=> "heading"
	);
	
	$of_options[] = array(
		'name'	=> __( 'Widgetized Footer', 'wpex' ),
		'desc'	=> __( 'Display widgetized Footer?', 'wpex' ),
		'id'	=> 'widgetized_footer',
		"std"	=> '1',
			"on"	=> __( 'Enable','wpex' ),
			"off"	=> __( 'Disable','wpex' ),
			"type"	=> "switch"
	);
					
	$of_options[] = array(
		"name"	=> __( 'Copyright Text','wpex' ),
		"desc"	=> __( 'You can use the following shortcodes in your footer text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]','wpex' ),
		"id"	=> "footer_text",
		"std"	=> "",
		"type"	=> "textarea",
	);
	
	// SLIDER SETTINGS	
	$of_options[] = array(
		"name"	=> __( 'Post Types','wpex' ),
		"type"	=> "heading"
	);
				
	$of_options[] = array(
		"name"	=> __( 'Enable Slides Post Type','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the built-in Slider post type? Refresh your page after saving to see your changes.','wpex' ),
		"id"	=> "slides_post_type",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
	
	$of_options[] = array(
		"name"	=> __( 'Enable Highlights Post Type','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the built-in Highlights post type? Refresh your page after saving to see your changes.','wpex' ),
		"id"	=> "highlights_post_type",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);
	
	$of_options[] = array(
		"name"	=> __( 'Enable Portfolio Post Type','wpex' ),
		"desc"	=> __( 'Do you wish to enable or disable the built-in Portfolio post type? Refresh your page after saving to see your changes.','wpex' ),
		"id"	=> "portfolio_post_type",
		"std"	=> '1',
		"on"	=> __( 'Enable','wpex' ),
		"off"	=> __( 'Disable','wpex' ),
		"type"	=> "switch"
	);

	
	// TRACKING	
	$of_options[] = array(
		"name"	=> __( 'Tracking', 'wpex' ),
		"type"	=> "heading"
	);
	
	$of_options[] = array(
		"name"	=>	__( 'Tracking Code','wpex' ),
		"desc"	=>	__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.','wpex' ),
		"id"	=>	"google_analytics",
		"std"	=>	"",
		"type"	=>	"textarea"
	);
				
				
	// BACKUP
	$of_options[] = array(
		"name"	=> __( 'Backup', 'wpex' ),
		"type"	=> "heading"
	);
				
	$of_options[] = array(
		"name"	=> __( 'Backup and Restore Options', 'wpex' ),
		"id"	=> "of_backup",
		"std"	=> "",
		"type"	=> "backup",
		"desc"	=> __( 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'wpex' ),
	);
					
	$of_options[] = array(
		"name"	=> __( 'Transfer Theme Options Data', 'wpex' ),
		"id"	=> "of_transfer",
		"std"	=> "",
		"type"	=> "transfer",
		"desc"	=> __( 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', 'wpex' ),
	);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>