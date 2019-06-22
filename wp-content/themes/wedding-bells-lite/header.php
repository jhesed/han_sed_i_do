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
<link rel="profile" href="http://gmpg.org/xfn/11">
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
                                        <div class="clear"></div>
<!-- /wp:html -->

                                    </div>                                      
                                    <?php endwhile;
                                       wp_reset_postdata(); ?>                                    
                              <?php } ?>                                 
                    <div class="clear"></div>  
                </div><!-- fashioner-wrap-->            
            </div><!-- container -->
       </section><!-- #welcome-section -->
<?php } ?>


<section id="bridegroom-section">
  <div class="container">
    <div class="welcome-wrap">
        <div class="hearticon"></div>                        
        <?php for($n=4; $n<=5; $n++) { ?>    
        <?php if( get_theme_mod('services-pagebox'.$n,false)) { ?>          
            <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('services-pagebox'.$n,true)) ); ?>       
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                    <div class="twocolumnbox <?php if($n % 2 == 1) { echo "last_column"; } ?>">                                    
                      <?php if(has_post_thumbnail() ) { ?>
                        <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                      <?php } ?>
                     <div class="pagecontent">
                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
                     <p><?php echo get_the_content();  ?></p>                                     
                     </div>                                   
                    </div>
                    <?php endwhile;
                       wp_reset_postdata(); ?>                                    
              <?php } } ?>                                 
        <div class="clear"></div>  
    </div><!-- .welcome-wrap--> 
  </div><!-- .container -->                  
</section><!-- .bridegroom-section-->   

<section id="love-story">
  <div class="container">     
    <div class="welcome-wrap">          
        <a><h3>Love Story</h3></a>
          <div id="fb-root"></div>
         
         <div class="twocolumnbox">
            <div class="fb-video" data-href="https://www.facebook.com/jhesed.tacadena/videos/pcb.2285914871420708/2285896198089242/?type=3&amp;theater" data-width="auto" data-show-text="false" data-allowfullscreen="true"><blockquote cite="https://developers.facebook.com/jhesed.tacadena/videos/2285896198089242/" class="fb-xfbml-parse-ignore"><a href="https://developers.facebook.com/jhesed.tacadena/videos/2285896198089242/"></a></blockquote></div>
          </div>
         
          <div class="twocolumnbox last_column">   
            <div class="fb-video" data-href="https://www.facebook.com/jhesed.tacadena/videos/2285894218089440/" data-width="auto" data-show-text="false"><blockquote cite="https://developers.facebook.com/jhesed.tacadena/videos/2285894218089440/" class="fb-xfbml-parse-ignore"><a href="https://developers.facebook.com/jhesed.tacadena/videos/2285894218089440/"></a></blockquote></div>
          </div>

        <?php wp_reset_postdata(); ?>
        <div class="clear"></div>  
      </div>
  </div>
</section>

<!-- SECTION :: LOVE STORY TIMELINE -->
<section id="love-story-timeline">
  <div class="container">
      <div class="welcome-wrap">
        <div class="timeline-container">
          <div class="timeline">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=11;" data-year="2011">
                  <div class="swiper-slide-content"><span class="timeline-year">2011</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=12;" data-year="2012">
                  <div class="swiper-slide-content"><span class="timeline-year">2012</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=13;" data-year="2013">
                  <div class="swiper-slide-content"><span class="timeline-year">2013</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=14;" data-year="2014">
                  <div class="swiper-slide-content"><span class="timeline-year">2014</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=15;" data-year="2015">
                  <div class="swiper-slide-content"><span class="timeline-year">2015</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://unsplash.it/1920/500?image=16;" data-year="2016">
                  <div class="swiper-slide-content"><span class="timeline-year">2016</span>
                    <h4 class="timeline-title">Our nice super title</h4>
                    <p class="timeline-text">Lorem ipsum dolor site amet, consectetur adipscing elit, sed do eisumod tempor incididut ut labore et dolore magna aliqua. Ut enim ad mimim venjam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

        <div class="clear"></div>  
    </div>
  </div>
</section>   
<!-- SECTION END:: LOVE STORY TIMELINE -->

<!-- SECTION :: RVSP -->
<section id="rvsp">
  <div class="container">
    <div class="welcome-wrap">
      <div class="top"></div>

      <form class="rvsp-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
        <div class="form">
          <div class ="info">
          <h1>RSVP</h1>
          <h2>for the wedding of</h2>
          <h1><span>Jhesed & Hannah</span></h1>
            <p class= "line">________________________________________</p>
            <h2>The Details</h2>
            <p>Tuesday, February 25, 2020, 3:00 PM</p>
            <br>
            <h2>Ceremony & Reception</h2  >
            <p>The Mango Farm, Antipolo</p>
            <p class= "line">________________________________________</p>
          <input type="text" placeholder="First Name" name="first-name">
          <input type="text" placeholder="Last Name" name="last-name"> 
          <input type="radio" id="confirm" name="attendance" value="1" checked>Confirm
          <input type="radio" id="regret" name="attendance" value="0">Regret
          </div>
          <input type="hidden" name="action" value="rvsp_submission">
          <input type="submit" class="accept">Submit
        </div>
      </form>
      <div class="clear"></div>  
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