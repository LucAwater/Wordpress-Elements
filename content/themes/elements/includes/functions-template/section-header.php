<?php
function section_header($class_header, $h_title, $h_text, $o_h_align) {
  // Header
  if( $h_title || $h_text ){
    echo '<div class="' . $class_header . '">';

      // Header title
      echo ( $h_title ) ? '<h2 class="is-aligned-' . $o_h_align . '">' . $h_title . '</h2>' : '';
      // Header body
      echo ( $h_text ) ? $h_text : '';

    echo '</div>';
  }
}

function section_header_text( $class_header, $h_title ) {
  // Header
  if( $h_title ){
    echo '<div class="' . $class_header . '">';

      // Header title
      echo ( $h_title ) ? '<h2>' . $h_title . '</h2>' : '';

    echo '</div>';
  }
}
?>