<?php
function enqueue_theme_scripts() {
  // Unregister standard jQuery and reregister as google code.
  wp_deregister_script('jquery');
  wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', null, false, true );
  wp_enqueue_script( 'jquery' );

  if( WP_DEBUG ):
    wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/vendor/imagesLoaded.js', 'jquery', false, true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.js', 'jquery', false, true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/vendor/jquery.waypoints.min.js', 'jquery', false, true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/vendor/skrollr.js', 'jquery', false, true );
    wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/vendor/slider.js', 'jquery', false, true );
    wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/vendor/jquery.mobile.custom.min.js', 'jquery', false, true );
    wp_enqueue_script( 'add-to-cart', get_template_directory_uri() . '/js/vendor/add-to-cart-variation.min.js', 'jquery', false, true );

    wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scroll.js', 'jquery', false, true );
    wp_enqueue_script( 'hero', get_template_directory_uri() . '/js/hero.js', 'jquery', false, true );
    wp_enqueue_script( 'init-slider', get_template_directory_uri() . '/js/init-slider.js', 'jquery', false, true );
    wp_enqueue_script( 'init-isotope', get_template_directory_uri() . '/js/init-isotope.js', 'jquery', false, true );
    wp_enqueue_script( 'init-skrollr', get_template_directory_uri() . '/js/init-skrollr.js', 'jquery', false, true );
    wp_enqueue_script( 'link-heading', get_template_directory_uri() . '/js/link-heading.js', 'jquery', false, true );
  else:
    wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', 'jquery', false, true );
  endif;
}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
?>