<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate */

// Includes
require_once('includes/scripts.php');

require_once('includes/admin/login.php');
require_once('includes/admin/removal.php');
require_once('includes/admin/menu.php');
require_once('includes/admin/acf-page.php');
require_once('includes/admin/tutorial.php');

// Initialize mobile detect
require_once('includes/Mobile_Detect.php');
$detect = new Mobile_Detect;

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Add support for post-thumbnails
add_theme_support( 'post-thumbnails' );

// Add support for automatic RSS feed links
add_theme_support( 'automatic-feed-links' );

// Allow svg files to be added to the media folder
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Purge Custom Post-types from cache after update
add_action( 'edit_post', 'w3_flush_page_custom', 10, 1 );

function w3_flush_page_custom( $post_id ) {
  if ( function_exists('w3tc_pgcache_flush' ) ):
    w3tc_pgcache_flush();
  endif;
}

// Change the paypal icon
add_filter('woocommerce_paypal_icon', 'custom_woocommerce_paypal_icon');
 
function custom_woocommerce_paypal_icon( $url ) {
  $url = get_bloginfo('template_url')."/img/pay-paypal.svg";
  return $url;
}

/* Cleaner image captions */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {
  
  // We're not worried abut captions in feeds, so just return the output here
  if ( is_feed() )
    return $output;
  
  // Set up the default arguments
  $defaults = array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  );
  
  // Merge the defaults with user input
  $attr = shortcode_atts( $defaults, $attr );
  
  // If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags
  if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
    return $content;
  
  // Set up the attributes for the caption <div>
  $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
  
  // Open the caption <div>
  $output = '<div' . $attributes .'>';
  
  // Allow shortcodes for the content the caption was created for
  $output .= do_shortcode( $content );
  
  // Append the caption text
  $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';
  
  // Close the caption </div>
  $output .= '</div>';
  
  // Return the formatted, clean caption
  return $output;
}

// Remove nasty p's around img tags
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/* Enable custom menu support
 * Customize to your needs */
if( function_exists('register_nav_menus') ):
  register_nav_menus( array(
    'menu_primary' => 'Main menu',
    'menu_secondary' => 'Sub menu'
  ));
endif;

/* Hide password protected posts everywhere */
// Filter to hide protected posts
function exclude_protected($where) {
  global $wpdb;
  return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
  if( !is_single() && !is_page() && !is_admin() ) {
    add_filter( 'posts_where', 'exclude_protected' );
  }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action'); ?>