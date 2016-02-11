<?php
global $i_par, $detect;

// Content (variables)
$id = "parallax-" . $i_par;
$b_image = get_sub_field( 'parallax_b_image' );

// Classes
$class_section = 'parallax has-no-pad-sides is-fullwidth';
$class_body = 'section-body';

// Build section
section_start_parallax( $id, $class_section );

  // Body
  section_body_start( $class_body );

    /*
     * Body content
     * This is the flexible part, that is different for each element
     */
    if(! $detect->isMobile() )
      echo
      '<div class="bcg"
        style="background-image: url(' . $b_image['sizes']['large'] . ')"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 50px;"
        data-top-bottom="background-position: 50% -50px;"
        data-anchor-target="#' . $id . '">
      </div>';

    else
      echo '<img src="' . $b_image['sizes']['large'] . '">';


  section_body_end();

section_end();
?>