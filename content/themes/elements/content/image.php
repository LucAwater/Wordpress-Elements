<?php
// Options (variables)
$image_c_image_o_c_width = get_sub_field( 'image_o_c_width' );
$image_pos = get_sub_field( 'image_o_c_pos' );

// Content (variables)
$image = get_sub_field( 'image_c_image' );
$image_caption = get_sub_field( 'image_c_caption' );

// Output
echo '<section class="image has-no-pad">';
  
  // Image body
  echo '<div class="section-body is-pos-' . $image_pos . '">';
    echo '<figure>';
      
      // Image
      echo '<img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
      
      // Image caption
      echo
      '<figcaption>
        <p class="is-small is-italic">' . $image_caption . '</p>
      </figcaption>';
      
    echo '</figure>';
  echo '</div>';
  
echo '</section>';