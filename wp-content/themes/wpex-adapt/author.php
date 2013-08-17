<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>

    <div id="page-heading">
            <h1><?php _e('Posts by',''); ?>: <?php the_author(); ?></h1>		
    </div><!-- /page-heading -->
    
    <div id="post" class="post clearfix">
    	<?php rewind_posts(); ?>
        <?php while( have_posts() ) : the_post() ?>
        	<?php get_template_part( 'content', get_post_format() ) ?>
        <?php endwhile; ?>
        <?php wpex_pagination(); ?>
    </div><!-- /post -->
    
<?php endif; ?>

<?php get_sidebar(); ?>	   
<?php get_footer(); ?>