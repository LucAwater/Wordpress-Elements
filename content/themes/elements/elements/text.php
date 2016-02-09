<?php
global $i_anchor;

// Options (variables)
$o_menu = get_sub_field( 'text_o_menu' );

$o_b_pos = get_sub_field( 'text_o_b_pos' );
$o_b_align = get_sub_field( 'text_o_b_align' );

// Content (variables)
$b_title = get_sub_field( 'text_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_b_align . '">', get_sub_field( 'text_b_text' ) );

// Classes
$class_section = 'text';
$class_header = 'section-header is-pos-' . $o_b_pos;
$class_body = 'section-body is-pos-' . $o_b_pos;
?>

<section class="<?php echo $class_section; ?>">
  <div class="<?php echo $class_header; ?>">
    <h2><?php echo $b_title; ?></h2>
  </div>

  <div class="<?php echo $class_body; ?>">
    <?php echo $b_text; ?>
  </div>
</section>