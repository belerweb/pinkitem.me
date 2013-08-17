<?php
/**
 * Template Name: Landing Page
 *
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<!DOCTYPE html>

<!-- WordPress Theme by WPExplorer (http://www.wpexplorer.com) -->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( wpex_get_data('custom_favicon') ) : ?>
    	<link rel="shortcut icon" href="<?php echo wpex_get_data('custom_favicon'); ?>" />
    <?php endif; ?>
	<?php wp_head(); ?>
</head>

<!-- Begin Body -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">
	<div id="main" class="clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
        <article class="post full-width clearfix" style="padding-top: 25px;">
        	<?php the_content(); ?>
        </article><!-- /post -->
    <?php endwhile; ?>
    </div><!-- /main --> 
</div><!-- /wrap --> 

<?php wp_footer(); ?>
</body>
</html>