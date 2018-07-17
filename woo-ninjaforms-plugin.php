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
	function __construct() {
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}

	function activate()
	{
		// Generated a Custom Post Type
		$this->custom_post_type();

		// Flush rewrite rules
		flush_rewrite_rules();
	}

	function deactivate()
	{
		// Flush rewrite rules
		flush_rewrite_rules();
	}

	function uninstall()
	{
		// Delete Custom Post Type
		// Delete all the plugin data from the DB
	}

	// Custom methods go here.
	function custom_post_type()
	{
		register_post_type( 'example_book', ['public' => true, 'label' => 'Example Book Post']);
	}
}

// Initialize class only if it exists
if ( class_exists ( 'WooNinjaformsPlugin' ) ) {
	$wooNinjaFormsPlugin = new WooNinjaformsPlugin();
}

// // Activation
// register_activation_hook( __FILE__, array( $wooNinjaFormsPlugin, 'activate' ) );

// add_action( 'init', 'function_name');

// // Deactivation hook
// register_activation_hook( __FILE__, array( $wooNinjaFormsPlugin, 'deactivate' ) );

// // Uninstall hook
// register_uninstall_hook( __FILE__, array( $wooNinjaFormsPlugin, 'uninstall' ))
