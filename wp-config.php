<?php

define('FS_METHOD', 'direct');

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

// ** MySQL settings ** //
/** The name of the database for WordPress */
//define( 'DB_NAME', 'db669365828' );
//define('DB_NAME', 'localwp');
define('DB_NAME', 'contentContinuum');

/** MySQL database username */
//define( 'DB_USER', 'dbo669365828' );
//define('DB_USER', 'wpuser');
define('DB_USER', 'root');

/** MySQL database password */
//define( 'DB_PASSWORD', 'neJRriiAgBZxzPBcOQwO' );
//define('DB_PASSWORD', 'nibbs');
define('DB_PASSWORD', 'root');

/** MySQL hostname */
//define( 'DB_HOST', 'db669365828.db.1and1.com' );
//define('DB_HOST', 'localhost');

define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
//define( 'DB_CHARSET', 'utf8' );
//define('DB_CHARSET', 'utf8mb4');

define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '-#/l=dw||*{/iFeX<hv|:V}_:cV~O,/dqoVt}^R&7E,)+&ory#-~<RC!X}*r{Nsr');
define('SECURE_AUTH_KEY',  'oo3R$yG|:9J<-G-(siW??4jq}bwmNkkN<*q!|Xs4&o98oJQ?&nKA]<{XwWs(<Ne|');
define('LOGGED_IN_KEY',    'tR@8zG9kt7:6(A_RQqpp+-^?*D9(y&C`>~@`gNc<n}~)&xIQQh{%UUmZzzh0s>Pv');
define('NONCE_KEY',        '*Z^>R+NfIy!s?m?69PH%De`7];jJgL@OD:x9<U8lwStu<#S=JiuZ&lO1vD_-(nSE');
define('AUTH_SALT',        'T2,E6GX(p:mUR^Bm1O$1`K56WfMWH8s^`{sDCwv<AL Hi6JVK0g8Vu`+4]SXh)4f');
define('SECURE_AUTH_SALT', 'Z3,Z8M%[Y/2Nf-fAg6/+kX%7mA,r$J6!S*WH5jIN%b)%a@!UVFJoiZ#W?W$c=zR;');
define('LOGGED_IN_SALT',   ']k[2Ku5+22+sVY+:f{M{UgQ$]uv*bIdMwG]-|_OBs/@i^xZ|b i~;E:S|.6z7i#,');
define('NONCE_SALT',       '=4zR^#7-m17QRmX@<i-un2RGt-N_luqFvjdB9?{0.+3C3N^0juueDzGT^K<CO]yc');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nIAXHwyy';

//define('ADMIN_COOKIE_PATH', '/');
//define('COOKIE_DOMAIN', '');
//define('COOKIEPATH', '');
//define('SITECOOKIEPATH', '');

define('WP_HOME', 'http://localhost/contentcontinuumagency');
define('WP_SITEURL', 'http://localhost/contentcontinuumagency');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';


