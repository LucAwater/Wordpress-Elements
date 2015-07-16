<?php
rmdir('content/plugins/woocommerce');
rmdir('content/plugins/woocommerce-ajax-add-to-cart-for-variable-products');
rmdir('content/themes/elements/woocommerce');
rmdir('content/themes/elements/sass/woocommerce');

unlink('content/themes/elements/js/includes/cart-update.php');
unlink('content/themes/elements/js/vendor/add-to-cart-variation-min.js');

/*
 * Ajaxed update cart contents
 */
$dir1 = "content/themes/elements/header.php";

$line1 = '<div class="cart-contents">

  $cart_total = WC()->cart->get_cart_total();
  $cart_count = WC()->cart->cart_contents_count;
  echo "<p>" . $cart_count . " – " . $cart_total . "</p>";
  ?>
</div>';
$new1 = '';
$contents1 = file_get_contents($dir1);
$contents1 = str_replace($line1, $new1, $contents1);
file_put_contents($dir1, $contents1);

/*
 * Woocommerce includes and support in functions
 */
$dir2 = "content/themes/elements/functions.php";

$line2 = "// Woocommerce includes
require_once('includes/cart-update.php');
require_once('woocommerce/woo-functions.php');

// Add support for woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}";
$new2 = '';
$contents2 = file_get_contents($dir2);
$contents2 = str_replace($line2, $new2, $contents2);
file_put_contents($dir2, $contents2);

/*
 * Shortcodes in page template
 */
$dir3 = "content/themes/elements/page.php";

$line3 = "if ( class_exists('WooCommerce') ) {
  // Woocommere page shortcodes(see pages in backend)
  the_content();
}";
$new3 = '';
$contents3 = file_get_contents($dir3);
$contents3 = str_replace($line3, $new3, $contents3);
file_put_contents($dir3, $contents3);

unlink('delete-woocommerce.php');
?>
