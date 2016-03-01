<?php
get_header();

if( have_posts() ):
  while( have_posts() ): the_post();

    // Content (variables)
    $title = get_the_title();
    $subtitle = get_field( 'post_subtitle' );
    $content = wpautop( get_the_content() );
    $date = get_the_date();
    $categories = get_categories();
    ?>

    <article>
      <header>
        <div class="post-categories">
          <?php
          foreach($categories as $cat):
            $name = $cat->name;
            $link = get_category_link( $cat->term_id );

            echo '<a href="' . $link . '">' . $name . '</a><span> / </span>';
          endforeach;
          ?>
        </div>

        <time pubdate><?php echo $date; ?></time>

        <h1 class="is-bold"><?php echo $title; ?></h1>
        <h2><?php echo $subtitle; ?></h2>
      </header>

      <?php echo $content; ?>
    </article>

    <?php
  endwhile;
endif;

get_footer(); ?>