<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'db734818143');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'dbo734818143');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'B15coCh!t0');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'db734818143.db.1and1.com');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'm6)Il/,l@6wB-BR~f At3=$^;9Cy.LJ=DrlgY[6{qO#C{^r-w14Bi!f4|P-/T*2o');
define('SECURE_AUTH_KEY',  '_YR;`z)$l+6W ]BSS<<zW,;rE7SoTBY(kvW+B+TCCw$zj4q-+N^V!Bf8Q4n-[t<Q');
define('LOGGED_IN_KEY',    'LqV7&%$r98dQ7VBtGHF2Gam02o6U.AQ+aJg>5+0C }FRm8d+B2A~<PM}Sps6GFh-');
define('NONCE_KEY',        'u0~n,l:%oS]ShhTGOcc 6e?<s13:m=HNo=P[N8H+14|OC~a_BeM.MKmfE@,jS.^^');
define('AUTH_SALT',        'y{-j^9@1.pcd(@Qqj2zd4`X9I@o22yhfYl5T0x[~qH:|u6eR|W$_EMz<B>~QH!-O');
define('SECURE_AUTH_SALT', '])a<QC|X*[Bx-kXWD*%ybzS|])zxi+J_]dHT7}z5LWh7YI-N3KRTNVPtsf8w+@}C');
define('LOGGED_IN_SALT',   'bAKjQa*h0I^4f@?E_LU36xd+>M&R5/3$b2^2o>x%-1ORPEptv5D<_AFanS-WZl>e');
define('NONCE_SALT',       'KCW}B-v Vgcnf SD[y[3-:-ZXh~+<8Ukx#-%RI#Yer,4@/|ETkFT>]w6rD8ZuH+$');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'bct_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

