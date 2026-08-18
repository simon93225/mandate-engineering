<?php
/**
 * Mandate Engineering — WordPress configuration (bare metal).
 *
 * Copy/adjust the DB_* values below to match your server, then save this
 * file as wp-config.php in the WordPress root (next to wp-settings.php).
 */

// ** Database settings ** //
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'wordpress' );
define( 'DB_PASSWORD', 'wordpress_password' );
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 */
define('AUTH_KEY',         'j&JY=]L+A.[%LH[w0W(p|dG|LVyq[~%|~S*rY?[A;TJ0pjaV[9o2uNRp[d:`ocF`');
define('SECURE_AUTH_KEY',  'dl B!ol7:9[-i1RL Q)-C5&zm #MJY*Wy n.Dbf~I/-X2-Ep$>6FNJt(}`U2<>wu');
define('LOGGED_IN_KEY',    'yp?LrAJ1}zb&_Tjwoh74bK~4NU)X}pC>&_}e>y/JtgCBt(p-W_I<0,)]x`@7Lpcv');
define('NONCE_KEY',        'e+`(2w:i.H`A-(-$<,O)7V>q1(cN)3~e%(dE+h_3TZGdxw=IdP8Li6Pb^Hr}m3(Q');
define('AUTH_SALT',        'I~yW))(Z%`:VGKz%UC-v:(SH)-J+FidRB qEq}<%TvE3/g]([*YCuWUow2?*]/q*');
define('SECURE_AUTH_SALT', 'NOX@|[TK, 1(:2?|XB!bF&bcP*>}z(ZfyC J;0i+KkOQpz?}Dmb9DZ{+PQI.,}/B');
define('LOGGED_IN_SALT',   '4&f2tj||r >*hZt{XB]`k-6hob2|5:Rm*vo!n?-FLO|9y+dn)Js5Kz;,|A<OvGg(');
define('NONCE_SALT',       'hZRRnWK~Ul;[Uep#6Blgl7(3ro0v#Y%k2$Bfn?rdZNhx|+*-.}L+{F~#G5U!Gp,M');
/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

/** Site URL — update to your live domain or IP before going live. */
define( 'WP_HOME', 'http://mandateengineering.com' );
define( 'WP_SITEURL', 'http://mandateengineering.com' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';