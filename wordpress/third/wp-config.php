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

define( 'DB_NAME', 'wordpressfour' );


/** Database username */

define( 'DB_USER', 'root' );


/** Database password */

define( 'DB_PASSWORD', '606970' );


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

define( 'AUTH_KEY',         '$_@77uH{_}q6_LCi.eaDwkx`cLG~%yFc#xlnq[aTABe4W|US5jep/)D_l}$0#J2a' );

define( 'SECURE_AUTH_KEY',  'g32&!WY=|DFpx>z%p]MhVeq-^{8:S8}@whF?Q$@`2* #eofNf4fy2y62M1~s[/W$' );

define( 'LOGGED_IN_KEY',    'S!BY^i*)GeSm*YfMoXp%YK)QCxFv.W_l~fvILk<u`h9F*G^g<?1Rnct4<s j*0GJ' );

define( 'NONCE_KEY',        '*R+I)$sGfp}J@lNMMYjouryhi% i=3{rK[_:L]@|!Oa#D7P=.0>Tsvdv)S^OH>5,' );

define( 'AUTH_SALT',        'xc!7d^HjMyapeV}t_N9zAG.`Xyn iX_i*&D.vuGlr#exjrVIp+*U=GMrms2&IG;Z' );

define( 'SECURE_AUTH_SALT', 'QDP2?jOE.^6_sWrKrCuEF8UZ)1 ma!yve]z boV<|PeMoQjWcNbk/B?7o)hc/i=.' );

define( 'LOGGED_IN_SALT',   'ax*(^@FKCLk[<#q5Zum{nm`L%dM;=Q{UZ--`=x?}GM_V$ PV2qrIs^:uJ[1LilbV' );

define( 'NONCE_SALT',       'Kc7y(G~1!48meHa`YQztju&<liM6gPgY?X~8!1]}+CU$tj^EBa]/WJ?S+/D+urhR' );


/**#@-*/


/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


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




define( 'MO_SAML_LOGGING', false );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

