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
define('DB_NAME', 'sql0706008');

/** MySQL database username */
define('DB_USER', 'sql0706008');

/** MySQL database password */
define('DB_PASSWORD', 'qOJdFuXG');

/** MySQL hostname */
define('DB_HOST', 'lochnagar.abertay.ac.uk');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '3w.DRFyNHa$>b+Q*9D,a/h92-5^gZX|n4T4aeJ0AN;zg)?S+Cp;+@Z!&gC$gVvs.');
define('SECURE_AUTH_KEY',  'k6)ENS2Pr<&[.&&8hs$X,h6ZnhfU}5Ls[ptRAMl$)Ij%3#rHw@D@fEN-ae!#5`@`');
define('LOGGED_IN_KEY',    'kRruPf#Ls|+ybhZ#ZUk(z0sBQG@xW-*eR*SXf<;  %seXo{CShKJWXDU`JVVvFxO');
define('NONCE_KEY',        'R>eLo8d$(4$4e#X>zq[Z?zuWKoz~NEW.5Y6zUcL/5Xt+6 %5O+7eu7r*{eC:,*1G');
define('AUTH_SALT',        'bW:-R#3s=j:38~]p=|]SJK%:baZ$-A^$0+f6u_7E7DlWm6c|:Mrz.+P4I=(PjMsC');
define('SECURE_AUTH_SALT', 'N|g#z;0ykaz;:&Oi}i)-kK|A,K#v+C-MMw6l=9>>;$M4k-jMUP2I.b+2L%lBy0Sp');
define('LOGGED_IN_SALT',   'qT]VEV7+n$7KjwpWJ#i?@V}G]oPeOB5=Id?!c nR$EaoP($xr#L]UVVdlNmT?&Yc');
define('NONCE_SALT',       '77vM0Nr )7HZE[+uE<(hs/e^u7+K.&/HrU`gHe3k0&j,QMMS0vf0+V^l`cuL+eJ(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_social_';

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
