<?php
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'add_to_cart_header');

function add_to_cart_header( $fragments ) {
  global $woocommerce;

  ob_start();

  ?>

  <div class="cart-contents">
    <?php
    $cart_total = WC()->cart->get_cart_total();
    $cart_count = WC()->cart->cart_contents_count;

    echo '<p>' . $cart_count . ' – ' . $cart_total . '</p>';
    ?>
  </div>

  <?php

  $fragments['.cart-contents'] = ob_get_clean();

  return $fragments;

}

?>
