<?php
get_header();

if( have_posts() ):
  get_template_part( 'archive' );
endif;

get_footer();
?>