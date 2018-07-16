<?php
/**
 * Plugin Name:     Woo Ninjaforms Plugin
 * Plugin URI:      https://github.com/Auralcat/woo-ninjaforms-plugin/
 * Description:     Show WooCommerce orders with NinjaForms submissions
 * Author:          Miriam Retka
 * Author URI:      miriamretka.com
 * Text Domain:     woo-ninjaforms-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Woo_Ninjaforms_Plugin
 */

// Your code starts here.
// Kill plugin if abspath is not defined
defined ( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

if ( ! function_exists( 'add_action' ) ) {
	// Wordpress wasn't initialized properly
	echo "Hey, you can't access this file!";
	exit;
}

class WooNinjaformsPlugin
{
	function __construct($string) {

	}
}

// Initialize class only if it exists
if ( class_exists ( 'WooNinjaformsPlugin' ) ) {
	$wooNinjaFormsPlugin = new WooNinjaformsPlugin();
}
