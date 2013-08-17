<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

    <header id="page-heading">
        <h1 class="page-title"><?php _e('404 Error',''); ?></h1>		
    </header><!-- /page-heading -->
    
    <div class="post clearfix">
        <div class="entry clearfix">		
            <p><?php _e('Sorry, the page you were looking for could not be found.',''); ?>.</p>
        </div><!-- /entry -->
    </div><!-- /post -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>