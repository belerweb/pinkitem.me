<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

<?php get_header(); ?>

    <div class="home-wrap clearfix">
    
    	 <?php
		//get homepage module blocks
		$home_blocks = $smof_data['homepage_blocks']['enabled'];
		
		if ($home_blocks) :
		
			foreach ($home_blocks as $key=>$value) :
				
				switch($key) {
					
					
					/***************************
					* Homepage Tagline
					***************************/
					case 'home_tagline': ?>
    
						<?php if( get_bloginfo('description') ) { ?>
                            <section id="home-tagline">
                                <?php echo bloginfo('description'); ?>
                            </section>
                        <?php } ?>
                        
                        
                        
                   <?php    
                   /***************************
					* Homepage Slider
					***************************/
					break;
					case 'home_slider': ?>
                    
                    	<section class="home-slider clr">
							<div class="container">
								<?php if ( wpex_get_data('slider_alternative') !== '' ) { ?>
									<?php echo do_shortcode( wpex_get_data('slider_alternative') ); ?>
								<?php } else { ?>
                                	<?php if ( wpex_get_data( 'slides_post_type', '1' ) == '1' ) { ?>
										<?php get_template_part('content','slider'); ?>
                                    <?php } ?>
								<?php } ?>
							</div><!-- .container -->
						</section><!-- #home-slider .clr -->
                        
                        
					<?php    
                   /***************************
					* Homepage Content
					***************************/
					break;
					case 'home_content': ?>
                        
                   		<section class="home-content entry clr">
                            <?php while ( have_posts() ) : the_post(); ?>
                            	<?php the_content(); ?>
                            <?php endwhile; ?>
                        </section><!-- .home-tagline -->
                    
                   <?php    
                   /***************************
					* Homepage Highlights
					***************************/
					break;
					case 'home_highlights': ?>
                    
                        <?php $wpex_highlights_query = new WP_Query(
							array(
								'post_type'		=> 'hp_highlights',
								'showposts' 	=> '-1',
								'no_found_rows' => true,
							)
						);
						
						if( $wpex_highlights_query->posts ) { ?>
                        
                            <section id="home-highlights" class="clearfix">
                            	<?php if ( wpex_get_data( 'home_highlights_heading' ) == '1' ) { ?>
                            		<h2 class="heading"><span><?php echo wpex_get_data('home_highlights_heading_txt', __( 'Features', 'wpex' ) ); ?></span></h2>
                            	<?php } ?>
                            	<?php $wpex_count=0; ?>
                                <?php foreach( $wpex_highlights_query->posts as $post ) : setup_postdata( $post ); ?>
                                	<?php $wpex_count++; ?>
                                    <article class="hp-highlight col-<?php $wpex_count; ?>">
                                        <?php if( get_post_meta( get_the_ID(), 'wpex_highlights_url', true ) ) { ?>
											<a href="<?php echo get_post_meta( get_the_ID(), 'wpex_highlights_url', true ) ?>" title="<?php the_title(); ?>">
                                        <?php } ?>
                                        <?php if( has_post_thumbnail() ) { ?>
                                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php the_title(); ?>" class="hp-highlight-thumb" />
										<?php } ?>
                                        <h2><?php the_title(); ?></h2>
                                        <?php if( get_post_meta( get_the_ID(), 'wpex_highlights_url', true ) ) { ?></a><?php } ?>
                                        
                                        <?php the_excerpt(); ?>
                                    </article><!-- /hp-highlight -->
                                    <?php if( $wpex_count == '4' ) $wpex_count=0; ?>
                                <?php endforeach; ?>
                            </section><!-- /home-projects -->      	
                        <?php } ?>
                        
                        <?php wp_reset_postdata(); ?>
                        
                        
                        
                        
                        <?php
                        /***************************
                        * Recent Portfolio Posts
                        ***************************/
                        break;
                        case 'home_portfolio': ?>
                        
                            <?php
                            // Setup tax query if needed
                            if ( wpex_get_data('home_port_cat') !== '' && wpex_get_data('home_port_cat') !== 'All' ) {
                                $wpex_tax_query = array(
                                    array (
                                        'taxonomy'	=> 'portfolio_category',
                                        'field' 	=> 'slug',
                                        'terms'		=> wpex_get_data( 'home_port_cat' )
                                    )
                                );
                            } else { $wpex_tax_query = NULL; } ?>
                            
                            <?php $wpex_port_query = new WP_Query(
                                array(
                                    'post_type' => 'portfolio',
                                    'showposts' => wpex_get_data( 'home_port_count', '4' ),
                                    'no_found_rows' => true,
                                    'tax_query' => $wpex_tax_query
                                )
                            );
                            
                            if( $wpex_port_query->posts ) { ?>
                                <section id="home-projects" class="clearfix">
                                	<?php if ( wpex_get_data( 'home_port_heading', '1' ) == '1' ) { ?>
                            			<h2 class="heading"><span><?php echo wpex_get_data('home_port_heading_txt', __( 'Recent Work', 'wpex' ) ); ?></span></h2>
                                	<?php } ?>
									<?php $wpex_count=0; ?>
                                    <?php foreach( $wpex_port_query->posts as $post ) : setup_postdata( $post ); ?>
										<?php $wpex_count++; ?>
                                        <?php get_template_part( 'content', 'portfolio' ); ?>
                                        <?php if( $wpex_count == '4' ) $wpex_count=0; ?>
                                    <?php endforeach; ?>
                                </section><!-- /home-projects -->
                            <?php } ?>
                            
                            <?php wp_reset_postdata(); ?>
                        
                        
                        
                                
                        <?php
                        /***************************
                        * Recent Blog Posts
                        ***************************/
                        break;
                        case 'home_blog': ?>
                        
                            <?php
                            // Setup tax query if needed
                            if ( wpex_get_data('home_blog_cat') !== '' && wpex_get_data('home_blog_cat') !== 'All' ) {
                                $wpex_tax_query = array(
                                    array (
                                        'taxonomy'	=> 'category',
                                        'field'		=> 'slug',
                                        'terms'		=> wpex_get_data( 'home_blog_cat' )
                                    )
                                );
                            } else { $wpex_tax_query = NULL; } ?>
                            
                            <?php
                            // Get Standard posts
                            $wpex_posts_query = new WP_Query(
                                array(
                                    'post_type'		=> 'post',
                                    'showposts' 	=> wpex_get_data( 'home_blog_count', '4' ),
                                    'no_found_rows'	=> true,
                                    'tax_query' 	=> $wpex_tax_query
                                )
                            );
                            
                            if( $wpex_posts_query->posts ) { ?>
                            <section id="home-posts" class="clearfix">
                            	<?php if ( wpex_get_data( 'home_blog_heading', '1' ) == '1' ) { ?>
                            		<h2 class="heading"><span><?php echo wpex_get_data('home_blog_heading_txt', __( 'Recent News', 'wpex' ) ); ?></span></h2>
                                <?php } ?>
                                <?php $wpex_count=0; ?>
                                <?php foreach( $wpex_posts_query->posts as $post ) : setup_postdata( $post ); ?>
                                    <?php $wpex_count++; ?>
                                    <article class="home-entry col-<?php echo $wpex_count; ?>">
                                        <?php if ( has_post_thumbnail() ) {  ?>
                                        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_width'),  wpex_img('blog_entry_height'),  wpex_img('blog_entry_crop') ); ?>" alt="<?php the_title(); ?>" /></a>
                                        <?php } ?>
                                        <div class="home-entry-description">
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h3>
                                            <?php echo wpex_excerpt( '15' ); ?>
                                        </div><!-- /home-entry-description -->
                                    </article><!-- /home-entry-->
                                    <?php if( $wpex_count == '4' ) $wpex_count=0; ?>
                                <?php endforeach; ?>
                            </section><!-- /home-posts -->      	
                        <?php } ?>
                        
                        <?php wp_reset_postdata(); ?>
                        
				<?php } // end switch($key) ?>
					
			<?php endforeach; ?>
            
		<?php endif; ?>
            
    </div><!-- /home-wrap -->   

<?php get_footer(); ?>