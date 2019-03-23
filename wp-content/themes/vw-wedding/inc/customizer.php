<?php
/**
 * VW Wedding Theme Customizer
 *
 * @package VW Wedding
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_wedding_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_wedding_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-wedding' ),
	    'description' => __( 'Description of what this panel does.', 'vw-wedding' ),
	) );

	$wp_customize->add_section( 'vw_wedding_left_right', array(
    	'title'      => __( 'General Settings', 'vw-wedding' ),
		'priority'   => 30,
		'panel' => 'vw_wedding_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_wedding_theme_options',array(
        'default' => __('Right Sidebar','vw-wedding'),
        'sanitize_callback' => 'vw_wedding_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_wedding_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-wedding'),
        'section' => 'vw_wedding_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-wedding'),
            'Right Sidebar' => __('Right Sidebar','vw-wedding'),
            'One Column' => __('One Column','vw-wedding'),
            'Three Columns' => __('Three Columns','vw-wedding'),
            'Four Columns' => __('Four Columns','vw-wedding'),
            'Grid Layout' => __('Grid Layout','vw-wedding')
        ),
	) );
    
	//Slider
	$wp_customize->add_section( 'vw_wedding_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-wedding' ),
		'priority'   => null,
		'panel' => 'vw_wedding_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_wedding_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_wedding_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_wedding_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-wedding' ),
			'description' => __('Slider image size (1500 x 665)','vw-wedding'),
			'section'  => 'vw_wedding_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_wedding_slider_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_wedding_slider_button',array(
		'label'	=> __('Slider Button text','vw-wedding'),
		'section'=> 'vw_wedding_slidersettings',
		'setting'=> 'vw_wedding_slider_button',
		'type'=> 'text'
	));


	// Bride & Groom
	$wp_customize->add_section('vw_wedding_bride_groom',array(
		'title'	=> __('Bride & Groom Section','vw-wedding'),
		'description'	=> __('Add Bride & Groom sections below.','vw-wedding'),
		'panel' => 'vw_wedding_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_wedding_groom',array(
		'sanitize_callback' => 'vw_wedding_sanitize_choices',
	));
	$wp_customize->add_control('vw_wedding_groom',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-wedding'),		
		'description' => __('Image size (171 x 146)','vw-wedding'),
		'section' => 'vw_wedding_bride_groom',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_wedding_bride',array(
		'sanitize_callback' => 'vw_wedding_sanitize_choices',
	));
	$wp_customize->add_control('vw_wedding_bride',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-wedding'),		
		'description' => __('Image size (171 x 146)','vw-wedding'),
		'section' => 'vw_wedding_bride_groom',
	));

	// Love Story
	$wp_customize->add_section('vw_wedding_love_story',array(
		'title'	=> __('Love Story Section','vw-wedding'),
		'description'	=> __('Add Love Story section below.','vw-wedding'),
		'panel' => 'vw_wedding_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_wedding_love_story',array(
		'sanitize_callback' => 'vw_wedding_sanitize_choices',
	));
	$wp_customize->add_control('vw_wedding_love_story',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-wedding'),		
		'description' => __('Image size (417 x 270)','vw-wedding'),
		'section' => 'vw_wedding_love_story',
	));

	//Footer Text
	$wp_customize->add_section('vw_wedding_footer',array(
		'title'	=> __('Footer','vw-wedding'),
		'description'=> __('This section will appear in the footer','vw-wedding'),
		'panel' => 'vw_wedding_panel_id',
	));	
	
	$wp_customize->add_setting('vw_wedding_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_wedding_footer_text',array(
		'label'	=> __('Copyright Text','vw-wedding'),
		'section'=> 'vw_wedding_footer',
		'setting'=> 'vw_wedding_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_wedding_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Wedding_Customize {

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
		$manager->register_section_type( 'VW_Wedding_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Wedding_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Wedding Pro Theme', 'vw-wedding' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-wedding' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-wedding-theme/'),
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

		wp_enqueue_script( 'vw-wedding-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-wedding-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Wedding_Customize::get_instance();