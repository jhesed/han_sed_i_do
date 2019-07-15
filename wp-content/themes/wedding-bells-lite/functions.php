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
	
	// ---------------------------------- Styles --------------------------------------------

	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Great+Vibes', false );	

	// Countdown Timer
	wp_enqueue_style( 'css-ionicons', get_template_directory_uri()."/css/ionicons.css" );
	wp_enqueue_style( 'css-classy-countdown-timer', get_template_directory_uri()."/css/jquery.classycountdown.css" );
	wp_enqueue_style( 'css-countdown-timer', get_template_directory_uri()."/css/countdown.css" );

 	// timeline
	wp_enqueue_style( 'css-timeline', get_template_directory_uri()."/css/timeline.css" );

	// Contact Form
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/fonts/font-awesome-4.7.0/css/font-awesome.min.css" );
	wp_enqueue_style( 'font-linear', get_template_directory_uri()."/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" );
	wp_enqueue_style( 'css-animate', get_template_directory_uri()."/vendor/animate/animate.css" );
	wp_enqueue_style( 'css-hamburgers', get_template_directory_uri()."/vendor/css-hamburgers/hamburgers.min.css" );
	wp_enqueue_style( 'css-select', get_template_directory_uri()."/vendor/select2/select2.min.css" );
	wp_enqueue_style( 'css-contact-form-util', get_template_directory_uri()."/css/contact-form-utils.css" );

	wp_enqueue_style( 'css-contact-form', get_template_directory_uri()."/css/contact-form.css" );

	// Jhesed style
	wp_enqueue_style( 'han-sed-i-do-css', get_template_directory_uri()."/css/han-sed-i-do.css" );


	// ------------------------------------ JS ---------------------------------------------

	// Common - Contact us
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/vendor/bootstrap/js/popper.js' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js' );

	// Countdown Timer
	wp_enqueue_script( 'jquery-countdown-js', get_template_directory_uri() . '/js/jquery.countdown.min.js' );
	wp_enqueue_script( 'countdown-js', get_template_directory_uri() . '/js/countdown-timer.js' );

	// facebook
	// wp_enqueue_script( 'facebook-sdk', "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=532451446826037&autoLogAppEvents=1" );


	// timeline
	wp_enqueue_script( 'timeline-js', get_template_directory_uri() . '/js/timeline.js' );	
	wp_enqueue_script( 'timeline-js-script', get_template_directory_uri() . '/js/timeline-script.js' );


	// RVSP
	wp_enqueue_script( 'rvsp-form', get_template_directory_uri() . '/js/rvsp-form.js' );
	wp_localize_script( 'rvsp-form', 'admin_url', array('ajax_url' => admin_url( 'admin-ajax.php' ) ) );	

	// Jhesed style
	wp_enqueue_script( 'han-sed-i-do-js', get_template_directory_uri() . '/js/han-sed-i-do.js' );


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
 	$data['first_name'] = strtolower(trim($wpdb->escape($_POST['first-name'])));
 	$data['last_name'] = strtolower(trim($wpdb->escape($_POST['last-name'])));
 	$data['message'] = trim($wpdb->escape($_POST['message']));
 	$data['attendance'] = intval($wpdb->escape($_POST["attendance"]));
 	$response['attendance'] = $data['attendance'];

	// Basic validation
 	if (
 		$data['first_name'] == '' 
 		|| $data['last_name'] == ''  
 	) 
 	{
 		$data['error'] = true;
 		exit(wp_send_json($data));
 	}    

 	// Data validation
 	$query = "SELECT id FROM $table_name WHERE first_name = '".$data["first_name"]."' and last_name = '".$data["last_name"]."'";
 	$result = $wpdb ->get_row($query);

 	if ($result == null){
 		$response['error'] = true;
 		$response['ecode'] = 'NOT_FOUND';
    	exit(wp_send_json($response));
 	}

 	// Update attendance value
 	$update_query = "UPDATE $table_name SET attendance = ".$data["attendance"].", message = ".$data["message"]." WHERE id = %d";
 	$wpdb->query($wpdb->prepare($update_query, $result->id));

 	// Send confirmation email
	$message = file_get_contents( get_template_directory() . '/emails/rvsp/confirmation.html');
	mail($result->email, "[han-sed-i-do] Attendance Confirmation", $message); 

 	exit(wp_send_json($response));
}

// ---- Jhesed own scripts end ------------------------>