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
define('AUTH_KEY',         '7NU z<GE/<V)<Z;+sWF/%*9Q~a}Xe!t)c<CUX}$ReSm8Yx@KS3qGICN4):^3O*e&');
define('SECURE_AUTH_KEY',  'd2/&{O`]_K|0hj|m-0c9$P+s,YF5#,1lvUBf:eicLUYv,_[9}t]I_Ay(|]E,||{N');
define('LOGGED_IN_KEY',    'mY~9|,rYC-M}i?$tk8<pLB=-Cw1tawib7@y0ff=*~6%0N:w<w([@;&npk@Il:](q');
define('NONCE_KEY',        'oJ*/>1|rw[/_]EN4Il>Wgc;*9Bj^J+%kNyXZL=q1OSUqSs$,%D5>!AM6|zLavx7$');
define('AUTH_SALT',        '`7 <JmXyq;Q$noaG?jI1rcmn5bf:-gJ;;uA;ID &IfB/7t:zruR7o9DKDUfqav2(');
define('SECURE_AUTH_SALT', 'o4>sS]z-cBBXLu6:TtE:!Fy[DIO88@v@bgDO>|I}2<1ld%9,@nV<_{`PNCdgZ4|G');
define('LOGGED_IN_SALT',   'tZ{L NqI#yjv]=zX<%,py1|GvV7<OLHl>E-Q_P/xjj%_Dl P*DqF2Vh:tf)P|x+_');
define('NONCE_SALT',       'kJbVXUaatafk*)jse7tWe1U=[oqG_I5HE+ Cz?F1YY2@[2nJ1u^PU9Gvj`fD?!T@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_2_';

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
