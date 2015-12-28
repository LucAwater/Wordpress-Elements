<?php
get_header();

if( have_posts() ):
  while( have_posts() ): the_post();
    include_once( 'page.php' );
  endwhile;

  else:
    get_template_part( '404' );
endif;

wp_reset_postdata();

get_footer();
?>