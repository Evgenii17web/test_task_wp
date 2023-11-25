<?php
/*
Plugin Name: eCommerce Companion
Description: eCommerce Companion is created for Seller Themes. The plugin set frontpage sections for navigation, info, slider, category, products & blog. It has come with single click installation and make your beautifully eCommerce website. It allow edit customizer settings for the theme. Extend your theme functionalities with one click import & enjoy free stock images. Visit our website and find theme as you need. https://www.sellerthemes.com/themes
Version: 5.5
Requires: 4.6 or higher
Author: sellerthemes
Author URI: https://sellerthemes.com
Text Domain: ecommerce-companion
Requires PHP: 5.6
*/
define( 'ECOMMERCE_COMP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ECOMMERCE_COMP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function ecommerce_companion_activate() {
	
	/**
	 * Load Custom control in Customizer
	 */
	 require_once('inc/custom-controls/customizer-controls.php');
	
	/**
	 * Load Theme
	 */
	 require_once('inc/themes.php');
		
	}
add_action( 'init', 'ecommerce_companion_activate' );

/**
 * The code during plugin activation.
 */
function ecommerce_companion_activates() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activator.php';
	eCommerce_Comapnion_Activator::activate();
}
register_activation_hook( __FILE__, 'ecommerce_companion_activates' );

//Added Widget
require_once('inc/widget/social-widget.php');			
require_once('inc/widget/info-widget.php');			
add_action('widgets_init', function(){ register_widget('ecommerce_companion_social_icon_widget'); });
add_action('widgets_init', function(){ register_widget('ecommerce_companion_info_widget'); });