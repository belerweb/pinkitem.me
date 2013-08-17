<?php
/**
 * The default template for displaying content. Used for both single and index/archive.
 *
 * @package WordPress
 * @subpackage Adapt
 * @since Adapt 1.0
 */
?>
 

<?php
/******************************************************
 * Single Posts
 * @since 2.0
*****************************************************/

if ( is_singular() && is_main_query() ) { ?>
	
	<?php if( has_post_thumbnail() ) { ?>
		<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_post_width'),  wpex_img('blog_post_height'),  wpex_img('blog_post_crop') ); ?>" alt="<?php the_title(); ?>" class="post-thumbnail" />
	<?php } ?>


<?php
/******************************************************
 * Entries
 * @since 2.0
*****************************************************/
} else { ?>

	<article class="loop-entry clearfix">
		<?php if( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="loop-entry-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_width'),  wpex_img('blog_entry_height'),  wpex_img('blog_entry_crop') ); ?>" alt="<?php the_title(); ?>" /></a>
		<?php } ?>
		<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( get_post_type() != 'page' || get_post_type() != 'portfolio') { ?>
		<ul class="loop-entry-meta">
			<li class="loop-entry-meta-date"><i class="icon-time"></i><?php _e('On','wpex'); ?> <?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></li>
			<li class="loop-entry-meta-author"><i class="icon-user"></i><?php _e('By', 'wpex'); ?> <?php the_author_posts_link(); ?></li>
            <?php if( comments_open() ) { ?>
				<li class="loop-entry-meta-comments"><i class="icon-comments"></i><?php _e('With', 'wpex'); ?>  <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></li>
            <?php } ?>
		</ul><!-- /loop-entry-meta -->
		<?php } ?>
        <?php if ( wpex_get_data( 'blog_exceprt', '1' ) == '1' ) { ?>
			<?php wpex_excerpt('30'); ?>
        <?php } else { ?>
        	<?php the_content(); ?>
        <?php } ?>
	</article><!-- loop-entry -->

<?php } ?>