<?php
get_header();

// Content (variables)
$title = get_the_title();
$content = wpautop( get_the_content() );
$date = get_the_date();
?>

<article>
  <header>
    <h1><?php echo $title; ?></h1>
    <p><?php echo $date; ?></p>
  </header>

  <?php echo $content; ?>
</article>

<?php get_footer(); ?>