<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>


<?php get_header(); ?>

	<div class="post clearfix">
        <?php if ( have_posts() ) : ?>
        	<?php while (have_posts()) : the_post(); ?> 
            	<?php get_template_part( 'content', get_post_format() ) ?>
            <?php endwhile; ?>  	
        <?php endif; ?>
        <?php wpex_pagination(); ?>
    </div><!-- /post -->
    
<?php get_sidebar(); ?>
<?php get_footer(); ?>