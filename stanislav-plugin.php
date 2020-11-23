<?php
/**
 * @package  StanislavPlugin
 */
/*
Plugin Name: Stanislav Plugin
Description: This is a task .
Version: 1.0.0
Author: Stanislav Ivanov
License: MIT
*/

/*
This is a SG Task
*/

//secure
if(!defined('ABSPATH')){
	die;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}



use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * runs during plugin activation
 */
function activate_stanislav_plugin() {
	Activate::activate();
}

register_activation_hook( __FILE__, 'activate_stanislav_plugin' ); // activate

/**
 * runs during plugin deactivation
 */
function deactivate_stanislav__plugin() {
	Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_stanislav__plugin' ); //deactivate

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}


// Initialize table in database 
		function products_create_db() {
			 global $wpdb;
			 $charset_collate = $wpdb->get_charset_collate();
			 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

			 //* Create the products table
			 $table_name = $wpdb->prefix . 'products';
			 $sql = "CREATE TABLE $table_name (
			 product_id INTEGER NOT NULL AUTO_INCREMENT,
			 product_title TEXT NOT NULL,
			 product_price TEXT NOT NULL,
			 product_new_price TEXT ,
			 product_quantity TEXT NOT NULL,
			 product_stock TEXT NOT NULL,
			 product_start_date TEXT ,
			 product_end_date TEXT ,
			 product_type TEXT NOT NULL,
			 PRIMARY KEY (product_id)
			 ) $charset_collate;";
			 dbDelta( $sql );
			}

		
		register_activation_hook( __FILE__, 'products_create_db' );



