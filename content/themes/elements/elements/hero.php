<?php
// Options (variables)
$o_b_textColor = get_sub_field( 'hero_o_b_textColor' );

// Content (variables)
$banner = get_sub_field( 'hero_banner' );

$b_image = get_sub_field( 'hero_b_image' );
$b_title = get_sub_field( 'hero_b_title' );
$b_text = preg_replace( '/<p>/', '<p class="is-' . $o_b_textColor . '">', get_sub_field( 'hero_b_text' ) );

// Classes
$class_section = 'hero is-fullwidth';
$class_banner = 'hero-banner';
$class_body = 'section-body';
?>

<section class="<?php echo $class_section; ?>">
  <div class="<?php echo $class_banner; ?>"
       style="background-image: url('<?php echo $banner['sizes']['large']; ?>');"
       width="<?php echo $banner['width']; ?>"
       height="<?php echo $banner['height']; ?>">
  </div>

  <?php if( $b_image || $b_title || $b_text ): ?>
    <div class="<?php echo $class_body; ?>">
      <?php
      if( $b_image ):
        echo '<img src="' . $b_image['sizes']['medium'] . '" width="' . $b_image['width'] . '" height="' .   $b_image['height'] . '">';
      endif;

      // Title
      if( $b_title ):
        echo '<h2 class="is-bold is-' . $o_b_textColor . '">' . $b_title . '</h2>';
      endif;

      // Text
      if( $b_text ):
        echo $b_text;
      endif;
      ?>
    </div>
  <?php endif; ?>

  <div class="arrow arrow-scroll"></div>
</section>
