<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>

</div><!-- /main -->

    <div id="footer" class="clearfix">
    	<?php if( wpex_get_data( 'widgetized_footer', '1' ) == '1' ) { ?>
        	<div id="footer-widget-wrap" class="clearfix">
            	<div id="footer-one" class="footer-widget-col clearfix">
					<?php dynamic_sidebar('footer-one'); ?>
                </div><!-- /footer-one -->
                <div id="footer-two" class="footer-widget-col clearfix">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div><!-- /footer-two -->
                <div id="footer-three" class="footer-widget-col clearfix">
                    <?php dynamic_sidebar('footer-three'); ?>
                </div><!-- /footer-three -->
                <div id="footer-four" class="footer-widget-col clearfix">
                    <?php dynamic_sidebar('footer-four'); ?>
                </div><!-- /footer-four -->
            </div><!-- /footer-widget-wrap -->
        <?php } ?>
		<div id="footer-bottom" class="clearfix">
            <div id="copyright">
            	<?php if ( wpex_get_data( 'footer_text' ) !== '' ) { ?>
                	<?php echo wpex_get_data( 'footer_text' ); ?>
                <?php } else { ?>
                	WordPress Theme by <a href="http://themeforest.net/user/WPExplorer" title="WPExplorer Premium WordPress Themes" target="_blank">WPExplorer</a>
<?php } ?>
            </div><!-- /copyright -->
            <div id="back-to-top">
                <a href="#toplink" title="<?php _e('Scroll Up', 'wpex'); ?>"><?php _e('Scroll Up', 'wpex'); ?> &uarr;</a>
            </div><!-- /back-to-top -->
        </div><!-- /footer-bottom -->
	</div><!-- /footer -->
</div><!-- wrap --> 

<?php wp_footer(); ?>
</body>
</html>