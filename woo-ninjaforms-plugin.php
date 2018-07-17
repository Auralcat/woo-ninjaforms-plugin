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
		// Prime the action
		add_action( 'admin_menu', array( $this, 'activate' ) );
	}

	function activate()
	{
		// Create menu page
		add_menu_page( 'Inscrições no Evento', 'Inscrições no Evento',
					   'manage_options', 'inscricoes-evento',
						array( $this, 'test_init' ));

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

	function test_init()
	{
		echo "<h1>Esta é a página do meu plugin</h1>";
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
