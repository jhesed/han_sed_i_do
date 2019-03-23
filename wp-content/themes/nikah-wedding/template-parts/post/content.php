<?php
/**
 * Template part for displaying posts
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogger">
		<div class="post-info">
		    <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php echo esc_html( get_the_date()); ?></span>
		    <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
		    <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','nikah-wedding'), __('0 Comments','nikah-wedding'), __('% Comments','nikah-wedding') ); ?></span>
		</div>
		<div class="row">
		    <div class="col-lg-4">
		      <?php if(has_post_thumbnail()) { ?>
		          <?php the_post_thumbnail(); ?>  
		      <?php }?>
		    </div>
		    <div class="<?php if(has_post_thumbnail()) { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>">
		      <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
		      <p><?php the_excerpt(); ?></p>
		      <div class="post-link">
		        <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read Full', 'nikah-wedding' ); ?>"><?php esc_html_e('Read Full','nikah-wedding'); ?></a>
		      </div>
		    </div>
		</div>
	</div>
</div>
<div class="clearfix"></div>