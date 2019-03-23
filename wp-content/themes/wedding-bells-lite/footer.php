<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wedding Bells Lite
 */
?>

<div class="footer-copyright">
        	<div class="container">
            	<div class="copyright-txt">
					<?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'wedding-bells-lite');?>           
                </div>
                <div class="design-by">
				  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/wedding-bells-lite/', 'wedding-bells-lite' ) ); ?>"><?php printf( __( 'Theme by %s', 'wedding-bells-lite' ), 'Grace Themes' ); ?></a>
                </div>
                 <div class="clear"></div>
            </div>           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>