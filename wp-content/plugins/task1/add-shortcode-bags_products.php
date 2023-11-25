<?php
/*
Plugin Name: Shortcode bags
Description: Add shortcode [bags_products]
Version: 1.0
Author: Evgen
*/

add_shortcode( 'bags_products', 'bags_products' );

/**
 * Function for shortcode [bags_products].
 *
 * Get products names by category.
 * By default three products from bags category.
 *
 * @param $atts
 *
 * @return string
 */
function bags_products( $atts ): string {
	// Add default attributes
	$atts = shortcode_atts(
		[
			'category' => 'bags',
			'limit'    => 3,
		],
		$atts,
		'bags_products'
	);
  // Get products
	$products = wc_get_products( array(
		'category' => [ $atts['category'] ],
		'limit'    => $atts['limit']
	) );
	// If there are in tables products return products names
	if ( !empty( $products ) ) {
		$result = "<ul><h3>{$atts['limit']} latest products from category {$atts['category']}</h3>";
		foreach ( $products as $product ) {
			$result .= '<li>' . $product->get_title() . '</li>';
		}
		$result .= '</ul>';
	} else {
		$result = "There are no products in category {$atts['category']}!";
	}

	return $result;
}

register_activation_hook( __FILE__, 'activate_plugin_add_shortcode' );
function activate_plugin_add_shortcode() {
	if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( 'Shortcode bags plugin requires WooCommerce. Please activate WooCommerce and try again.' );
	}
}