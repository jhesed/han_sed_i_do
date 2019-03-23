<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<?php do_action( 'nikah_wedding_page_header' ); ?>

<div class="container">

	<?php while ( have_posts() ) : the_post();?>
    	<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
		<h1><?php the_title();?></h1>
		<?php the_content(); ?>
		
		<?php
	        // If comments are open or we have at least one comment, load up the comment template.
	        if ( comments_open() || get_comments_number() ) {
	            comments_template();
	        }
	    ?>

	<?php endwhile; wp_reset_postdata(); ?>
	
</div>

<?php do_action( 'nikah_wedding_page_footer' ); ?>

<?php get_footer();
