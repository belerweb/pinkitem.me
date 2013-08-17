<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <header id="page-heading">
        <h1><?php
            if ( is_day() ) :
                printf( __( 'Daily Archives: %s', 'wpex' ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %s', 'wpex' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpex' ) ) );
            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %s', 'wpex' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpex' ) ) );
            else :
                echo single_term_title();
            endif;
        ?></h1>
    </header><!-- /page-heading -->
    
    <div id="post" class="post clearfix">  
    	<?php while( have_posts() ) : the_post() ?>
        	<?php get_template_part( 'content', get_post_format() ) ?>
        <?php endwhile; ?>
        <?php wpex_pagination(); ?>
    </div><!-- /post -->

<?php endif; ?>
<?php get_sidebar(); ?>	  
<?php get_footer(); ?>