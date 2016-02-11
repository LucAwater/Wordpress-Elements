<?php
// Options (variables)
$o_menu = get_sub_field( 'gridSec_o_menu' );

$o_h_pos = get_sub_field( 'gridSec_o_h_pos' );
$o_h_align = get_sub_field( 'gridSec_o_h_align' );
$o_b_layout = get_sub_field( 'gridSec_o_b_layout' );

// Content (variables)
$h_title = get_sub_field( 'gridSec_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field( 'gridSec_h_text' ) );
$b_item = get_sub_field( 'gridSec_b_item' );

// Classes
$class_section = 'grid grid-sec';
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
  section_grid_start( $class_body, $class_grid );

    if( have_rows('gridSec_b_item') ):
      while( have_rows('gridSec_b_item') ): the_row();

        include( 'gridSec-content.php' );

      endwhile;
    endif;

  section_grid_end();

section_end();
?>
