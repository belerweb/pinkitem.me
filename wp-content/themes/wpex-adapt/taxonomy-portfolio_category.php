<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

	<?php $posttype_obj = get_post_type_object( get_post_type( ) ); ?>

    <header id="page-heading">
         <h1 class="page-header-title"><?php echo $posttype_obj->label; ?>: <span><?php echo single_term_title(); ?></span></h1>
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