<?php
function section_grid_start( $class_body, $class_grid ) {
  echo '<div class="' . $class_body . '">';
    echo '<ul class="' . $class_grid . '">';
}

function section_grid_end() {
    echo '</ul>';
  echo '</div>';
}
?>