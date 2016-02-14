<?php
/*
Plugin Name: Tamed Wordpress Admin Theme
Plugin URI: http://codecanyon.net/item/tamed-wordpress-admin-theme/13800689
Description: A powerful WordPress Admin Theme that transforms your WordPress backend into a more calm, clean and overall better place to work, personalised for your client or project.
Version: 2.5
Author: Luc Awater
Author URI: http://lucawater.nl
Copyright: Luc Awater
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('tamed') ) {

  class tamed {

    /*
     * __construct
     *
     * Construct the plugin object
     */
    public function __construct() {
      // Render the settings template
      include_once('admin/settings.php');
      $tamed_settings = new tamed_settings();

      $plugin = plugin_basename(__FILE__);
      add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
    }

    /*
     * activate
     *
     * Activate the plugin
     */
    public static function activate() {
      // Do nothing
    }

    /*
     * deactivate
     *
     * Deactivate the plugin
     */
    public static function deactivate() {
      // Do nothing
    }

    /*
     * Add a settings link on the plugins page
     */
    function plugin_settings_link($links) {
      $settings_link = '<a href="options-general.php?page=tamed-admin-theme">Settings</a>';
      array_unshift($links, $settings_link);
      return $links;
    }
  }
}


if( class_exists('tamed') ) {

  /*
   * Installation and uninstallation hooks
   */
  register_activation_hook( __FILE__, array('tamed', 'activate') );
  register_deactivation_hook( __FILE__, array('tamed', 'deactivate') );

  /*
   * Add plugin base stylesheets
   */
  function tamed_style() {
    wp_enqueue_style('tamed-admin-theme', plugins_url('css/tamed.css', __FILE__));
  }
  add_action('admin_enqueue_scripts', 'tamed_style');
  add_action('login_enqueue_scripts', 'tamed_style');

  /*
   * Add plugin chosen theme stylesheet
   */
  function update_style() {
    $option_theme = get_option('tamed_theme', 'default');

    if( $option_theme ){
      wp_enqueue_style('tamed-admin-theme-' . $option_theme, plugins_url('css/tamed-' . $option_theme . '.css', __FILE__));
    } else {
      wp_enqueue_style('tamed-admin-theme-default', plugins_url('css/tamed-default.css', __FILE__));
    }
  }
  add_action('admin_enqueue_scripts', 'update_style');
  add_action('login_enqueue_scripts', 'update_style');

  /*
   * Add plugin scripts
   */
  function tamed_scripts() {
    wp_register_script('uploader', plugins_url('js/uploader.js', __FILE__));
    wp_enqueue_script('uploader');
    wp_enqueue_media();

    wp_enqueue_script('sortable', 'http://code.jquery.com/ui/1.11.4/jquery-ui.js');
    wp_enqueue_script('menu-order', plugins_url('js/menu-order.js', __FILE__));
    wp_enqueue_script('menu-removals', plugins_url('js/menu-removals.js', __FILE__));
    wp_enqueue_script('menu-collapse', plugins_url('js/menu-collapse.js', __FILE__));
  }
  add_action('admin_enqueue_scripts', 'tamed_scripts');

  /*
   * Change link value for login logo
   */
  function my_login_logo_url() {
    return home_url();
  }
  add_filter( 'login_headerurl', 'my_login_logo_url' );

  /*
   * Add custom logo to login page
   */
  function my_login_logo() { ?>
    <style type="text/css">
      body.login{
        <?php if( get_option('tamed_bg') === 'color' ){ ?>
          background-color: <?php echo get_option('tamed_bg_color'); ?>;
        <?php } else { ?>
          background-image: url(<?php echo get_option('tamed_bg_image'); ?>);
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
        <?php } ?>
      }

      .login #login h1 a {
        background-image: url(<?php echo get_option('tamed_logo'); ?>) !important;
        background-position: center bottom;
      }
    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'my_login_logo' );

  /*
   * Add custom style
   */
  if( get_option('tamed_color_1') || get_option('tamed_color_2') || get_option('tamed_color_3') || get_option('tamed_color_4') ){
    function tamed_style_custom() {
      wp_enqueue_style('custom-style', plugins_url('css/tamed-custom.css', __FILE__));

      include_once('admin/style-custom.php');
    }
    add_action('admin_enqueue_scripts', 'tamed_style_custom');
    add_action('login_enqueue_scripts', 'tamed_style_custom');
  }

  function color_picker() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script(
        'iris',
        admin_url( 'js/iris.min.js' ),
        array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
        false,
        1
    );
    wp_enqueue_script(
        'wp-color-picker',
        admin_url( 'js/color-picker.min.js' ),
        array( 'iris' ),
        false,
        1
    );
    $colorpicker_l10n = array(
        'clear'			=> __('Clear', 'acf' ),
        'defaultString'	=> __('Default', 'acf' ),
        'pick'			=> __('Select Color', 'acf' )
    );
    wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
    wp_enqueue_script( 'custom-colors', plugins_url('js/custom-colors.js', __FILE__ ), array( 'iris' ), false, true );
  }
  add_action('admin_enqueue_scripts', 'color_picker');
  add_action('login_enqueue_scripts', 'color_picker');

  /*
   * Add custom footer content
   */
  function tamed_footer_content() {
    $footer_content = get_option('tamed_footer_content', '<p>Powered by WordPress and Tamed Admin Theme</p>');

    if( empty($footer_content) ){
      $footer_content = '<p>Powered by WordPress and Tamed Admin Theme</p>';
    }

    echo $footer_content;
    remove_filter( 'update_footer', 'core_update_footer' );
  }
  add_filter('admin_footer_text', 'tamed_footer_content');

  /*
   * Custom menu order function
   */
  $items = json_decode(get_option('tamed_menu_order'));
  if( !empty($items) ){
    function tamed_menu_order( $menu_order ) {
      $items = json_decode(get_option('tamed_menu_order'));
      $items_menu = [];

      foreach( $items as $item ){
        array_push($items_menu, $item->page);
      }

      return $items_menu;
    }
    add_filter( 'custom_menu_order', '__return_true' );
    add_filter( 'menu_order', 'tamed_menu_order' );
  }

  /*
   * Remove menu items
   */
  $remove_items = json_decode(get_option('tamed_menu_removals'));
  if( !empty($remove_items) ){
    function remove_menu_items() {
      $remove_items = json_decode(get_option('tamed_menu_removals'));
      $items_removals = [];

      foreach( $remove_items as $item ){
        array_push($items_removals, remove_menu_page($item->page));
      }

      return $items_removals;
    }
    add_action( 'admin_menu', 'remove_menu_items' );
  }

  /*
   * Add custom classes to body_class
   */
  add_filter( 'admin_body_class', 'custom_body_class' );
  function custom_body_class( $classes ) {
    $option_theme = get_option('tamed_theme', 'default');
    $custom_class = 'tamed-theme-' . $option_theme;
    return $custom_class;
  }

  // Instantiate the plugin class
  $tamed = new tamed();

}

?>
