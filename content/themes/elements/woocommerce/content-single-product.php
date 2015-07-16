<?php
/**
* @version	1.6.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $woocommerce, $product;

// Get the price(in pieces)
$product_price = explode(',', $product->get_price_html());
?>

<?php
/**
* woocommerce_before_single_product hook
*
* @hooked wc_print_notices - 10
*/
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Product images -->
	<?php if( $product->is_type('simple') ): ?>
		<div class="product-images slider">
			<!-- The images -->
			<ul class="slider-images">
				<?php
				$images = $product->get_gallery_attachment_ids();

				foreach ( $images as $img ):
					$img_attr = wp_get_attachment_image_src($img, "large");
					?>

					<li><img src="<?php echo $img_attr[0]; ?>" width="<?php echo $img_attr[1]; ?>" height="<?php echo $img_attr[2]; ?>"></li>
				<?php endforeach; ?>
			</ul>

			<!-- The bullets -->
			<ul class="slider-bullets">
				<?php foreach( $images as $img ): ?>
					<li><i></i></li>
				<?php endforeach; ?>
			</ul>

			<!-- Arrow controls -->
			<ul class="slider-controls">
				<a class="slider-prev"><i></i></a>
	    	<a class="slider-next"><i></i></a>
			</ul>
		</div>
	<?php else:
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	endif;
	?>

	<!-- Product info -->
	<?php
	$title = get_the_title();
	$subtitle = get_field( 'product_subtitle' );
	$description = get_field( 'product_description' );
	?>

	<div class="product-info">
		<h1><?php echo $title; ?></h1>
		<h2><?php echo $subtitle; ?></h2>
		<?php echo $description; ?>

		<?php
		if( $product->is_type('simple') ){
			echo '<p>' . $product_price[0] . '</p>';
		}
		?>

		<?php
			/**
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	* woocommerce_after_single_product_summary hook
	*
	* @hooked woocommerce_output_product_data_tabs - 10
	* @hooked woocommerce_upsell_display - 15
	* @hooked woocommerce_output_related_products - 20
	*/
	do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
