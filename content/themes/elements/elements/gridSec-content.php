<?php
global $o_h_align;

$image = get_sub_field( 'gridSec_b_item_image' );
$title = get_sub_field('gridSec_b_item_title');
$text = preg_replace( '/<p>/', '<p class="is-aligned-' . $o_h_align . '">', get_sub_field('gridSec_b_item_text') );
?>
<li>
  <img src="<?php echo $image['sizes']['medium']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
  <h2 class="is-aligned-<?php echo $o_h_align; ?>"><?php echo $title; ?></h2>
  <?php echo $text; ?>
</li>