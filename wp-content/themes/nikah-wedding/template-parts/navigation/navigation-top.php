<?php
/**
 * Displays top navigation
 */
?>

<header id="masthead" class="site-header" role="banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo">
          <?php if( has_custom_logo() ){ the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; }?>
        </div>
      </div>
      <div class="col-lg-9 col-md-9">
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'nikah-wedding' ); ?>">
			<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
					esc_html_e( 'Menu', 'nikah-wedding' );
				?>
			</button>

			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
			) ); ?>				
		</nav>
      </div>
    </div>
  </div>
</header>