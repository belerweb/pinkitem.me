<?php
/**
 * @package WordPress
 * @subpackage Adapt WordPress Theme
 * This file contains the styling for portfolio entries.
 */
?>

<?php
/******************************************************
 * Single Posts
 * @since 2.0
*****************************************************/
if ( is_singular( 'portfolio' ) && is_main_query() ) { ?>

	<?php if ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_media_alternative', true ) !== '' ) { ?>
    	<div id="portfolio-post-alt" class="clr fitvids">
        	<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), 'wpex_portfolio_post_media_alternative', true ) ); ?>
        </div><!-- /portfolio-post-alt -->
    <?php } else { ?>

		<?php   
        //attachement loop
        $args = array(
            'orderby'			=> 'menu_order',
            'order'				=> 'ASC',
            'post_type' 		=> 'attachment',
            'post_parent'		=> get_the_ID(),
            'post_mime_type'	=> 'image',
            'post_status' 		=> null,
            'posts_per_page' 	=> -1
        );
        $attachments = get_posts($args); ?>
        
        <?php if ( count($attachments) > '1' ) { ?>
            <?php wp_enqueue_script( 'flexslider', WPEX_JS_DIR .'/flexslider.js', array( 'jquery' ), '2.0', true ); ?>
            <?php wp_enqueue_script( 'wpex-slider-home', WPEX_JS_DIR .'/slider-portfolio.js', array( 'jquery', 'flexslider' ), '1.0', true ); ?>
        <?php } ?>
            
        <div id="portfolio-post-slider">
            <div class="<?php if ( count($attachments) > '1' ) echo 'flexslider'; ?>">
                <ul class="slides"> 
                    <?php foreach ($attachments as $attachment) : ?>
                        <li><a href="<?php echo wp_get_attachment_url( $attachment->ID ); ?>" title="<?php echo apply_filters('the_title', $attachment->post_title); ?>" <?php if( count($attachments) =='1') { echo 'class="prettyphoto-link"'; } else { echo 'rel="prettyphoto[gallery]"'; } ?>><img src="<?php echo aq_resize( wp_get_attachment_url( $attachment->ID ), wpex_img('portfolio_post_width'),  wpex_img('portfolio_post_height'),  wpex_img('portfolio_post_crop') ); ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" /></a></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /flex-slider -->
        </div><!-- /portfolio-post-slider -->
    
    <?php } ?>

<?php
/******************************************************
 * Entries
 * @since 2.0
*****************************************************/
} else { ?>

	<?php global $wpex_count; ?>

	<?php $terms = get_the_terms( get_the_ID(), 'portfolio_category' ); ?>
    
    <?php if ( has_post_thumbnail() ) { ?>
        <article class="portfolio-item col-<?php echo $wpex_count; ?> <?php if( $terms ) foreach ( $terms as $term ) { echo $term->slug .' '; }; ?>">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ); ?>" alt="<?php the_title(); ?>" />
                <div class="portfolio-overlay"><h3><?php the_title(); ?></h3></div><!-- portfolio-overlay -->
            </a>
        </article>
	<?php } ?>
    
<?php
}