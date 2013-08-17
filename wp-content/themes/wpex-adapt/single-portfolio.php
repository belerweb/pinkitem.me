<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>   

    <article>
        <header id="page-heading">
            <h1><?php the_title(); ?></h1>
            <nav id="single-nav" class="clearfix"> 
                <?php next_post_link('<div id="single-nav-left">%link</div>', '<span class="icon-chevron-left"></span> '.__('Newer','wpex').'', false); ?>
                <?php previous_post_link('<div id="single-nav-right">%link</div>', ''.__('Older','wpex').' <span class="icon-chevron-right"></span>', false); ?>
            </nav><!-- /single-nav --> 
        </header><!-- /page-heading -->
        <div id="single-portfolio" class="post full-width clearfix">
            <div id="single-portfolio-left">
               <?php get_template_part( 'content', 'portfolio' ); ?>
            </div><!-- /single-portfolio-left -->
            <div id="single-portfolio-right" class="clearfix">
                <?php the_content(); ?>
            </div><!-- /single-portfolio-right -->
        </div><!-- /post --> 
    </article>

<?php endwhile; ?>
<?php get_footer(); ?>