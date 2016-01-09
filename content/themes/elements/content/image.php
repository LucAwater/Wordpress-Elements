<?php
global $i_anchor;

// Options (variables)
$o_b_width = get_sub_field( 'image_o_b_width' );
$o_b_pos = get_sub_field( 'image_o_b_pos' );

// Content (variables)
$image = get_sub_field( 'image_b_image' );
$caption = get_sub_field( 'image_b_caption' );

// Classes
$class_section = 'image is-' . $o_b_width;
$class_body = 'section-body is-pos-' . $o_b_pos;
?>

<section class="<?php echo $class_section; ?>">
  <div class="<?php echo $class_body; ?>">
    <figure>
      <img src="<?php echo $image['sizes']['large']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">

      <figcaption>
        <p class="is-small is-italic"><?php echo $caption; ?></p>
      </figcaption>
    </figure>
  </div>
</section>