

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