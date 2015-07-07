<?php
// Content (variables)
$id = "parallax-" . $i_par;
$b_image = get_sub_field( 'parallax_b_image' );

//Output
if(! $detect->isMobile() ):

  echo
  '<section class="parallax has-no-pad-sides is-fullwidth" id="' . $id . '">
    <div class="section-body">
      <div class="bcg"
        style="background-image: url(' . $b_image['sizes']['large'] . ')"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 50px;"
        data-top-bottom="background-position: 50% -50px;"
        data-anchor-target="#' . $id . '">
      </div>
    </div>
  </section>';

else:

  echo
  '<section class="parallax pad-no is-fullwidth" id="' . $id . '">
    <div class="section_body">
      <img src="' . $b_image['sizes']['large'] . '">
    </div>
  </section>';

endif;
?>
