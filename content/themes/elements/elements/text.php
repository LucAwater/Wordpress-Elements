<?php
global $i_anchor;

// Options (variables)
$o_menu = get_sub_field( 'text_o_menu' );

$o_b_pos = get_sub_field( 'text_o_b_pos' );
$o_b_align = get_sub_field( 'text_o_b_align' );

// Content (variables)
$h_title = get_sub_field( 'text_b_title' );

$b_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_b_align . '">', get_sub_field( 'text_b_text' ) );

// Classes
$class_section = 'text';
$class_header = 'section-header is-pos-' . $o_b_pos;
$class_body = 'section-body is-pos-' . $o_b_pos;

// Build section
section_start( $class_section );

  // Header
  section_header_text( $class_header, $h_title );

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    echo $b_text;

  section_body_end();

section_end();
?>

