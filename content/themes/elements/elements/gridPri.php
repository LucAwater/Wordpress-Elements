<?php
// Options (variables)
$o_menu = get_sub_field( 'gridPri_o_menu' );

$o_h_pos = get_sub_field( 'gridPri_o_h_pos' );
$o_h_align = get_sub_field( 'gridPri_o_h_align' );
$o_b_layout = get_sub_field( 'gridPri_o_b_layout' );

// Content (variables)
$h_title = get_sub_field( 'gridPri_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field( 'gridPri_h_text' ) );
$b_images = get_sub_field( 'gridPri_b_images' );

// Classes
$class_section = 'grid grid-pri';
$class_header = 'section-header is-pos-' . $o_h_pos;
$class_body = 'section-body';

if( $o_b_layout == 'masonry' ){
  $class_grid = 's-grid-1 m-grid-2 l-grid-4 row isotope isotope-masonry';
} else {
  $class_grid = 's-grid-1 m-grid-2 l-grid-4 row';
}

// Build section
section_start( $class_section );

  // Header
  section_header($class_header, $h_title, $h_text, $o_h_align);

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    section_grid_start( $class_grid );

      foreach( $b_images as $image ):

        include( 'gridPri-content.php' );

      endforeach;

    section_grid_end();

  section_body_end();

section_end();
?>