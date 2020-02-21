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
define( 'DB_NAME', 'portalwh' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '1@KeHZ[S({;SjU^/E^m=<(QbHbu>xHxK-gL&TU1oMt]>twsL2H!$_bydh(q+!AMe' );
define( 'SECURE_AUTH_KEY',  '@3-VWLZ|{YTlCQ G}$+`@ky] w?ckE)GWox(yMooNlVHi@&+Hw &(GM? K?KlzYv' );
define( 'LOGGED_IN_KEY',    'kiV$XU4/dX3]B;z`)>X|<V{kqKI0_J{=-iYJ%^iu$!95mUf&)e%o3XR8rZ<.g.|Z' );
define( 'NONCE_KEY',        'P&).KJ-Z`lmbC*hGb34tD,IL}>9wH!!xU~)p-XJd@)s7X}/6R(mK4s~0y82at{zM' );
define( 'AUTH_SALT',        '@Kwdr X`DO{~@z9tm]ZHOdi:Z6IxB?._KXb{sOsjg+=6Kbd;pM$Xc=%XHc]w!-te' );
define( 'SECURE_AUTH_SALT', 'Fe+SjeiXRJ;}0^6*UMCD<g Rqqzu_tYIq@PzuyISN2jwI*t9@fl%7Q$C9eqtp;sL' );
define( 'LOGGED_IN_SALT',   '!_q%w9J^jkcxg>5Ya6jwVA]PF%xkT@nhAg{FhKnM[TEG1SW[&y1rVY| G``9[q@h' );
define( 'NONCE_SALT',       'IY^;=8{mjB47w.Pf*2g`&g![/ln,;@Y%6mp!%7KiD.nDkH(u:CWT//WziM`!>MLQ' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
