<?php
/**
 * Nikah Wedding: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nikah_wedding_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'nikah_wedding_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'nikah-wedding' ),
	    'description' => __( 'Description of what this panel does.', 'nikah-wedding' ),
	) );

	$wp_customize->add_section( 'nikah_wedding_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'nikah-wedding' ),
		'priority'   => 30,
		'panel' => 'nikah_wedding_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('nikah_wedding_layout_settings',array(
        'default' => __('Right Sidebar','nikah-wedding'),
        'sanitize_callback' => 'nikah_wedding_sanitize_choices'	        
	));

	$wp_customize->add_control('nikah_wedding_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Layouts', 'nikah-wedding'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'nikah-wedding'),
        'section' => 'nikah_wedding_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','nikah-wedding'),
            'Right Sidebar' => __('Right Sidebar','nikah-wedding'),
            'One Column' => __('Full Width','nikah-wedding'),
            'Grid Layout' => __('Grid Layout','nikah-wedding')
        ),
	));

	//home page slider
	$wp_customize->add_section( 'nikah_wedding_slider' , array(
    	'title'      => __( 'Slider Settings', 'nikah-wedding' ),
		'priority'   => null,
		'panel' => 'nikah_wedding_panel_id'
	) );

	$wp_customize->add_setting('nikah_wedding_slider_arrows',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('nikah_wedding_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','nikah-wedding'),
      	'section' => 'nikah_wedding_slider',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'nikah_wedding_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'nikah_wedding_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'nikah_wedding_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'nikah-wedding' ),
			'section'  => 'nikah_wedding_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//The Story of Love Section
	$wp_customize->add_section('nikah_wedding_love_story',array(
		'title'	=> __('The Story of Love Section','nikah-wedding'),
		'description'	=> __('Add The Story of Love sections below.','nikah-wedding'),
		'panel' => 'nikah_wedding_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('nikah_wedding_love_story_setting',array(
		'sanitize_callback' => 'nikah_wedding_sanitize_choices',
	));
	$wp_customize->add_control('nikah_wedding_love_story_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','nikah-wedding'),
		'section' => 'nikah_wedding_love_story',
	));

	//Footer
	$wp_customize->add_section( 'nikah_wedding_footer' , array(
    	'title'      => __( 'Footer Text', 'nikah-wedding' ),
		'priority'   => null,
		'panel' => 'nikah_wedding_panel_id'
	) );

	$wp_customize->add_setting('nikah_wedding_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('nikah_wedding_footer_text',array(
		'label'	=> __('Add Copyright Text','nikah-wedding'),
		'section'	=> 'nikah_wedding_footer',
		'setting'	=> 'nikah_wedding_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'nikah_wedding_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'nikah_wedding_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'nikah_wedding_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Nikah Wedding 1.0
 * @see nikah-wedding_customize_register()
 *
 * @return void
 */
function nikah_wedding_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Nikah Wedding 1.0
 * @see nikah-wedding_customize_register()
 *
 * @return void
 */
function nikah_wedding_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function nikah_wedding_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Nikah_Wedding_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'nikah_wedding_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new nikah_wedding_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Nikah Wedding Pro', 'nikah-wedding' ),
					'pro_text' => esc_html__( 'Go Pro', 'nikah-wedding' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/wedding-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'nikah-wedding-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'nikah-wedding-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Nikah_Wedding_Customize::get_instance();