<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aca_website');

/** MySQL database username */
define('DB_USER', 'aca');

/** MySQL database password */
define('DB_PASSWORD', '@cpC0Mvn17y');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** increase mem limit so admin panel won't crash **/
define('WP_MEMORY_LIMIT', '64M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'WoS?SQ+M#j]Y.5& cH?Q=d@UPm-KCL:V%ui<D+Q0jp%4!4>Z[U0LoE++1+^==PSO');
define('SECURE_AUTH_KEY',  '[AO>37,Yz`jc7b%9M*wD66`X|v13~c@!A`|7,$ |j?&5_O7lylM>{Cw4;31<raY2');
define('LOGGED_IN_KEY',    '$H:H4G=${*KQm9*$D?4e!@9}l,hX/H)$`b]5z!5JGRFF1!.<5]He{;dN^(sco@8@');
define('NONCE_KEY',        '5Q.HIXw|6sq5DyuI$;@.`0HK}+#1Koe{7|:)e9rCoB2,Za5-oU )Mnm*>{DT)fVr');
define('AUTH_SALT',        'Uq[7TdlFv9q+xD(x_o6811cr-.ABaAR_7d;=Y1aO&0+KT*lM4!-&-Kf(c&39`E`#');
define('SECURE_AUTH_SALT', 'e5M]FMQ+vCKS_@-e[9;_*&MgPoFcf$ Us~5cv|/XG_Ru 9SvL3zW~X<U)ja<t@lq');
define('LOGGED_IN_SALT',   'o{`N[146L5_D0K>$|?+|56D~3@~_;!iD*q}p#v=_$L>/Q%h$l h$>`[,V$&Hy0O|');
define('NONCE_SALT',       'L%{&Ps4sj7wZJO?PuC^bG{0bN|WUAh-hge,AL$>+TNJ-+q!0xo?(^Ji)Rmm#hhYx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD', 'direct');
