<?php
function section_start( $class_section ) {
  echo '<section class="' . $class_section . '">';
}

function section_start_parallax( $id, $class_section ) {
  echo '<section id="'. $id . '" class="' . $class_section . '">';
}

function section_end() {
  echo '</section>';
}

function section_body_start( $class_body ) {
  echo '<div class="' . $class_body . '">';
}

function section_body_end() {
  echo '</div>';
}
?>