<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_wedding_before_slider' ); ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_wedding_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <?php if( get_theme_mod('vw_wedding_slider_button') != ''){ ?>
                <div class="more-btn">              
                  <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_wedding_slider_button',__('READ MORE','vw-wedding'))); ?></a>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section> 

<?php do_action( 'vw_wedding_after_slider' ); ?>

<section id="first-section">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-7">
        <div class="row bride-groom">
          <?php
            $args = array( 'name' => get_theme_mod('vw_wedding_groom',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="row">
                  <div class="col-md-4">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                      </div>
                      <div class="col-md-6">
                        <?php dynamic_sidebar('groom'); ?>
                      </div>
                    </div>                    
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_wedding_string_limit_words( $excerpt,25 ) ); ?></p>
                  </div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; ?>
          <?php
            $args = array( 'name' => get_theme_mod('vw_wedding_bride',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                      </div>
                      <div class="col-md-6">
                        <?php dynamic_sidebar('bride'); ?>
                      </div>
                    </div>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_wedding_string_limit_words( $excerpt,25 ) ); ?></p>
                  </div>
                  <div class="col-md-4">
                    <?php the_post_thumbnail(); ?>
                  </div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; ?>
        </div>
      </div>
      <div class="col-md-5">
        <?php
          $args = array( 'name' => get_theme_mod('vw_wedding_love_story',''));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="love_story">
                <?php the_post_thumbnail(); ?>
                <div class="sec-date">
                  <span><?php the_date(); ?></span>
                </div>
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_wedding_string_limit_words( $excerpt,25 ) ); ?></p>
              </div>
            <?php endwhile; 
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; ?>
      </div>
    </div>
  </div>
</section>

<?php do_action( 'vw_wedding_after_about' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>