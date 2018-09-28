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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         'LYTer/6TE6ANxohHdF0VH8A8NTkErJSzsyq9MLAjXkvUXtMqzIw6Z0ltPeF66wVp6rmYUzGMbo7+4W1Nrqffrg==');
define('SECURE_AUTH_KEY',  'y9tOeoRT3elIAcGtII1kwWKT7CaT81sBBBwBdGnNqJFy8w/YQYqxa+d6VtmC3LWq9v/eSv9n5zpukDnQUu9HtQ==');
define('LOGGED_IN_KEY',    'VJK6RYkoS0liVRDWO72Tesvsr1+yZzKkgbAtY3ppZF0FcrWeva16DgEGuQ+mox+8oP2jigH+1rRE79fFNJE6uQ==');
define('NONCE_KEY',        'h25RMGRM3YrkamRX/JkGoQZcW6uxPljZaOBtVwoMhsGd/n+YJrxw0QFBUi10bRlTNYdirSgpBGZVNPHpdTobJQ==');
define('AUTH_SALT',        'Zz32MTdWwxb/g7P1CwJc1IL9g8bC7FMgX5zQn4uzc585i3OYZO5amboXOH9yyRNGvt7d7FhdTfmbcta6sUUowg==');
define('SECURE_AUTH_SALT', 'OZWw/uWOpB623atha/uqpgczsoJ3LxXqk+UIprPk+CCJhsMC3NhTx2OED6mUMr4U8FKM1GKPeVeilQKUO+xxPw==');
define('LOGGED_IN_SALT',   '4t9jcmUhRePMQoBQaQdbc8VLxQnqmjG3U6IYu/AtNLwnv0UXe9VHhrrebwjL00pBLthJATTa9QaYubQulTT9Nw==');
define('NONCE_SALT',       'TLHDLc/ebpnLs5bzUpOvK2sFxnkbWIdtSvN1QYEHDT74Pbxj7RXnhE/4XbQu0oY8dQf+8Mr9bXKm6pUa8i3scw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}

/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
