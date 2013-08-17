<?php
/**
 * This file is used to display your homepage slides
 *
 * @package Adapt WordPress Theme
 * @since 2.0
 */
?>


<?php $query_slides = new WP_Query( array(
		'post_type'			=> 'slides',
		'posts_per_page'	=> '-1',
		'no_found_rows'		=> true,
	)
);
if ( $query_slides->posts ) { ?>
	
    <?php
	// Load slider scripts
	wp_enqueue_script( 'flexslider', WPEX_JS_DIR .'/flexslider.js', array( 'jquery' ), '2.0', true );
	wp_enqueue_script( 'wpex-slider-home', WPEX_JS_DIR .'/slider-home.js', array( 'jquery', 'flexslider' ), '1.0', true );
	
	//Vars
	$wpex_slideshow = ( wpex_get_data('slider_slideshow', '1') == 1 ) ? 'true' : 'false';
	$wpex_slider_randomize = ( wpex_get_data('slider_randomize', '1') == 1 ) ? 'true' : 'false';
	
	// Set slider options
	$flex_params = array(
		'slideshow' 		=> $wpex_slideshow,
		'randomize' 		=> $wpex_slider_randomize ,		
		'animation' 		=> wpex_get_data( 'slider_animation', 'slide' ),
		'direction' 		=> wpex_get_data( 'slider_direction', 'horizontal' ),
		'slideshowSpeed'	=> wpex_get_data( 'slider_slideshow_speed', '7000' )
	);
	
	// Localize slider script
	wp_localize_script( 'wpex-slider-home', 'flexLocalize', $flex_params ); ?>
    <div id="home-slider-wrap" class="flex-container">
		<div id="home-slider-loader"><i class="icon-spinner icon-spin"></i></div>
        <div id="home-flexslider" class="flexslider">
            <ul class="slides">
                <?php foreach( $query_slides->posts as $post ) : setup_postdata($post); ?>
                <?php if( has_post_thumbnail() || get_post_meta( get_the_ID(), 'wpex_slides_video', true) ){ ?>
                    <li class="fitvids">
						<?php if( get_post_meta( get_the_ID(), 'wpex_slides_video', true ) !== '' ) {
                            echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_slides_video', true ) );
                        } else {
                            if( get_post_meta( get_the_ID(), 'wpex_slides_url', true) !== '' ) { ?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url', true); ?>" title="<?php the_title_attribute(); ?>" target="_<?php echo get_post_meta( get_the_ID(), 'wpex_slides_url_target', true); ?>">
                                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
                            </a>
                            <?php } else { ?>
                                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  wpex_img( 'slider_width' ), wpex_img( 'slider_height' ), wpex_img( 'slider_crop' ) ); ?>" alt="<?php the_title(); ?>" />
                        <?php }
                         } ?>
                         <?php if ( $post->post_content !=='' && get_post_meta( get_the_ID(), 'wpex_slides_video', true) == '' ) : ?>
                            <div class="flex-caption"><?php the_content(); ?></div>
                        <?php endif; ?>
                    </li>
                <?php } ?>
                <?php endforeach; ?>
            </ul><!-- .slides -->
        </div><!-- .flexslider -->
    </div><!-- #home-slider-wrap -->
<?php }	?>

<?php wp_reset_postdata(); ?>