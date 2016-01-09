<?php
global $i_anchor, $i_par, $detect;

// Content (variables)
$id = "parallax-" . $i_par;
$b_image = get_sub_field( 'parallax_b_image' );

// Classes
$class_section = 'parallax has-no-pad-sides is-fullwidth';
$class_body = 'section-body';

if(! $detect->isMobile() ):
?>

  <section id="<?php echo $id; ?>" class="<?php echo $class_section; ?>">
    <div class="<?php echo $class_body; ?>">
      <div class="bcg"
        style="background-image: url(<?php echo $b_image['sizes']['large']; ?>)"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 50px;"
        data-top-bottom="background-position: 50% -50px;"
        data-anchor-target="#<?php echo $id; ?>">
      </div>
    </div>
  </section>

<?php else: ?>

  <section id="<?php echo $id; ?>" class="<?php echo $class_section; ?>">
    <div class="<?php echo $class_body; ?>">
      <img src="<?php echo $b_image['sizes']['large']; ?>">
    </div>
  </section>

<?php endif; ?>