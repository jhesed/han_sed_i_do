<?php
/**
 * Function describe for ZenGardenWedding 
 * 
 * @package zengardenwedding
 */

if ( ! function_exists( 'zengardenwedding_fonts_url' ) ) :
	/**
	 *	Load google font url used in the zengardenwedding theme
	 */
	function zengardenwedding_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Karla, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Karla font: on or off', 'zengardenwedding' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Karla';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // zengardenwedding_fonts_url

if ( ! function_exists( 'zengardenwedding_load_css_and_scripts' ) ) :

	function zengardenwedding_load_css_and_scripts() {

		wp_enqueue_style( 'allingrid-stylesheet', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'zengardenwedding-child-style', get_stylesheet_uri(), array( 'zengardenwedding-stylesheet' ) );

		wp_enqueue_style( 'zengardenwedding-fonts', zengardenwedding_fonts_url(), array(), null );
	}

endif; // zengardenwedding_load_css_and_scripts

add_action( 'wp_enqueue_scripts', 'zengardenwedding_load_css_and_scripts' );

if ( ! class_exists( 'zengardenwedding_Customize' ) ) :
	/**
	 * Singleton class for handling the theme's customizer integration.
	 */
	final class zengardenwedding_Customize {

		// Returns the instance.
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		// Constructor method.
		private function __construct() {}

		// Sets up initial actions.
		private function setup_actions() {

			// Register panels, sections, settings, controls, and partials.
			add_action( 'customize_register', array( $this, 'sections' ) );

			// Register scripts and styles for the controls.
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
		}

		// Sets up the customizer sections.
		public function sections( $manager ) {

			// Load custom sections.

			// Register custom section types.
			$manager->register_section_type( 'zenlife_Customize_Section_Pro' );

			// Register sections.
			$manager->add_section(
				new zenlife_Customize_Section_Pro(
					$manager,
					'zengardenwedding',
					array(
						'title'    => esc_html__( 'ZenGardenWeddingPro', 'zengardenwedding' ),
						'pro_text' => esc_html__( 'Upgrade', 'zengardenwedding' ),
						'pro_url'  => esc_url( 'https://zentemplates.com/product/zengardenweddingpro' )
					)
				)
			);
		}

		// Loads theme customizer CSS.
		public function enqueue_control_scripts() {

			wp_enqueue_script( 'zenlife-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

			wp_enqueue_style( 'zenlife-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
		}
	}
endif; // zengardenwedding_Customize

// Doing this customizer thang!
zengardenwedding_Customize::get_instance();

/**
 * Remove Parent theme Customize Up-Selling Section
 */
if ( ! function_exists( 'zengardenwedding_remove_parent_theme_upsell_section' ) ) :

	function zengardenwedding_remove_parent_theme_upsell_section( $wp_customize ) {

		// Remove Parent-Theme Upsell section
		$wp_customize->remove_section('zenlife');
	}

endif; // zengardenwedding_remove_parent_theme_upsell_section

add_action( 'customize_register', 'zengardenwedding_remove_parent_theme_upsell_section', 100 );
