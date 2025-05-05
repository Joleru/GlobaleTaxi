<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eTaxidev' );

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
define( 'AUTH_KEY',         'e^,Vyd=&8k;#5%[E3nrD7+o[O.3GgLyQ$gNplFoG04JB~9mVBD}}{Mou=*[q7asn' );
define( 'SECURE_AUTH_KEY',  '.,K{kL`Sd_l!I<ua@1I *Z:q7|F0@v=K7}GS8{cjUW@I(=4#v ^V)+9ZNe>{S*}*' );
define( 'LOGGED_IN_KEY',    '?w34[fO_&(4pu-sHBu!EP-;-4XjX;L9D2.PX3bKQLD[~//eh@VxK4k#uY9X%{FU!' );
define( 'NONCE_KEY',        'bD?)rdwq/ 41xeozEln*mQrr vG[U260MlC0kOw3(*nPS^)gLV6S9GNAozNd47-w' );
define( 'AUTH_SALT',        '~z&Z] IGtH{$=[gC^+pT^6hV&QA?^` }f}sghZ*?]Vc7a4L1w-E<KalIh4Z|GV J' );
define( 'SECURE_AUTH_SALT', '>}u&C;H/sax-Wt?9qqR@+@7SCeYOG{RNtNp]tDx#Y18-/?_#U&r8YoPJcJ-:%G8w' );
define( 'LOGGED_IN_SALT',   'S{!y_bR+<[+^&+q4PW#vij|_)}MT%E21Xj7fR6:X8x2~[F|<JDB&4K(dwl|LO2eL' );
define( 'NONCE_SALT',       'T1A9R/nEKQM}WJ@R,<g{)l>oKjo@>/hv*n]}F.b&_;ys-&%IX}+#0-meNm*^;TMM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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


define('UPLOADS', 'wp-content/uploads');

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
