<?php
/**
 * Template Name: Filterable Portfolio
 *
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
    // Load isotope scripts
    wp_enqueue_script( 'isotope', WPEX_JS_DIR . '/isotope.js' );
    wp_enqueue_script( 'isotope_init', WPEX_JS_DIR . '/isotope_init.js' );  ?>
    
    <header id="page-heading" class="clearfix">
        <h1><?php the_title(); ?></h1>	
        <?php $terms = get_terms( 'portfolio_category' ); ?>
		<?php if( $terms[0] ) { ?>
            <ul id="portfolio-cats" class="filter clearfix">
                <li><a href="#" class="active" data-filter="*"><span><?php _e('All', 'wpex'); ?></span></a></li>
                <?php foreach ($terms as $term ) : ?>
                	<li><a href="#" data-filter=".<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span></a></li>
                <?php endforeach; ?>
            </ul><!-- /portfolio-cats -->
        <?php } ?>	 
    </header><!-- /page-heading -->
        
    <div class="post full-width clearfix">
		 <?php $wpex_port_query = new WP_Query(
            array(
                'post_type' => 'portfolio',
                'showposts' => '-1',
                'no_found_rows' => true,
            )
        );
        if( $wpex_port_query->posts ) { ?>
            <div id="portfolio-wrap" class="clearfix filterable-portfolio">
                <div class="portfolio-content">
                    <?php foreach( $wpex_port_query->posts as $post ) : setup_postdata( $post ); ?>
                        <?php get_template_part( 'content', 'portfolio' ); ?>
                    <?php endforeach; ?>
                </div><!-- /portfolio-content -->
            </div><!-- /portfolio-wrap -->
        <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div><!-- /post full-width -->

<?php endwhile; ?>
<?php get_footer(); ?>