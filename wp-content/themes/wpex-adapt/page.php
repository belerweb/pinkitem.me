<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>		
    </header><!-- /page-heading -->
    
    <?php if ( has_post_thumbnail() ) : ?>
		<div id="page-featured-img" class="container clr">
		<?php the_post_thumbnail(); ?>
		</div><!-- #page-featured-img -->
	<?php endif; ?>
    
    <article class="post clearfix">
        <div class="entry clearfix">	
            <?php the_content(); ?> 
        </div><!-- /entry -->    
        <?php comments_template(); ?>
    </article><!-- /post -->
    
<?php endwhile; ?>
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>