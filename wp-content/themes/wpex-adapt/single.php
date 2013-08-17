<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <header id="page-heading">
        <h1><?php echo wpex_get_data( 'blog_title', __( 'Blog', 'wpex' ) ); ?></h1>	
        <nav id="single-nav" class="clearfix"> 
            <?php next_post_link('<div id="single-nav-left">%link</div>', '<span class="icon-chevron-left"></span> '.__('Newer','wpex').'', false); ?>
            <?php previous_post_link('<div id="single-nav-right">%link</div>', ''.__('Older','wpex').' <span class="icon-chevron-right"></span>', false); ?>
        </nav><!-- /single-nav -->	
    </header>
    
    <article class="post clearfix">
        <header>
            <h1 class="single-title"><?php the_title(); ?></h1>
            <ul class="post-meta clearfix">
                <li class="post-meta-date"><i class="icon-time"></i><?php _e('On','wpex'); ?> <?php the_time('j'); ?> <?php the_time('M'); ?>, <?php the_time('Y'); ?></li>
                <li class="post-meta-author"><i class="icon-user"></i><?php _e('By', 'wpex'); ?> <?php the_author_posts_link(); ?></li>
                <?php if( comments_open() ) { ?>
                    <li class="post-meta-comments comments-scroll"><i class="icon-comments"></i><?php _e('With', 'wpex'); ?>  <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></li>
                <?php } ?>
            </ul><!-- /loop-entry-meta -->
        </header>
        <div class="entry clearfix">
        	<?php if ( wpex_get_data( 'blog_single_thumbnail', '1' ) == '1' ) { ?>
            	<?php get_template_part( 'content', get_post_format() ); // displays thumbnail on posts ?>
            <?php } ?>
            <?php the_content(); ?>
            <div class="clear"></div>
            <?php wp_link_pages(' '); ?>
            <?php if ( wpex_get_data( 'blog_tags', '1' ) == '1' ) { ?>
                <footer class="post-bottom">
                    <?php the_tags('<div class="post-tags"><span class="icon-tags"></span>',' , ','</div>'); ?>
                </footer><!-- /post-bottom -->
            <?php } ?>
        </div><!-- /entry -->
        <?php comments_template(); ?>
    </article><!-- /post -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>