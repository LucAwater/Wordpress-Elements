<?php
get_header();

if ( class_exists('WooCommerce') ) {
  // Woocommere page shortcodes(see pages in backend)
  the_content();
}

// Loop into ACF groups
if( have_rows('page') ):
  $i_anchor = 1;
  $i_par = 0;

  while( have_rows('page') ): the_row();
    // Hero section is placed before main

    if( get_row_layout() == 'text' ):
      get_template_part( 'content/text' ); $i_anchor++;
    elseif( get_row_layout() == 'image' ):
      get_template_part( 'content/image' );
    elseif( get_row_layout() == 'grid_primary' ):
      get_template_part( 'content/gridPri' ); $i_anchor++;
    elseif( get_row_layout() == 'grid_secondary' ):
      get_template_part( 'content/gridSec' ); $i_anchor++;
    elseif( get_row_layout() == 'slider' ):
      get_template_part( 'content/slider' ); $i_anchor++;
    elseif( get_row_layout() == 'parallax' ): $i_par++;
      get_template_part( 'content/parallax' );
    endif;

  endwhile;
endif;

get_footer();
?>
