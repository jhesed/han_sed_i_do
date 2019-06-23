<?php  
/**
 * Wedding Bells Lite functions and definitions
 *
 * @package Wedding Bells Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'wedding_bells_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function wedding_bells_lite_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'wedding-bells-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wedding-bells-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // wedding_bells_lite_setup
add_action( 'after_setup_theme', 'wedding_bells_lite_setup' );
function wedding_bells_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'wedding-bells-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'wedding-bells-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'wedding_bells_lite_widgets_init' );


function wedding_bells_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Assistant, trsnalate this to off, do not
		* translate into your own language.
		*/
		$assistant = _x('on','Assistant:on or off','wedding-bells-lite');	
		
		/* Translators: If there are any character that are not
		* supported by Oleo Script, trsnalate this to off, do not
		* translate into your own language.
		*/
		$oleoscript = _x('on','oleoscript:on or off','wedding-bells-lite');				
		
		    if('off' !== $assistant || 'off' !== $oleoscript ){
			    $font_family = array();
			
			if('off' !== $assistant){
				$font_family[] = 'Assistant:300,400,600';
			}
			if('off' !== $oleoscript){
				$font_family[] = 'Oleo Script:400,600,700';
			}
							
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function wedding_bells_lite_scripts() {
	wp_enqueue_style('wedding-bells-lite-font', wedding_bells_lite_font_url(), array());
	wp_enqueue_style( 'wedding-bells-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'wedding-bells-lite-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'wedding-bells-lite-editable', get_template_directory_uri() . '/js/editable.js' );


	// <---- Jhesed's own scripts ---------------------------
	
	wp_enqueue_style( 'timeline-normalize-css', "https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" );
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Great+Vibes', false );	
	wp_enqueue_style( 'timeline-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800', false );	
	wp_enqueue_style( 'swiper-css', "https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css");
	wp_enqueue_style( 'timeline-css', get_template_directory_uri()."/css/timeline.css" );
	wp_enqueue_style( 'han-sed-i-do', get_template_directory_uri()."/css/han-sed-i-do.css" );

	wp_enqueue_script( 'facebook-sdk', "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=532451446826037&autoLogAppEvents=1" );
	wp_enqueue_script( 'swiper-js', "https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js" );
	wp_enqueue_script( 'timeline-js', get_template_directory_uri() . '/js/timeline.js' );
	wp_enqueue_script( 'han-sed-i-do-js', get_template_directory_uri() . '/js/han-sed-i-do.js' );
	wp_enqueue_script( 'rvsp-form', get_template_directory_uri() . '/js/rvsp-form.js' );

	// ----------------------------------------------------->

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wedding_bells_lite_scripts' );

function wedding_bells_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('wedding-bells-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'wedding-bells-lite-style' ), '20160928' );
	wp_style_add_data('wedding-bells-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'wedding-bells-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'wedding-bells-lite-style' ), '20160928' );
	wp_style_add_data( 'wedding-bells-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'wedding-bells-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'wedding-bells-lite-style' ), '20160928' );
	wp_style_add_data( 'wedding-bells-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','wedding_bells_lite_ie_stylesheet');

define('WEDDING_BELLS_LITE_THEME_DOC','https://gracethemes.com/documentation/wedding-bells/#homepage-lite','wedding-bells-lite');
define('WEDDING_BELLS_LITE_PROTHEME_URL','https://gracethemes.com/themes/wedding-wordpress-theme/','wedding-bells-lite');
define('WEDDING_BELLS_LITE_LIVE_DEMO','https://gracethemes.com/demo/wedding-bells/','wedding-bells-lite');

if ( ! function_exists( 'wedding_bells_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function wedding_bells_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// <---- Jhesed's own scripts ---------------------------

add_action( 'wp_ajax_rvsp_submission', 'rvsp_submission' );
add_action( 'wp_ajax_nopriv_rvsp_submission', 'rvsp_submission' );
function rvsp_submission() {
	/* Handles RVSP reservation logic */

	// Initialization
  	global $wpdb;
  	$table_name = "jh_guests";
    $response = array(
    	'error' => false,
    );
    $data = array();

	// Retrieve parameters 
 	$data['first_name'] = trim($wpdb->escape($_POST['first-name']));
 	$data['last_name'] = trim($wpdb->escape($_POST['last-name']));
 	$data['attendance'] = trim($wpdb->escape($_POST['attendance']));

 	// Basic validation
 	if (
 		$data['first_name'] == '' 
 		|| $data['last_name'] == '' 
 		|| $data['attendance'] == '' 
 	) 
 	{
 		$data['error'] = true;
 		exit(wp_send_json($data));
 	}    

 	// Data validation
 	$query = "SELECT id FROM $table_name WHERE first_name = '".$data["first_name"]."' or last_name = '".$data["last_name"]."'";
 	$result = $wpdb ->get_row($query);

 	if ($result == null){
 		$response['error'] = true;
 		$response['ecode'] = 'NOT_FOUND';
    	exit(wp_send_json($response));
 	}

 	// Update attendance value
 	$update_query = "UPDATE $table_name SET attendance = ".$data["attendance"]." WHERE id = %d";
 	$wpdb->query($wpdb->prepare($update_query, $data["attendance"]));
 	exit(wp_send_json($response));

}

// ---- Jhesed own scripts end ------------------------>