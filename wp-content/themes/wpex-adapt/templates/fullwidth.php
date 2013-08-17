<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 * Template Name: Full-Width
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article>
        <header id="page-heading">
            <h1><?php the_title(); ?></h1>		
        </header><!-- /page-heading -->
        <?php if ( has_post_thumbnail() ) : ?>
			<div id="page-featured-img" class="container clr">
				<?php the_post_thumbnail(); ?>
			</div><!-- #page-featured-img -->
		<?php endif; ?>
        <div class="post full-width clearfix">
        <?php the_content(); ?>
        </div><!-- /post -->
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>