<?php
// Options (variables)
$gridSec_o_menu = get_sub_field( 'gridSec_o_menu' );

$gridSec_o_h_pos = get_sub_field( 'gridSec_o_h_pos' );
$gridSec_o_h_align = get_sub_field( 'gridSec_o_h_align' );
$gridSec_o_c_layout = get_sub_field( 'gridSec_o_c_layout' );

// Content (variables)
$gridSec_h_title = get_sub_field( 'gridSec_h_title' );
$gridSec_h_text = preg_replace( '/<p>/', '<p class="s-4 columns is-aligned-' . $gridSec_o_h_align . '">', get_sub_field( 'gridSec_h_text' ) );
$gridSec_c_item = get_sub_field( 'gridSec_c_item' );

// Output
echo '<section class="grid grid-sec' . (( $gridSec_o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">';
  
  // Grid header
  if( $gridSec_h_title || $gridSec_h_text ): 
    echo
    '<div class="section-header row is-pos-' . $gridSec_o_h_pos . '">
      <h2 class="s-4 columns is-aligned-' . $gridSec_o_h_align . '">' . $gridSec_h_title . '</h2>
      $gridSec_h_text
    </div>';
  endif;
  
  // Grid content
  if( have_rows('gridSec_c_item') ):
    echo '<div class="section-body">';
      
    if( $gridSec_o_c_layout == 'masonry' ){
      echo '<ul class="s-grid-1 m-grid-2 l-grid-4 isotope isotope-masonry">';
    } else {
      echo '<ul class="s-grid-1 m-grid-2 l-grid-4">';
    }
        
        while( have_rows('gridSec_c_item') ): the_row();
          $image = get_sub_field( 'gridSec_c_item_image' );
          $title = get_sub_field( 'gridSec_c_item_title' );
          $text = preg_replace( '/<p>/', '<p class="is-aligned-' . $gridSec_o_h_align . '">', get_sub_field( 'gridSec_c_item_text' ) );
          
          echo
          '<li>
            <img src="' . $image['sizes']['medium'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">
            <h2 class="is-aligned-' . $gridSec_o_h_align . '">' . $title . '</h2>
            $text
          </li>';
        endwhile;
        
      echo '</ul>';
      
    echo '</div>';
  endif;
  
echo '</section>';
?>