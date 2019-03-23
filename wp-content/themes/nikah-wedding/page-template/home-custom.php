<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php do_action('nikah_wedding_above_slider_section'); ?>

<?php if( get_theme_mod('nikah_wedding_slider_arrows') != ''){ ?>
  <?php /** slider section **/ ?>
  <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'nikah_wedding_slide_page' . $count ));
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
                      <h2><?php the_title();?></h2> 
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( nikah_wedding_string_limit_words( $excerpt,15 ) ); ?></p>
                      <div class ="read-more">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','nikah-wedding'); ?></a>
                      </div>                    
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
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
          </a>
      </div>  
      <div class="clearfix"></div>
  </section> 
<?php }?>

<?php do_action('nikah_wedding_below_slider_section'); ?>

<div class="front-page-header">
  <?php get_template_part( 'template-parts/navigation/navigation-top' ); ?> 
</div>

<?php if( get_theme_mod('nikah_wedding_love_story_setting') != ''){ ?>
  <?php /*--The Story of Love Us--*/?>
  <section id="love-story">
    <div class="container">
      <div class="row">
        <?php
          $postData1 =  get_theme_mod('nikah_wedding_love_story_setting');
          if($postData1){
            $args = array( 'name' => esc_html($postData1 ,'nikah-wedding'));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-7 col-md-7">
                <h3><?php the_title(); ?></h3>
                <div class="meta-info">
                  <sapn class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?> .</span>
                  <span class="month"><?php echo esc_html( get_the_date( 'm' ) ); ?> .</span>
                  <span class="year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
                </div>
                <p><?php the_excerpt(); ?></p>
                <div class ="read-more">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','nikah-wedding'); ?></a>
                </div>
              </div>  
              <div class="col-lg-5 col-md-5">
                <div class="abt-image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; }?>
      </div>
    </div>
  </section>
<?php }?>

<?php do_action('nikah_wedding_after_the_story_of_love_section'); ?>

<?php get_footer(); ?>