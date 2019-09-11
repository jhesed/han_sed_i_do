<?php    
/**
 *Wedding Bells Lite Theme Customizer
 *
 * @package Wedding Bells Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wedding_bells_lite_customize_register( $wp_customize ) {	
	
	function wedding_bells_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function wedding_bells_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','wedding-bells-lite'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'wedding_bells_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','wedding-bells-lite'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','wedding-bells-lite'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#f02d73',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','wedding-bells-lite'),			
			 'description'	=> __('More color options in PRO Version','wedding-bells-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'wedding-bells-lite'),
            'priority' => null,
			'description'	=> __('Default image size for slider is 1400 x 827 pixel.','wedding-bells-lite'),            			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','wedding-bells-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','wedding-bells-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','wedding-bells-lite'),
			'section'	=> 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_readmore',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('slider_readmore',array(	
			'type'	=> 'text',
			'label'	=> __('Add slider Read more button name here','wedding-bells-lite'),
			'section'	=> 'slider_options',
			'setting'	=> 'slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'wedding_bells_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','wedding-bells-lite'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	  // Welcome section 
	$wp_customize->add_section('welcomarea_section', array(
		'title'	=> __('Welcome Section','wedding-bells-lite'),
		'description'	=> __('Select Pages from the dropdown for welcome section','wedding-bells-lite'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('welcome_page',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'welcome_page',array(
			'type' => 'dropdown-pages',			
			'section' => 'welcomarea_section',
	));		
	
	
	$wp_customize->add_setting('show_welcome_page',array(
			'default' => false,
			'sanitize_callback' => 'wedding_bells_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_welcome_page', array(
			   'settings' => 'show_welcome_page',
			   'section'   => 'welcomarea_section',
			   'label'     => __('Check To Show This Section','wedding-bells-lite'),
			   'type'      => 'checkbox'
	 ));//Show Welcome Page Section
	 
	  // 2 Column wedding couple Section
	$wp_customize->add_section('pageboxs_section', array(
		'title'	=> __('2 Column Wedding Couple Section','wedding-bells-lite'),
		'description'	=> __('Select pages from the dropdown for 2 column wedding couple section','wedding-bells-lite'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('services-pagebox4',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox4',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));		
	
	$wp_customize->add_setting('services-pagebox5',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'wedding_bells_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox5',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('show_servicesbox',array(
			'default' => false,
			'sanitize_callback' => 'wedding_bells_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
			   'settings' => 'show_servicesbox',
			   'section'   => 'pageboxs_section',
			   'label'     => __('Check To Show This Section','wedding-bells-lite'),
			   'type'      => 'checkbox'
	 ));//Show wedding couple Section	 	 
	
		 
}
add_action( 'customize_register', 'wedding_bells_lite_customize_register' );

function wedding_bells_lite_custom_css(){
		?>
        	<style type="text/css"> 					
					a, .recent_articles h2 a:hover,
				#sidebar ul li a:hover,								
				.recent_articles h3 a:hover,					
				.recent-post h6:hover,					
				.page-four-column:hover h3,												
				.postmeta a:hover,	
				.welcome-content h3 span,
				.welcome-content h3:hover,
				.twocolumnbox:hover h3 a,
				.header-menu ul li a:hover, 
				.header-menu ul li.current-menu-item a,
				.header-menu ul li.current-menu-parent a.parent,
				.header-menu ul li.current-menu-item ul.sub-menu li a:hover				
					{ color:<?php echo esc_html( get_theme_mod('color_scheme','#f02d73')); ?>;}					 
					
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,	
				.nivo-caption h2,
				.nivo-caption .slide_more,						
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],				
				nav.pagination .page-numbers.current,
				.twocolumnbox .thumbbx,				
				.toggle a	
					{ background-color:<?php echo esc_html( get_theme_mod('color_scheme','#f02d73')); ?>;}	
					
					
			</style> 
<?php    
}
         
add_action('wp_head','wedding_bells_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wedding_bells_lite_customize_preview_js() {
	wp_enqueue_script( 'wedding_bells_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'wedding_bells_lite_customize_preview_js' );