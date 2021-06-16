<?php
/**
 * Res Lemma WooCommerce functions and definitions
 *
 * @package    res-lemma
 * @copyright  Copyright (c) 2021, Vantage Themes
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! function_exists( 'res_lemma_wc_checkout_link' ) ) {
	/**
	 * If there are products in the cart, show a checkout link.
	 */
	function res_lemma_wc_checkout_link() {
		global $woocommerce;

		if ( count( $woocommerce->cart->cart_contents ) > 0 ) :

			echo '<a href="' . esc_url( $woocommerce->cart->get_checkout_url() ) . '" title="' . esc_attr__( 'Checkout', 'res-lemma' ) . '">' . esc_html__( 'Checkout', 'res-lemma' ) . '</a>';

		endif;
	}
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}