<?php
/**
 * Trigger this file on Plugin uninstall
 *
 * @package Woo_Ninjaforms_Plugin
 */
// You can define uninstall actions here, they get called inside the main
// plugin file.

// Sanity check
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear stored data in database
$example_book_posts = get_posts ( array( 'post_type'   => 'example_book',
										 'numberposts' => -1 ) );

foreach( $example_book_posts as $post ) {
	// Force deletion in the last arg
	wp_delete_post( $post->ID, true )
}
