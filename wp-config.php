<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jhesedhannah' );

/** MySQL database username */
define( 'DB_USER', 'jhesedhannah' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345jhesed' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
// define( 'DB_HOST', '192.168.1.25' );


/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7,*G{ECH14=Yh:Iwg(gh>AQS92q:NmxAL*|yF>F|N{140j6`e,2@iexf@P5l`8&W' );
define( 'SECURE_AUTH_KEY',  '|2[Ci33)C]Aj@W*q:0^  2.*cSgNY7@A*>B-5JgH1$-Y#AL=yx5`etho./TOf5_T' );
define( 'LOGGED_IN_KEY',    '(6iilJskz/:(K {W%y(:/nThFw7!qce}x#liyQI:De5s(#N`/xk>f7[#bX6{4Bl_' );
define( 'NONCE_KEY',        'ap:VBY.Yf]|$&y$VGJhmLhD6=wJu SexL}u-})[vGN$?^2krc$qpsXuC3gMsDUfQ' );
define( 'AUTH_SALT',        'BIO<@D%=TklB(k!| R{8O-6ulc#6bIIRWg2Zb_e~WK]s$uY44MeT@Qpx|g{(jH=I' );
define( 'SECURE_AUTH_SALT', '3lz*|I5AH_`=ZY(FOsdh9>IO)Z~}IaU;<Wg=PNt@Kr91I)8LVLxj>A3-]e@Q{SQ+' );
define( 'LOGGED_IN_SALT',   '.w!?e]9xv3UWM<67*g7L@iIropQ]~q~`<#ElY5hmklYiEBA7LDsOnDZoOMfNQ#V2' );
define( 'NONCE_SALT',       '!*yvA6|hziW)8KQYbg/+$c6R}I9Tnx@S/$0F=,EUc)a,Z+!|P>v0kO&0Iha5Y77]' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
// TODO: Jhesed 
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
