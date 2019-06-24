<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Wedding Bells Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="" f="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_slider        = get_theme_mod('show_slider', false);
$show_servicesbox       = get_theme_mod('show_servicesbox', false);
$show_welcome_page    = get_theme_mod('show_welcome_page', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
  if( !empty($show_slider)) {
    $inner_cls = '';
  }
  else {
    $inner_cls = 'siteinner';
  }
}
else {
$inner_cls = 'siteinner';
}
?>

     <div class="site-header <?php echo $inner_cls; ?>">  
       <div class="container">    
          <div class="logo">
        <?php wedding_bells_lite_the_custom_logo(); ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p><?php echo esc_html($description); ?></p>
          <?php endif; ?>
          </div><!-- logo -->
          <div class="head-rightpart">
          <div class="toggle">
                 <a class="toggleMenu" href="#"><?php esc_html_e('Menu','wedding-bells-lite'); ?></a>
               </div><!-- toggle --> 
               <div class="header-menu">                   
                <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
               </div><!--.header-menu -->  
         </div><!-- .head-rightpart --> 
      <div class="clear"></div>  
     
     </div><!-- container -->   
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_slider != '') {
  for($i=1; $i<=3; $i++) {
    if( get_theme_mod('sliderpage'.$i,false)) {
    $slider_Arr[] = absint( get_theme_mod('sliderpage'.$i,true));
    }
  }
?>                
                
<?php if(!empty($slider_Arr)){ ?>
    <div id="slider" class="nivoSlider">
      
        <?php 
        $i=1;
        $slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
        while( $slidequery->have_posts() ) : $slidequery->the_post();
    $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
     ?>
        <?php if(!empty($image)){ ?>
        <img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
        <?php }else{ ?>
        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
        <?php } ?>
        <?php $i++; endwhile; ?>
    </div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">
        <div class="slide_info">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p> 
            <?php
     $slider_readmore = get_theme_mod('slider_readmore');
     if( !empty($slider_readmore) ){ ?>
          <a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($slider_readmore); ?></a>
       <?php } ?>                            
        </div>
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_welcome_page != ''){ ?>  
    <section id="welcome-section">
              <div class="container">
                    <div class="welcome-wrap">                            
                        <?php if( get_theme_mod('welcome_page',false)) { ?>          
                            <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('welcome_page',true)) ); ?>        
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                                      
                                     <div class="welcome-content">
                                       <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

                                        <div class="hsid-break-line">❤️❤️❤️</div>
                                        <div class="hsid">I can't wait to see you walking in the aisle...</div>
                                        <div class="hsid hsid-padding hsid-break">And hold my hand to be my forever</div>
                                        <div class="wedding-date">2020-02-25</div>
                                        <div class="clear"></div>

                                    </div>                                      
                                    <?php endwhile;
                                       wp_reset_postdata(); ?>                                    
                              <?php } ?>                                 
                    <div class="clear"></div>  
                </div><!-- fashioner-wrap-->            
            </div><!-- container -->
       </section><!-- #welcome-section -->
<?php } ?>


<!-- SECTION :: RVSP -->
<section id="rvsp" class="animsition">
  <div class="container-contact100">
    <div class="wrap-contact100">

      <form id="hs-rvsp-form" class="contact100-form validate-form rvsp-form" method="post">
        <span class="contact100-form-title">
          RVSP
        </span>
        <div id="rvsp-msg-error" class="isa_info" style="display:none">
            <i class="fa fa-info-circle"></i>
            Please check your spelling or directly contact us
        </div>
        <div id="rvsp-msg-success" class="isa_success" style="display:none">
             <i class="fa fa-check"></i>
             Thanks! See you on our wedding!
        </div>

        <label class="label-input100" for="first-name">Name *</label>
        <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Required">
          <input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Required">
          <input class="input100" type="text" name="last-name" placeholder="Last name">
          <span class="focus-input100"></span>
        </div>

        <label class="label-input100" for="message">Message</label>
        <div class="wrap-input100">
          <textarea id="message" class="input100" name="message" placeholder="Message"></textarea>
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
          <button class="contact100-form-btn" name="rvsp-submit" id="rvsp-confirm" value="1">Confirm</button>
          <button class="contact100-form-btn" name="rvsp-submit" id="rvsp-regret" value="2">Regret</button>
        </div>

        <input type="hidden" name="action" value="rvsp_submission">
      </form>

      <div class="contact100-more flex-col-c-m" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/mangofarm.jpg');">
        <div class="flex-w size1 p-b-47">
          <div class="txt1 p-r-25">
            <span class="lnr lnr-map-marker"></span>
          </div>

          <div class="flex-col size2">
            <span class="txt1 p-b-20">
              Ceremony and Reception Address
            </span>

            <span class="txt2">
              Mango Farm, 22 Shield, Antipolo, 1870 Rizal
            </span>
          </div>
        </div>

        <div class="dis-flex size1 p-b-47">
          <div class="txt1 p-r-25">
            <span class="lnr lnr-heart"></span>
          </div>

          <div class="flex-col size2">
            <span class="txt1 p-b-20">
              Ceremony
            </span>

            <span class="txt3">
              3:00 PM
            </span>
          </div>
        </div>

        <div class="dis-flex size1 p-b-47">
          <div class="txt1 p-r-25">
            <span class="lnr lnr-dinner"></span>
          </div>

          <div class="flex-col size2">
            <span class="txt1 p-b-20">
              Reception
            </span>

            <span class="txt3">
              6:00 PM
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION END :: RVSP -->


<!-- SECTION :: Gallery -->
<!-- SECTION END :: Gallery -->

<!-- SECTION :: Directions -->
<!-- <section id="waze">
  <div class="container">
      <div class="welcome-wrap">

        <h2>Directions</h2>
        <iframe src="https://embed.waze.com/iframe?zoom=16&lat=14.612021&lon=121.125493&ct=livemap" width="100%" height="600" allowfullscreen></iframe>

        <div class="clear"></div> 
      </div>
  </div>
</section> -->
<!-- SECTION END :: Directions -->


<?php } ?>