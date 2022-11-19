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
define( 'DB_NAME', 'kopikoding' );

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
define( 'AUTH_KEY',         '{Bj4ayRL bTWQ[](~vhEXbm=tYf3^=2/Jm.+/Oz4zj!Guc,s. 6:i/VjW;+q(E]e' );
define( 'SECURE_AUTH_KEY',  'ou bucfIA%Ca0RSP1CD#!f`l*$y(3A:;&&e{!(cb7M.*;*(am^vfgso/qd@a3fIU' );
define( 'LOGGED_IN_KEY',    'E;9R3askeRX?iflr5{E>_Lhy](%PKi7RF)/Lp+<5onCFwDiEz,A]L>6L=U[4_<I_' );
define( 'NONCE_KEY',        '1^];X@wt4=P)0OM_t;cZtv|%C>fGEvsN{1ZiU0J:jqY8}PR#!=7/5 YWxAV/T*Bm' );
define( 'AUTH_SALT',        'br(;*MXhI:cgm/yxx84>?7dBbpBaYm1Pz9=+*>AxZPv-Ab|=LY8J!5=VkiRXAk{u' );
define( 'SECURE_AUTH_SALT', 'hfp^mMZm^F[e>=%`q:NRq`CcryVG(1Bpg>JY<}1Qt}4pqqdfo)) VGCi23afjBM0' );
define( 'LOGGED_IN_SALT',   '[Sh^MUW>m;H`AxS;*hCm==Z;=@G3?y~u,CPY+gIV5MQixgWX{&ZI%3NfjtlCbG)P' );
define( 'NONCE_SALT',       'BbKCV*BTuJfhI=sxN)pRqk;3Kx@/FJ ^e?K=R3CZT_}t5xC-<`*g,<.Y9.jlxm9W' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kk_';

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
