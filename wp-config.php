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
define('DB_NAME', 'hub');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Qx]f_JQY_8~FI>(nCItqnH,+j,|o,e.@S-J`YSWU~W< gI;(Cj?y}NQ:uU}:ngBZ');
define('SECURE_AUTH_KEY',  'iMkSy.XY7x&-MW4X.K=O|M9)I:r1)YH]~ T8#!xs|$6UPMwLrK5r]W$1iG>o >#t');
define('LOGGED_IN_KEY',    'AR&=$}`~ 9W6 UjaH~O_?3j|L2V32v yxH6[=su<%F%dz?5uv0Ug815c<G{kaL^$');
define('NONCE_KEY',        'l1*;DtV8N<O;6WA: g^~pqw}(jEn%M$hS*0QDwte7&ZZU)2/dY{,XOmNz:$~w`6;');
define('AUTH_SALT',        '$o_#_{WceAa}$Ii,HTM[c<NJa;:J,kcXLHecZV~>zxGVZ<e}.sQG,qG3nsG[C%~~');
define('SECURE_AUTH_SALT', '::SH^4M90}n>57KmZezO!S=#s7L844]|o/kU?Rrwq#3xvD<BfA%IEAC/pc#lV+p[');
define('LOGGED_IN_SALT',   'Rcc.%3hE:e4Y=Lp;`[x5(`0VBBTe>[[AzB[2bSGiVLkj!B8$OFf<-g.;PsIe<[Aw');
define('NONCE_SALT',       '4v:! 198tM2301VE`~$T&@w.T<^hA9r =[rIV7^ZP!wWmawh^`!`6778R1$]7U@v');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
