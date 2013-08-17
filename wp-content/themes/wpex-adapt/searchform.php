<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'to search type and hit enter', 'placeholder', 'wpex' ); ?>" />
</form>