<?php
// Options (variables)
$o_menu = get_sub_field( 'gridSec_o_menu' );

$o_h_pos = get_sub_field( 'gridSec_o_h_pos' );
$o_h_align = get_sub_field( 'gridSec_o_h_align' );
$o_b_layout = get_sub_field( 'gridSec_o_b_layout' );

// Content (variables)
$h_title = get_sub_field( 'gridSec_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="s-4 columns is-aligned-' . $o_h_align . '">', get_sub_field( 'gridSec_h_text' ) );
$b_item = get_sub_field( 'gridSec_b_item' );

// Output
echo '<section class="grid grid-sec' . (( $o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">';

  // Grid header
  if( $h_title || $h_text ):
    echo
    '<div class="section-header row is-pos-' . $o_h_pos . '">
      <h2 class="s-4 columns is-aligned-' . $o_h_align . '">' . $h_title . '</h2>
      ' . $h_text . '
    </div>';
  endif;

  // Grid content
  if( have_rows('gridSec_b_item') ):
    echo '<div class="section-body">';

    if( $o_b_layout == 'masonry' ){
      echo '<ul class="s-grid-1 m-grid-2 l-grid-4 row isotope isotope-masonry">';
    } else {
      echo '<ul class="s-grid-1 m-grid-2 l-grid-4 row">';
    }

        while( have_rows('gridSec_b_item') ): the_row();
          $image = get_sub_field( 'gridSec_b_item_image' );
          $title = get_sub_field( 'gridSec_b_item_title' );
          $text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field( 'gridSec_b_item_text' ) );

          echo
          '<li>
            <img src="' . $image['sizes']['medium'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">
            <h2 class="is-aligned-' . $o_h_align . '">' . $title . '</h2>
            ' . $text . '
          </li>';
        endwhile;

      echo '</ul>';

    echo '</div>';
  endif;

echo '</section>';
?>
