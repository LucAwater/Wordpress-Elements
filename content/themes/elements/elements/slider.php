<?php
global $i_anchor, $detect;

// Options (variables)
$o_menu = get_sub_field( 'slider_o_menu' );

$o_h_pos = get_sub_field( 'slider_o_h_pos' );
$o_h_align = get_sub_field( 'slider_o_h_align' );

// Content (variables)
$h_title = get_sub_field( 'slider_h_title' );
$h_text = preg_replace( '/<p>/', '<p class="s-4 columns is-aligned-' . $o_h_align . '">', get_sub_field( 'slider_h_text' ) );
$b_images = get_sub_field( 'slider_b_images' );

// Classes
$class_section = 'slider';
$class_header = 'section-header row';
$class_body = 'section-body';
?>

<section class="<?php echo $class_section; ?>">
  <?php if( $h_title || $h_text ): ?>
    <div class="<?php echo $class_header; ?>">
      <h2 class="is-aligned-<?php echo $o_h_align; ?>"><?php echo $h_title; ?></h2>
      <?php echo $h_text; ?>
    </div>
  <?php endif; ?>

  <div class="<?php echo $class_body; ?>">
    <ul class="slider-images">
      <?php
      foreach( $b_images as $image ):
        echo '<li><img src="' . $image['sizes']['large'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '"></li>';
      endforeach;
      ?>
    </ul>

    <ul class="slider-bullets">
      <?php
      foreach( $b_images as $image ):
        echo '<li><i></i></li>';
      endforeach;
      ?>
    </ul>

    <?php if(! $detect->isMobile() ): ?>
      <div class="slider-controls">
        <a class="slider-prev arrow arrow-left" href="javascript:;"><i></i></a>
        <a class="slider-next arrow arrow-right" href="javascript:;"><i></i></a>
      </div>
    <?php endif; ?>
  </div>
</section>
