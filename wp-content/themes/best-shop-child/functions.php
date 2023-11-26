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
