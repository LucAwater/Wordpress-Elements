<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author	WooThemes
 * @package	WooCommerce/Templates
 * @version	2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php do_action( 'woocommerce_archive_description' ); ?>

	<?php if ( have_posts() ) : ?>

		<?php
		// Categories
		$args = array(
			'taxonomy'		=> 'product_cat',
			'orderby'			=> 'name',
			'show_count'	=> 0
		);

		$categories = get_categories( $args );

		echo '<ul>';

			foreach( $categories as $cat ){
				echo '<li><a href="' . get_term_link( $cat->slug, 'product_cat' ) . '">' . $cat->name . '</a></li>';
			}

		echo '</ul>';
		?>

		<?php
		// Ordering
			/**
			 * woocommerce_before_shop_loop hook
			 *
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );
		?>

		<?php woocommerce_product_loop_start(); ?>

			<?php woocommerce_product_subcategories(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>

<?php get_footer( 'shop' ); ?>
