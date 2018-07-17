<?php
/**
 * This file is triggered on plugin uninstall
 *
 * @package Woo_Ninjaforms_Plugin
 */

// Sanity check
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear stored data in database
$example_book_posts = get_posts ( array( 'post_type'   => 'example_book',
										 'numberposts' => -1 ) );

foreach( $example_book_posts as $post ) {
	// Force deletion in the last arg
	wp_delete_post( $post->ID, true );
}

// Access the DB via SQL
global $wpdb;
global $table_prefix;

// Send direct query
// To clear the DB of custom posts, clear wp_posts, wp_postmeta and wp_term_relationships
$wpdb->query( "DELETE FROM " . $table_prefix . "posts WHERE post_type = 'example_book'" );
$wpdb->query( "DELETE FROM " . $table_prefix . "postmeta WHERE post_id NOT IN (SELECT id from " . $table_prefix . "posts)" );
$wpdb->query( "DELETE FROM " . $table_prefix . "term_relationships WHERE object_id NOT IN (SELECT id from " . $table_prefix . "posts)" );
