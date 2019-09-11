<?php
/**
 *Wedding Bells Lite About Theme
 *
 * @package Wedding Bells Lite
 */

//about theme info
add_action( 'admin_menu', 'wedding_bells_lite_abouttheme' );
function wedding_bells_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'wedding-bells-lite'), __('About Theme Info', 'wedding-bells-lite'), 'edit_theme_options', 'wedding_bells_lite_guide', 'wedding_bells_lite_mostrar_guide');   
} 

//Info of the theme
function wedding_bells_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'wedding-bells-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Wedding Bells Lite is a beautiful and elegant, very well designed, romantic and visually stunning, attractive and engaging, resourceful and feature-rich wedding WordPress theme. This theme has been developed with a purpose to provide the most ambitious website building platform for the webmasters to make the most beautiful and modern wedding websites. ','wedding-bells-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'wedding-bells-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'wedding-bells-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'wedding-bells-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'wedding-bells-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'wedding-bells-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'wedding-bells-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'wedding-bells-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'wedding-bells-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'wedding-bells-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( WEDDING_BELLS_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'wedding-bells-lite'); ?></a> | 
            <a href="<?php echo esc_url( WEDDING_BELLS_LITE_PROTHEME_URL ); ?>"><?php esc_html_e('Purchase Pro', 'wedding-bells-lite'); ?></a> | 
            <a href="<?php echo esc_url( WEDDING_BELLS_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'wedding-bells-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>