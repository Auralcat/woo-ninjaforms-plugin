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

final class WooNinjaformsPlugin
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
						array( $this, 'main' ));
		add_action( 'admin_notice', 'This is a test notice!' );

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

	// You'll need to write the HTML of the page here.
	function main()
	{
		echo "<h1>Esta é a página do meu plugin</h1>";
		echo "<p>Some content goes here.</p>";
	}
}

// Initialize class only if it exists
if ( class_exists ( 'WooNinjaformsPlugin' ) ) {
	$wooNinjaFormsPlugin = new WooNinjaformsPlugin();
}
