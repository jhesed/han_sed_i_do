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