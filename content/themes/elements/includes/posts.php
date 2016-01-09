<?php
function elements_posts_start(){
  $page_ID = get_option('page_for_posts');
  $page_title = get_the_title( $page_ID );

  echo
  '<ul class="posts s-grid-1 m-grid-2 l-grid-4">
    <h1>' . $page_title . '</h1>';
}

function elements_posts_end(){
  echo '</ul>';
}
?>