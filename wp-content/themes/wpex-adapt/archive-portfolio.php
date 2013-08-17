<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

    <header id="page-heading">
        <h1><?php post_type_archive_title(); ?></h1>
    </header><!-- /page-heading -->
    
    <?php if ( have_posts() ) : ?>
        <div id="portfolio-archive-entries" class="clearfix">
        	<?php $wpex_count=0; ?>
        	<?php while( have_posts() ) : the_post() ?>
            	<?php $wpex_count++; ?>
            	<?php get_template_part( 'content', 'portfolio') ?>
                <?php if( $wpex_count == '4' ) $wpex_count=0; ?>
            <?php endwhile; ?>    
            <?php wpex_pagination(); ?>
        </div><!--  /"portfolio-archive-entries -->
    <?php endif; ?>
 
<?php get_footer(); ?>