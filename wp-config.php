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
define( 'DB_NAME', 'catalyst_wpmudev_host' );

/** MySQL database username */
define( 'DB_USER', 'catalyst' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mrn3ViJXNnT2WOo' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

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
define('AUTH_KEY',         ')A+l`R|C_>vv<UQL-31>RP,+}>T6ydKWHQV$*3s?p5-HXXl=s5@y-c48n}^d.mWB');
define('SECURE_AUTH_KEY',  '.7e,+x+fJz!:TpX ^(uGgl _,C -5lD:@[,.e:Tm</zgv)+hPD#TD)<6EeV23f.Y');
define('LOGGED_IN_KEY',    '||kk3T?4L8xd<k[z~/*{z;-9KX#lOO|u+|687bqbo/SqDP{Bz)jS-eNQ?tqFY*J(');
define('NONCE_KEY',        '!A*JtW[~!8iO(/%KCqkhZS1!]b4L-Q_d)b?kUJO:/p(Z5uq[B;Tm_=KRWZ==pDmD');
define('AUTH_SALT',        'DNsX|l]&MLAzYcXchM $4#.PHRej)aHpbj)Wr#q!HrC~UV<e{e01`*x%@X5&0Zt-');
define('SECURE_AUTH_SALT', 's8gY}f2zb*u806h|7#C,*J:)hj4j)6KqCBfa n9sXjH9OH>mUcK3&8a4 H&Udxb[');
define('LOGGED_IN_SALT',   'rhA|ohPME-]y92Rmt:$gzQEV,p2u%`1(*`&:Hh|k|^!Z_kiPKF7A6tA5[B]:[+Gd');
define('NONCE_SALT',       'gn|YanSvQSz`i|KR4uA47O^r?s`SEW:i:kVm>g(X%~?9$|c5!z)4(s}xua{jYA4T');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/**
 * Revisions cause a huge increase in DB size that can become a performance issue.
 *
 * We only recommend enabling them on non-multisite installs and set it to a sane number like 5 max.
 */
define( 'WP_POST_REVISIONS', 5 );

/** Disable the Plugin and Theme Editor, this can improve security and is a Defender hardening rule. **/
define( 'DISALLOW_FILE_EDIT', true );

/** WPMU DEV NOTICE
 * Before making any changes and to avoid any accidental errors
 * please check our docs page for the protected constants.
 *
 * https://premium.wpmudev.org/docs/hosting/tools-features/#wp-config-php-constants-protection
 */

define( 'WP_CACHE', true ); // Added by Hummingbird
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
