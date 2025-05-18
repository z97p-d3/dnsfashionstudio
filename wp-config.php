<?php
define( 'WP_CACHE', true );


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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u470425667_dns_patrones' );

/** MySQL database username */
define( 'DB_USER', 'u470425667_dns' );

/** MySQL database password */
define( 'DB_PASSWORD', '1PajHq]*6^d');

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'r]GeJ6xR308IZup}}/J/hHb@$&iSSSbQMKpwxF&D0$$22~|m&ffJ8:7E-4bXZG:U' );
define( 'SECURE_AUTH_KEY',   '$N~mb7keTkV5z]*<GS_;a|0N{M?EjzL(m9@[:Ntkn4Mz s4Le(u< jySD7AMA)S)' );
define( 'LOGGED_IN_KEY',     '$!]h4yy%^)bUSp6h]k*Lj*}3Yu<3~!C}4CDxAeMgH.L`&-Q9Dt_nAId01~5J6!2#' );
define( 'NONCE_KEY',         'BSS#MWSy.R6D:GN(b%o)BUP(j$#Vlm0}xN/?zlvo]01qPAa *ysZj.SNz/:@l/L-' );
define( 'AUTH_SALT',         '^I=-D72g<[R<!qX/>j,:5&O(n,f;-,/iPh;hQ7c%h:QFuNJuI0qvyYa7r5aKg.21' );
define( 'SECURE_AUTH_SALT',  '~Ji%&5U3&a2.md-L(M8?L3vAZ:PUH!+*7_W|@N3sf;.A,@=<*e,DpKz4*5EfY{r[' );
define( 'LOGGED_IN_SALT',    '$[l~k0-8b;)kb Kzq|Q@TT`@bz>SFmN?J[hTCde{d)GmiUNk:YBzw>WJ~./=g{:u' );
define( 'NONCE_SALT',        'pr=/[|MzZjske+n4qSp0n_LFhoPFgGz,f|M$$fuMlHlH^|@YQJdfNGRHUd$xKe<k' );
define( 'WP_CACHE_KEY_SALT', 'hQX Xq(|+C,b2*K1a$KXoj.z,:~<,hwgcXWjI*qVoY-.C^9Q!d@[=~{Leh]%6H;2' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'CONCATENATE_SCRIPTS', false );

define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
