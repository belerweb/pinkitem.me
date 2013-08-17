<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>

	<header id="page-heading">
		<h1 id="archive-title"><?php _e('Search Results For', 'wpex'); ?>: <?php the_search_query(); ?></h1>
	</header><!-- /page-heading -->

	<?php if ( have_posts() ) : ?>
  
        <div id="post" class="post clearfix">
            <?php while( have_posts() ) : the_post() ?>
        		<?php get_template_part( 'content', get_post_format() ) ?>
        	<?php endwhile; ?>
            <?php wpex_pagination(); ?>
        </div><!-- /post  -->
    
    <?php else : ?>
        
        <div id="post" class="post clearfix">
            <?php _e('No results found for that query.', 'wpex'); ?>
        </div><!-- /post  -->
        
    <?php endif; ?>
        
<?php get_sidebar(); ?>		  
<?php get_footer(); ?>