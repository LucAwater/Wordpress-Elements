<?php
function section_start( $class_section ) {
  echo '<section class="' . $class_section . '">';
}

function section_end() {
  echo '</section>';
}

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
?>