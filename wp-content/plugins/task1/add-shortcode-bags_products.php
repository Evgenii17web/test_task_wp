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
	global $wpdb;
	// Add default attributes
	$atts = shortcode_atts(
		[
			'category' => 'bags',
			'limit'    => 3,
		],
		$atts,
		'bags_products'
	);
	// Get product name from DB
	$table_name    = $wpdb->prefix . 'products';
	$product_names = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT product_name FROM $table_name
        WHERE category = %s
        LIMIT %d",
			$atts['category'],
			$atts['limit']
		)
	);
	// If there are in tables products return products names
	if ( ! empty( $product_names ) ) {
		$result = '<ul>';
		foreach ( $product_names as $product_name ) {
			$result .= '<li>' . $product_name . '</li>';
		}
		$result .= '</ul>';
	} else {
		$result = "There are no bags!";
	}

	return $result;
}

/**
 * Create products table
 *
 * @return void
 */
function create_table(): void {
	global $wpdb;

	// Create table if not exist
	$table_name = $wpdb->prefix . 'products';
	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
		$sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        sku VARCHAR(20) NOT NULL,
        price INT,
        product_name VARCHAR(50),
        category VARCHAR(50),
        PRIMARY KEY (id)
    )";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		// Fill table with dummy data
		$categories = [ 'bags', 'phones', 'keyboards', 'pens' ];
		for ($i = 1; $i <= 20; $i++) {
			$data = [
				'sku'          => 'sku-' . rand( 1, 100 ),
				'price'        => rand( 1, 100 ),
				'product_name' =>  'product-' . rand( 1, 100 ),
				'category'     => $categories[array_rand( $categories )]
			];
			$wpdb->insert( $table_name, $data );
		}
	}
}

// Run create_table function during activating plugin
register_activation_hook( __FILE__, 'create_table' );