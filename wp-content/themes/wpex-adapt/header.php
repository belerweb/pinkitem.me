<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 2.0
 */ ?>

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

    <header id="masterhead" class="clearfix">
        <div id="logo">
            <?php
                if( wpex_get_data( 'custom_logo' ) !== '' ) { ?>
                    <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo wpex_get_data( 'custom_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                <?php } else { ?>
                <a href="<?php bloginfo( 'url' ); ?>/" title="<?php bloginfo( 'name' ) ?>"><?php bloginfo( 'name' ); ?></a>
            <?php } ?>
        </div><!--  /logo -->
        <nav id="masternav" class="clearfix">
            <?php wp_nav_menu( array(
                'theme_location'	=> 'menu',
                'sort_column' 		=> 'menu_order',
                'menu_class' 		=> 'sf-menu',
                'fallback_cb' 		=> 'default_menu'
            )); ?>
        </nav><!-- /masternav -->
    </header><!-- /masterhead -->
    
<div id="main" class="clearfix">