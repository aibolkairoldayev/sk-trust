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

define( 'DB_NAME', "ibitrixk_sktrust" );


/** Database username */

define( 'DB_USER', "ibitrixk_sktrust" );


/** Database password */

define( 'DB_PASSWORD', "L9!kf83y3" );


/** Database hostname */

define( 'DB_HOST', "srv-pleskdb53.ps.kz" );


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

define( 'AUTH_KEY',         'I[}2w@_;Ec^OHD9217yJy8w$bGD^6KjbKg9C-cpd8$5{HQVD*C@Tsh%a#9i:m36a' );

define( 'SECURE_AUTH_KEY',  'DD>d_a5%-E6IHQ?~12 5Lr6_jMgYu|yT<h`!pC2]@yhKZ=ogiXF<XRpd+z|Jx<WB' );

define( 'LOGGED_IN_KEY',    '5+@9gT5`$~D($RJf 9CjV=uju7ef;_CC?+BF%6rlQfZM IBv3O*J!Bs8jt=Wb_oQ' );

define( 'NONCE_KEY',        '5%/^%Bq(uN(jp/]P>Sjm3Rph2UVe)vcP=n6w<Er%A[6Ly2,p#M:iK#f.<EPwN$UR' );

define( 'AUTH_SALT',        '^MElIHp;exdl??*_)lEKpkcEv?HBJu*Y(7eOJ1^p2%L-i_I<%~juFqqg@Pxq=(WI' );

define( 'SECURE_AUTH_SALT', 'hjQG,]m^zXS?ug)o.JPv<FKBZlwEo+N#Mz<`{D)_edNY%7uqM!KW#;g?i@w`eH?v' );

define( 'LOGGED_IN_SALT',   'gIapL,EV);0<yAq($+9f4pJ.XWhnu9[cbFHnL[1hjgfv%+*p#lP1Hl>+e*;s~qiL' );

define( 'NONCE_SALT',       ';,4x@;C(758hvsgGuIhx!^,4J=i>PMT,8z:te[,>g)G0>Ka XsJ1O?<Y?%;bj6?)' );


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

define( 'WP_DEBUG', true );

define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_DEBUG_LOG', true );


/* Add any custom values between this line and the "stop editing" line. */




define( 'DUPLICATOR_AUTH_KEY', '2i|g&mxh<sO|;P-p3t r3YXG:c5_^#uTR%_JP1{TFDtOp6jhU2+ G+Cj>@4Jd&W9' );
define( 'WP_PLUGIN_DIR', '/var/www/vhosts/ibitrix.kz/sk-trust.ibitrix.kz/wp-content/plugins' );
define( 'WPMU_PLUGIN_DIR', '/var/www/vhosts/ibitrix.kz/sk-trust.ibitrix.kz/wp-content/mu-plugins' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname(__FILE__) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';


