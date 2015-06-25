<?php
// Options (variables)
$text_o_menu = get_sub_field( 'text_o_menu' );

$text_o_c_pos = get_sub_field( 'text_o_c_pos' );
$text_o_c_align = get_sub_field( 'text_o_c_align' );

// Content (variables)
$text_c_title = get_sub_field( 'text_c_title' );
$text_c_text = preg_replace( '/<p>/', '<p class="is_aligned-' . $text_o_c_align . '">', get_sub_field( 'text_c_text' ) );

//Output
echo
'<section class="text' . (( $text_o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">
  <div class="section_body row is-pos-' . $text_o_c_pos . '">
    <h2 class="s-4 columns is-uppercase is-bold is-aligned-' . $text_o_c_align . '">' . $text_c_title . '</h2>
    <div class="s-4 columns">
      ' . $text_c_text . '
    </div>
  </div>
</section>';
?>