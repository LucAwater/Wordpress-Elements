<?php
get_header();

if( have_posts() ):
  elements_posts_start();

  while( have_posts() ): the_post();
    get_template_part( 'content', 'post' );
  endwhile;

  elements_posts_end();

else:
  get_template_part( 'content', 'none' );
endif;

get_footer();
?>