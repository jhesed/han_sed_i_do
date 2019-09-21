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
<div class='menu-wrap'>
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
</div>
<?php 
  for($i=1; $i<=3; $i++) {
    if( get_theme_mod('sliderpage'.$i,false)) {
    $slider_Arr[] = absint( get_theme_mod('sliderpage'.$i,true));
?>                

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
            <p class="input100 white"><?php echo esc_html( wp_trim_words( get_the_content(), 500, '' ) );  ?></p>
           
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
<?php } } ?>


<!-- SECTION :: Countdown Timer -->
<section id="countdown">
<div class="main-area-wrapper">
    <div class="main-area center-text" >
      
      <div class="display-table wow zoomInUp">
        <div class="display-table-cell">
          
          <h1 class="countdown-timer"><b>Road to Forever</b></h1>
          <p class="desc font-white">“In the end, it's not the years in your life that count. It's the life in your years.”</p>
          <p class="desc font-white"><i>– Abraham Lincoln</i></p>
          
          <div id="normal-countdown" data-date="2020/02/25"></div>
          
          <a class="notify-btn" href="#rvsp">RSVP</a>
          
        </div><!-- display-table -->
      </div><!-- display-table-cell -->
    </div><!-- main-area -->
  </div><!-- main-area-wrapper -->
</section>
<!-- SECTION END :: Countdown Timer -->


<!-- SECTION :: RVSP -->
<section id="rvsp" class="animsition">
  <div class="container-contact100 wow lightSpeedIn">
    <div class="wrap-contact100">

      <form id="hs-rvsp-form" class="contact100-form validate-form rvsp-form" method="post">
        <span class="contact100-form-title">
          RSVP
        </span>
        <div id="rvsp-msg-error" class="isa_info" style="display:none">
            <i class="fa fa-info-circle"></i>
            <span id="rvsp-error"></span>
        </div>
        <div id="rvsp-msg-success" class="isa_success" style="display:none">
             <i class="fa fa-check"></i>
             <span id="rvsp-success"></span>
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
        
        <div class="dis-flex size1 p-b-47">
          <div class="txt1 p-r-25">
            <span class="lnr lnr-map-marker"></span>
          </div>

          <div class="flex-col size2">
            <span class="txt1 p-b-20">
              Ceremony and Reception
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

<!-- SECTION :: Couple -->
<section id="welcome-section">
    <div class="container wow bounceInUp">
          <div class="welcome-wrap">                            
              <?php if( get_theme_mod('welcome_page',false)) { ?>          
                  <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('welcome_page',true)) ); ?>        
                          <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                                      
                           <div class="welcome-content">
                              <h3>The Wedding Couple</h3>

                              <div class="hsid-break-line">❤️❤️❤️</div>
                              <div class="hsid"><i>I can't wait to see you walking in the aisle...</i></div>
                              <div class="hsid hsid-padding hsid-break">And hold my hand to be my forever</div>
                              <div class="clear"></div>

                          </div>          
                          <br/><br/>      
                          <br/><br/>                            
                          <?php endwhile;
                             wp_reset_postdata(); ?>                                    
                    <?php } ?>                                 
          <div class="clear"></div>  
      </div><!-- fashioner-wrap-->            
  </div><!-- container -->
<br/><br/><br/><br/>
</section><!-- #welcome-section -->


<section id="bridegroom-section">
  <div class="container wow bounceInRight">
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



<!-- SECTION START :: FAQ -->

<section id="faq">
  <div class="container wow fadeInUp">

  <!-- <div class="main-area-wrapper"> -->
      <div class="main-area center-text faq-section">
         <h1 class="countdown-timer">Frequently Asked Questions (FAQ)</h1>
         <ul>

            <li>
              <a href="#">
                <h2>What time will the ceremony start?</h2>
                <p>Wedding cerermony march will start at exactly 3:00 PM.  Baguhin natin ang Filipino time culture :)</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>What can I wear? Any dress code?</h2>
                <p>Our color motif is burgundy.  Please wear formal attire. Coat or longsleeves for men and dress for women</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>What if I said "yes" to the RVSP pero hindi na ko makakapunta?</h2>
                <p>#paasa :D Joke! Please inform us ASAP so we can give your alloted seat to someone else.</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>Can I bring someone else with me? Can I bring my kids?</h2>
                <p>We request that only those who are invited will come. Please check the invitation for alloted seats. As much as we'd like to invite everyone, we can only invite a number of guests due to limited seats.</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>Am I allowed to take photos and videos during the wedding ceremony?</h2>
                <p>We are respectfully asking you to refrain from using gadgets during the ceremony proper. We have official P/V to capture the moments. Bawi ka na lang sa cocktails and reception. #hansedido :)</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>Where can we park our car / motorcycle?</h2>
                <p>There's an alloted parking space for you. Basta ikaw may space lagi sa puso namin :)</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>Can I proceed directly to reception?</h2>
                <p>Yes you may but it would surely warm our hearts to see you when we exchange our vows. Malay mo biglang magbago yung reception venue. Mag-isa ka na lang bigla. hahahah.</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>What time will the reception end?</h2>
                <p>We aim to end the program at 8:00 PM. Wag pong eat and run. Ang tunay na kaibigan 'di nang-iiwan. hahahaha</p>
              </a>
            </li>

            <li>
              <a href="#">
                <h2>Do you have any gift preference ?</h2>
                <p>Anything from you will be a blessing. But for your convenience, monetary gift would be preferred. Pero kung gusto mong magregalo ng 50 inch smart TV or lazy boy ay malugod naman naming tatanggapin :)<DATA></DATA></p>
              </a>
            </li>

          </ul>
          
        </div>
      <!-- </div> -->
  </div>
</section>

<!-- SECTION END :: FAQ -->
