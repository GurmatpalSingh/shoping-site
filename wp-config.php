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
define('ALLOW_UNFILTERED_UPLOADS', true);
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gps-pablo' );

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
define( 'AUTH_KEY',         'hrdBiuAC@6WB;p/ZO*vqF.ykFU@4|zG>`>a_{QF00fs-<~@, xrS,iFudJ0Bzo<G' );
define( 'SECURE_AUTH_KEY',  'hX[3wgt03z{.D9FydG+W-pK3P%|_s)[/q>mo2@?0r9UrKtcXS>!E@UHli%$+<l|e' );
define( 'LOGGED_IN_KEY',    '/G?-^6KKNO1l:1nNl*L22fTF)>v(Xjibr,^y/![&d@:Dy ]#9%q)|QrE7::13}YR' );
define( 'NONCE_KEY',        'T*w#hO3C|~6R7.8dG?qc-Q=VH6FiEkw|67pb8E ${v -)t.t:6OdP,S!<_,ZJ4Y^' );
define( 'AUTH_SALT',        '7[#%Hbi~Z9[p})cJh`nULRa&k:8K0.FeFz&d=(_{$um%NiM1om|r@6*ySia;synu' );
define( 'SECURE_AUTH_SALT', '] xZO%s~TALu93Z}un?>I+ _va}W7kGdP,n)(nn1W&6cjN-;56xcG;_8j~lz;d_R' );
define( 'LOGGED_IN_SALT',   'q9}#FGF9%7%S96N!kMz3qm6a{w_a$)^=(M(I  r|:_-pz?8rP$wt2h?gD1UC]rDv' );
define( 'NONCE_SALT',       'GKo]K0mk)SP.dzUH->2lN9sqKDF?Y5Q]E#.Ua:IPa,KfZn( VB6mSOfEW?O>;9GJ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gps_';

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
