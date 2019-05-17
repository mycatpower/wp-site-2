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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dev_skaerm' );

/** MySQL database username */
define( 'DB_USER', 'dev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'uiWe-nWVjn_4' );

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
define( 'AUTH_KEY',         ':.*[b9(F%2?YNSiEfDSRV.Cy#E`fWea!)nWLkiQ*Y8I:(B<s!QnXPOOlEhkh~zQO' );
define( 'SECURE_AUTH_KEY',  '^j#o2^zY$H23tuQI<+_OQNNHwPe1w/9j{P`Fk)@`^ZM>[YI@rd|UM,#o,NVD=-1_' );
define( 'LOGGED_IN_KEY',    'RYj,Fr?`Lkx-y0Oc}s,mT:k<oRk&TQslbzR[}k@~hHH;Q#CNVDm#.-uSbWi}8fiR' );
define( 'NONCE_KEY',        '20l)/$EJ|fD ,NHZe}o&z(h- h 1C]OU3wEDr|x0o[vX`b{]DwE7}`K[1dBM:r#}' );
define( 'AUTH_SALT',        'G|EPoU~5|,O:^3oQ@kri{O*gj&Rhrm%X6GCVwl%ZR^wp?RClHsYC}qnBsNz4;S==' );
define( 'SECURE_AUTH_SALT', 'xg7lqLRdPG/;0H>-TkdY}=I0i{.SfF/)4aAGK7|;,]{(!E^9<v,GNp$&EygY;-kC' );
define( 'LOGGED_IN_SALT',   'XrqD$a9uKb?H}&-d=8L4y=MG^y9rQF$ojWcvk:;dnA}BfQ>,-u4CP-zn?a7EC,rm' );
define( 'NONCE_SALT',       'L?RaF]X#w;C6JhfdbFwJ!f-.i-%4!cuxPx^YP>O5=&C(Z1<:B.X:M3B}(|qXJdRU' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define('WP_DEBUG', true);
define('ALLOW_UNFILTERED_UPLOADS', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
