<?php
/**
 * Include parent best-shop style.css
 *
 * @return void
 */
function best_shop_enqueue_parent_styles() {
	$parent_style = 'best-shop';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'best_shop_enqueue_parent_styles' );

/**
 * Add show info button into product card
 *
 * @return void
 */
function add_show_info_button() {
	global $product;

	echo '<button class="show-info-btn" data-show-info-product-id="' . $product->get_id() . '">Show full info</button>';
}
add_action('woocommerce_after_shop_loop_item', 'add_show_info_button');

/**
 * Include modal-styles.css
 *
 * @return void
 */
function enqueue_custom_styles() {
	wp_enqueue_style('modal-styles', get_stylesheet_directory_uri() . '/css/modal-styles.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

/**
 * Include ajax-get-product-info.js
 * 
 * @return void
 */
function enqueue_js() {
	wp_enqueue_script('ajax-get-product-info', get_stylesheet_directory_uri() . '/js/ajax-get-product-info.js', 'jquery', '1.0', true);
	wp_localize_script('ajax-get-product-info', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);
}
add_action('wp_enqueue_scripts', 'enqueue_js');


/**
 * Function to handle ajax request
 *
 * @return void
 */
function get_product_info() {
	$product_id = $_POST['product_id'];
	$product_info = [
		'image' => get_the_post_thumbnail_url($product_id, 'full'),
		'description' => get_post_field('post_content', $product_id),
	];

	wp_send_json_success($product_info);
}
add_action('wp_ajax_get_product_info', 'get_product_info');
add_action('wp_ajax_nopriv_get_product_info', 'get_product_info');
