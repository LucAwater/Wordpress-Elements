<?php
define( 'WP_LOCAL_DEV', true );
define( 'WP_DEBUG', true );
define( 'DB_NAME', 'wordpress-elements' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'
define( 'HOST', 'localhost:8888' ); // Probably 'localhost' too, be sure to include the port if it's other than 80 in your setup.
define( 'SITE_PATH', 'wordpress-elements'); // the path to the root of your project, relative to the hostname aka the part of the url that comes after the hostname. Don't use a leading /.
define( 'WP_HOME', 'http://'. HOST .'/'. SITE_PATH);
define( 'WP_SITEURL','http://'. HOST .'/'. SITE_PATH .'/wordpress');
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://'. HOST .'/'. SITE_PATH .'/content' );
?>