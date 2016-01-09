<?php
get_header();

// Content (variables)
$title = get_the_title();
$content = wpautop( get_the_content() );
$permalink = get_the_permalink();
$thumb = get_the_post_thumbnail( $post->ID, 'medium' );
?>

<li>
  <a href="<?php echo $permalink; ?>">
    <?php echo $thumb; ?>

    <div>
      <h3><?php echo $title; ?></h3>
    </div>
  </a>
</li>

<?php get_footer(); ?>