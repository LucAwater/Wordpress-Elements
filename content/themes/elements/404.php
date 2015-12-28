<?php
get_header();

echo
'<div id="error404-content">
  <h2>404, page not found</h2>
  <p>Sorry, but the page you are looking for has not been found. Try checking the URL for errors, then hit the refresh button on your browser.</p>

  <p>To get back to the homepage <a href="' . home_url() . '">click here</a></p>
</div>';

get_footer();
?>