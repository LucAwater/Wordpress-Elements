<?php
global $i_anchor;

// Options (variables)
$o_menu = get_sub_field( 'gridSec_o_menu' );

$o_h_pos = get_sub_field( 'gridSec_o_h_pos' );
$o_h_align = get_sub_field( 'gridSec_o_h_align' );
$o_b_layout = get_sub_field( 'gridSec_o_b_layout' );

// Content (variables)
$h_title = get_sub_field( 'gridSec_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field( 'gridSec_h_text' ) );
$b_item = get_sub_field( 'gridSec_b_item' );

// Classes
$class_section = 'grid grid-sec';
$class_header = 'section-header is-pos-' . $o_h_pos;
$class_body = 'section-body';

$class_grid = 's-grid-1 m-grid-2 l-grid-4 row';
if( $o_b_layout == 'masonry' ){
  $class_grid = 's-grid-1 m-grid-2 l-grid-4 row isotope isotope-masonry';
}
?>

<section class="<?php echo $class_section; ?>">
  <?php if( $h_title || $h_text ): ?>
    <div class="<?php echo $class_header; ?>">
      <h2 class="is-aligned-<?php echo $o_h_align; ?>"><?php echo $h_title; ?></h2>
      <?php echo $h_text; ?>
    </div>
  <?php endif; ?>

  <div class="<?php echo $class_body; ?>">
    <ul class="<?php echo $class_grid; ?>">
      <?php
      if( have_rows('gridSec_b_item') ):
        while( have_rows('gridSec_b_item') ): the_row();
          set_query_var( 'o_h_align', $o_h_align );
          get_template_part('content/gridSec', 'content');
        endwhile;
      endif;
      ?>
    </ul>
  </div>
</section>
