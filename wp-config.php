<?php
// ===================================================
// Load database info and local development parameters
// ===================================================

define( 'DB_CREDENTIALS_PATH', dirname( ABSPATH ) ); // cache it for multiple use
define( 'WP_LOCAL_SERVER', file_exists( DB_CREDENTIALS_PATH . '/local-config.php' ) );
define( 'WP_DEV_SERVER', file_exists( DB_CREDENTIALS_PATH . '/development-config.php' ) );
define( 'WP_PRODUCTION_SERVER', file_exists( DB_CREDENTIALS_PATH . '/production-config.php' ) );

if ( WP_LOCAL_SERVER )
  require DB_CREDENTIALS_PATH . '/local-config.php';
elseif ( WP_DEV_SERVER )
  require DB_CREDENTIALS_PATH . '/development-config.php';
elseif ( WP_PRODUCTION_SERVER )
  require DB_CREDENTIALS_PATH . '/production-config.php';

// ========================
// Custom Content Directory
// ========================

define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ========================
// Custom Uploads Directory
// ========================

define( 'UPLOADS', '../media/uploads' );

// ================================================
// You almost certainly do not want to change these
// ================================================

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// Be sure to change these to your own
// ==============================================================

define('AUTH_KEY',         '9zitHS^Sr9]y5(E5Bofu+ZL|_;MmMZS@O#UUAeD,Vmj_]hxt8_ ~Sc6|%mk: :~P');
define('SECURE_AUTH_KEY',  'F2GozCEE-!VO%neSx/5xXM)LZGlOXIDBIDXt)=S+m>X;v0B}7Mk;|k2w~cKf+;I4');
define('LOGGED_IN_KEY',    'LjJ$|Hl(K-94G?51)Y%BxcxxO+lrLD]_?~ee`ngZ1FJf9IH=kqBcGImcb7h$4tq<');
define('NONCE_KEY',        'P(n>$_kKn`XY3d:36,,vJTqFc@Et1Gi~b&%-TR/FNbzoa99DRa4{0ELkHgNbNjS+');
define('AUTH_SALT',        '_oh9M:7j(Tkb@PV;+w,;HTQyBnriWk@QOA*:S{ir]xee?966<$bxyMx=Xl<46L7@');
define('SECURE_AUTH_SALT', 'CZ-C|}@_UMtzcB#lCnxM!_p?vV1@$V=UwxH0CwC{W<+%[0Rp@6V}KvDA!>Alr-`t');
define('LOGGED_IN_SALT',   'OU#ugUYzY.EoHt:K#+RAkHu4d350.X1~d?^,]Ody.)RWxe|!!-|/EG PW(B+$?27');
define('NONCE_SALT',       ';rV7jS(Q*+eVcZm6=H.U-;%ip=Zn5$SB(je-9D*wo?bF7&-IX&04DC;RtIz)a#u!');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================

$table_prefix  = 'wp_';

// ======================================================
// Force site urls for 'easy' dbdumping
// Don't forget to add local settings in local-config.php
// ======================================================

define( 'WP_HOME' , 'http://' . $_SERVER['HTTP_HOST'] );
define( 'WP_SITEURL' , 'http://' . $_SERVER['HTTP_HOST'] . '/wordpress' );

// =============================================
// Language
// Remove this for the default: American English
// Add language files to content/languages
// =============================================

define( 'WPLANG', '' );

// ========================
// Wordpress debugging mode
// ========================

ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// ===============
// Increase memory
// ===============

define( 'WP_MEMORY_LIMIT', '128M' );

// ===================
// Bootstrap WordPress
// ===================

if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );
require_once( ABSPATH . 'wp-settings.php' );