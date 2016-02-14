<?php
// Options (variables)
$o_b_width = get_sub_field( 'image_o_b_width' );
$o_b_pos = get_sub_field( 'image_o_b_pos' );

// Content (variables)
$image = get_sub_field( 'image_b_image' );
$caption = get_sub_field( 'image_b_caption' );

// Classes
$class_section = 'image is-' . $o_b_width;
$class_body = 'section-body is-pos-' . $o_b_pos;

// Build section
section_start( $class_section );

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    echo '<figure>';

      echo '<img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';

      if( $caption )
        echo '<figcaption><p class="is-small is-italic">' . $caption . '</p></figcaption>';

    echo '</figure>';

  section_body_end();

section_end();
?>