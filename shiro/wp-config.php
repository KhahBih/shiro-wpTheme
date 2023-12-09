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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shiro' );

/** Database username */
define( 'DB_USER', 'shiro' );

/** Database password */
define( 'DB_PASSWORD', 'Khahbih1307' );

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
define( 'AUTH_KEY',         '^zNQng1!J.!.#r1fuSr/O6$&$xV`+N&7JQ]hrj`zx/Sn5;|Eaw+r<&Q;>3,!Vw5Z' );
define( 'SECURE_AUTH_KEY',  ')&4!qRTdHoj&/Nh>tIB+GnkY7Ia%kbf2qHO`JgqfA(<yhh:Y;j1ht#c C&jq[u)k' );
define( 'LOGGED_IN_KEY',    '!XkD5ir:0yL4esV;(4m;$.Q^~wLi|d`cWDIF X`R1]lv(EdQ 1~J9+D*y8&dP3?M' );
define( 'NONCE_KEY',        '~ukNJ,g`F1-DSDp5yx38AN*)&sc0jWn,395:V*XF~?]<dqumSJ^)WNWT3e1E5X&g' );
define( 'AUTH_SALT',        'kG<S%zNL3~WG_tr M<0Vc-*C[/&a/mO9+@_M4x9Si/raJ .E^Kw~Hht~c.5Q}jY6' );
define( 'SECURE_AUTH_SALT', 'W~szSX0+u] qJXj2/%=x{6N*3%E5GQnXU?ABEc(Q(QtEvlzq8SyqG^(U[t*zfi]!' );
define( 'LOGGED_IN_SALT',   'L}6Z)&l{2vF;q wg<OOEd1*yRT]eAQ|J?/;Y$eIIes+i~?dNC7}R~{=?JlC=,~wV' );
define( 'NONCE_SALT',       'B3bL)F$|K|^s,K3eP0Y(ByiT$|s%_JdW)u-l`zH_[+N/K&t{7Q_4ytz?l?%;ue[S' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'SAVEQUERIES', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
