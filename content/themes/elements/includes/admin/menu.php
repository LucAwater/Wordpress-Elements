<?php
/*
 * To print all the available menu items, uncomment code below.
 * Every menu item will then be printed as an array, get the 2nd entry of every array to use in the menu order function
 */

// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );
//
// function wpse_136058_debug_admin_menu() {
//   echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
// }

// Custom menu order function
function menu_order( $menu_order ) {
  return array(
    'index.php', //Dashboard
    'separator1',
    
    'upload.php', //Media
    'edit.php', //Posts
    'edit.php?post_type=page', //Pages
    'footer', //Footer information
    'separator-last',
    
    'edit.php?post_type=acf-field-group', //Custom fields
    'options-general.php', //Settings
    'tools.php', //Tools
    'plugins.php', //Plugins
    'users.php', //Users
    'themes.php', //Appearance
  );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'menu_order' );
?>