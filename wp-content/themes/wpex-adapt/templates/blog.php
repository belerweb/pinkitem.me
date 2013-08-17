<?php
/**
 * Template Name: Blog
 *
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>		
    </header>
    
    <div class="post clearfix">
		<?php
        query_posts(
			array(
				'post_type'	=> 'post',
				'paged'		=>$paged
        ) );
        ?>
        <?php if ( have_posts() ) : ?>
        	<?php while (have_posts()) : the_post(); ?> 
            	<?php get_template_part( 'content', get_post_format() ) ?>
            <?php endwhile; ?>  	
        <?php endif; ?>
        <?php wpex_pagination(); wp_reset_query(); ?>
    </div><!-- /post -->

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>