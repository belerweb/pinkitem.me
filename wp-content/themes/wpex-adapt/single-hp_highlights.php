<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <article class="post clearfix">
        <header><h1 class="single-title"><?php the_title(); ?></h1></header>
        <div class="entry clearfix">
            <?php the_content(); ?>
            <div class="clear"></div>
            <?php wp_link_pages(' '); ?>
        </div><!-- /entry -->
    </article><!-- /post -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>