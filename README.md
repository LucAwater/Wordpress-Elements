# Wordpress Elements

This is a Wordpress framework, which can be used in a variety of ways. It contains a wordpress setup with a multiple server config method and wordpress as a submodule. It also has a basic wordpress theme. It contains elements like a gallery, grid, text block and more. To make it even easier, there's also an Advanced Custom Fields(ACF) export file so you don't have to manually add these with every install. As of 2.0, it's even extended with WooCommerce.

> Wordpress Elements is an extensive framework, but still very flexible. It's is a great starting point for simple onepagers, or you could go for a full-sized webstore. Go crazy.

Wordpress Elements initially assumes a setup with these dependencies:
* You have multiple servers(local, development, production)
* You have an Advanced Custom Fields(ACF) license key


## Getting started
1. Git clone git@github.com:LucAwater/Wordpress-Elements.git .
2. Add local-config.php file(see below)
3. Git submodule init
4. Git submodule update
5. Go to http://yourwebsite.com/wordpress/wp-admin
6. Delete example post and page(important when not working with woocommerce)
7. Install all plugins
8. Activate 'Elements' theme
9. import 'acf.json' file in ACF
10. Begin building something awesome

#### Removing woocommerce
1. Remove all woocommerce plugins
  - woocommerce
  - woocommerce-ajax-add-to-cart-for-variable-products
2. Delete all woocommerce files by going to http://yourwebsite/delete-woocommerce.php

#### local-config file
```
<?php
define( 'WP_LOCAL_DEV', true );
define( 'WP_DEBUG', true );
define( 'DB_NAME', 'YOUR_DATABASE_NAME' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'
define( 'HOST', 'localhost' ); // Probably 'localhost' too, be sure to include the port if it's other than 80 in your setup.
define( 'SITE_PATH', 'YOUR_PATH/YOUR_SUBFOLDER'); // the path to the root of your project, relative to the hostname aka the part of the url that comes after the hostname. Don't use a leading /.
define( 'WP_HOME', 'http://'. HOST .'/'. SITE_PATH);
define( 'WP_SITEURL','http://'. HOST .'/'. SITE_PATH .'/wordpress');
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://'. HOST .'/'. SITE_PATH .'/content' );
?>
```

## Theme
###Class system
The class system in the elements theme is setup to be readable, flexible and easily extendable.

**Module** consists of:
- module
- module variant

Module example: `<div class=“grid grid-primary”>`

- module = grid
- module variant = primary

**State** consists of:
- indicator
- indicator extension
- subject
- subject variant

State example: `<div class=“is-bold is-pos-left has-no-pad-top”>`

- indicator  = is, has
- indicator extension = no
- subject = bold, pos, pad
- subject variant = left, top
