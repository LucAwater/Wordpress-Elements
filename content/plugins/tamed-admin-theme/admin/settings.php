<?php
class tamed_settings {
  /**
   * Holds the values to be used in the fields callbacks
   */
  private $options;

  /**
   * Start up
   */
  public function __construct() {
    add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    add_action( 'admin_init', array( $this, 'page_init' ) );
  }

  /**
   * Add options page
   */
  public function add_plugin_page() {
    // This page will be under "Settings"
    add_options_page(
      'Tamed Admin Theme / settings',
      'Tamed Admin Theme',
      'manage_options',
      'tamed-admin-theme',
      array( $this, 'create_admin_page' )
    );
  }

  /**
   * Options page callback
   */
  public function create_admin_page() {
    include_once('settings-render.php');
  }

  /**
   * Register and add settings
   */
  public function page_init() {
    register_setting('tamed_options', 'tamed_theme');
    register_setting('tamed_options', 'tamed_logo');
    register_setting('tamed_options', 'tamed_bg');
    register_setting('tamed_options', 'tamed_bg_color');
    register_setting('tamed_options', 'tamed_bg_image');
    register_setting('tamed_options', 'tamed_color_1');
    register_setting('tamed_options', 'tamed_color_2');
    register_setting('tamed_options', 'tamed_color_3');
    register_setting('tamed_options', 'tamed_color_4');
    register_setting('tamed_options', 'tamed_footer_content');
    register_setting('tamed_options', 'tamed_menu_order');
    register_setting('tamed_options', 'tamed_menu_removals');
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function sanitize( $input ) {
    $new_input = array();
    if( isset( $input['id_number'] ) )
      $new_input['id_number'] = absint( $input['id_number'] );

    return $new_input;
  }

  /**
   * Print the Section text
   */
  public function print_section_info() {
    print 'Enter your settings below:';
  }

  /**
   * Get the settings option array and print one of its values
   */
  public function id_number_callback() {
    printf(
      '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
      isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
    );
  }
}
?>
