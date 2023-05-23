<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'energo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '?PJHfXr||=dQt>WiB}Z:Vkd51k*dHyr.0-aow]>+V~U,{oXDQ|8rMHF#t.!omn-A' );
define( 'SECURE_AUTH_KEY',  ',iRb.CI73Pozhi7Kr/gsA3#$la*S2(Ct4NZJV8g@aD*am_V+_-ksq7C$;}9@Nl;D' );
define( 'LOGGED_IN_KEY',    't.oL?&cZ3Mfgy}`A7j?Z@DK^j_f0QR^4#D_EBLO0qhJZ,]sUOSncI+d/U2:|hW4T' );
define( 'NONCE_KEY',        '_Er[,6}hIO*Dp[`coVR.8>XSOW%wy#ve8qrp>&o 4J&tO7H|S;n,p<UV$j3:U4_s' );
define( 'AUTH_SALT',        'r+}F?<[F-LQ<yGg_=Gq1Jpb;>/s?wY#l{@LsP=1ZBMt6XV.V-mvy;.c@/B@BUb*Z' );
define( 'SECURE_AUTH_SALT', 'kMe:${8jJkQa{5G,YFIkr2%;E#)Q1(Y$IzJan|>:eic7je0,ghn<cs|nj*n{^ZLW' );
define( 'LOGGED_IN_SALT',   '8YE;}uny,W{IMV~1&v:NgJhc:[|-PkS|$m2:=+qKowUMX;,x{H3fg[}d>GQ&J`XO' );
define( 'NONCE_SALT',       '6VRzuVufg:yu;X<Tt3;gXvl/zy%s^~a7M)~bq+.r<Ei,aPZ&MnwzE> ny~;I<N`-' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
