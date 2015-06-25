<?php
// Content (variables)
$parallax_id = "parallax-" . $i_par;
$parallax_c_image = get_sub_field( 'parallax_c_image' );

//Output
if(! $detect->isMobile() ):
  
  echo 
  '<section class="parallax has-no-pad-sides is-fullwidth" id="' . $parallax_id . '">
    <div class="section-body">
      <div class="bcg"
        style="background-image: url(' . $parallax_c_image['sizes']['large'] . ')"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 50px;"
        data-top-bottom="background-position: 50% -50px;"
        data-anchor-target="#' . $parallax_id . '">
      </div>
    </div>
  </section>';
  
else:
  
  echo
  '<section class="parallax pad-no is-fullwidth" id="' . $parallax_id . '">
    <div class="section_body">
      <img src="' . $parallax_c_image['sizes']['large'] . '">
    </div>
  </section>';
  
endif;
?>