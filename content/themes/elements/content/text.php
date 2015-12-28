<?php
global $i_anchor;

// Options (variables)
$o_menu = get_sub_field( 'text_o_menu' );

$o_b_pos = get_sub_field( 'text_o_b_pos' );
$o_b_align = get_sub_field( 'text_o_b_align' );

// Content (variables)
$b_title = get_sub_field( 'text_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_b_align . '">', get_sub_field( 'text_b_text' ) );

//Output
echo
'<section class="text' . (( $o_menu == true ) ? ' has-anchor" id="anchor-' . $i_anchor : "") . '">
  <div class="section-body row is-pos-' . $o_b_pos . '">
    <h2 class="s-4 columns is-uppercase is-bold is-aligned-' . $o_b_align . '">' . $b_title . '</h2>
    <div class="s-4 columns">
      ' . $b_text . '
    </div>
  </div>
</section>';
?>

<?php
// Options (variables)
$o_menu = get_sub_field( 'text_o_menu' );

$o_b_pos = get_sub_field( 'text_o_b_pos' );
$o_b_align = get_sub_field( 'text_o_b_align' );

// Content (variables)
$b_title = get_sub_field( 'text_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_b_align . '">', get_sub_field( 'text_b_text' ) );

// Classes
$class_section = 'text';
$class_body = 'section-body is-pos-' . $o_b_pos;
?>

<section class="<?php echo $class_section; ?>">
  <div class="<?php echo $class_body; ?>">
    <h2><?php echo $b_title; ?></h2>
    <div><?php echo $b_text; ?></div>
  </div>
</section>