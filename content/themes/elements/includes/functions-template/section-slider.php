<?php
function section_slider_images( $b_images ) {
  echo '<ul class="slider-images">';

    foreach( $b_images as $image )
      echo '<li><img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '"></li>';

  echo '</ul>';
}

function section_slider_bullets( $b_images ) {
  echo '<ul class="slider-bullets">';

    foreach( $b_images as $image )
      echo '<li><i></i></li>';

  echo '</ul>';
}

function section_slider_controls() {
  echo
  '<div class="slider-controls">
    <a class="slider-prev arrow arrow-left"></a>
    <a class="slider-next arrow arrow-right"></a>
  </div>';
}
?>