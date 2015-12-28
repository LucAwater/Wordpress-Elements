<?php
global $i_anchor;

// Options (variables)
$o_b_width = get_sub_field( 'image_o_b_width' );
$o_b_pos = get_sub_field( 'image_o_b_pos' );

// Content (variables)
$image = get_sub_field( 'image_b_image' );
$caption = get_sub_field( 'image_b_caption' );

// Output
echo '<section class="image' . ( ($o_b_width == 'fullwidth') ? ' is-fullwidth' : "") . '">';

  // Image body
  echo '<div class="section-body is-pos-' . $o_b_pos . '">';
    echo '<figure>';

      // Image
      echo '<img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';

      // Image caption
      echo
      '<figcaption>
        <p class="is-small is-italic">' . $caption . '</p>
      </figcaption>';

    echo '</figure>';
  echo '</div>';

echo '</section>';
