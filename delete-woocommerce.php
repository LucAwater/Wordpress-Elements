<?php
// Remove files
unlink('content/themes/elements/woocommerce/woo-functions.php');
unlink('content/themes/elements/includes/cart-update.php');
unlink('content/themes/elements/js/vendor/add-to-cart-variation.min.js');

// Remove directories
function Delete($path){
  if (is_dir($path) === true){
    $files = array_diff(scandir($path), array('.', '..'));

    foreach ($files as $file){
      Delete(realpath($path) . '/' . $file);
    }

    return rmdir($path);
  }

  else if (is_file($path) === true){
    return unlink($path);
  }

  return false;
}

Delete('content/plugins/woocommerce');
Delete('content/plugins/woocommerce-ajax-add-to-cart-for-variable-products');
Delete('content/themes/elements/woocommerce');
Delete('content/themes/elements/sass/woocommerce');

// Remove functions in files
$string1 = "// Woocommerce includes
require_once('includes/cart-update.php');
require_once('woocommerce/woo-functions.php');

// Add support for woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}";
$file1 = 'content/themes/elements/functions.php';
$contents1 = file_get_contents($file1);
$contents1 = str_replace($string1, '', $contents1);
file_put_contents($file1, $contents1);


$string2 = "
if ( class_exists('WooCommerce') ) {
  // Woocommere page shortcodes(see pages in backend)
  the_content();
}";
$file2 = 'content/themes/elements/page.php';
$contents2 = file_get_contents($file2);
$contents2 = str_replace($string2, '', $contents2);
file_put_contents($file2, $contents2);

// Remove file itself
unlink('delete-woocommerce.php');
?>
