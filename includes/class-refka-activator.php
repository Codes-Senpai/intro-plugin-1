<?php

/**
 * Fired during plugin activation
 *
 * @link       refka-mahdouani
 * @since      1.0.0
 *
 * @package    Refka
 * @subpackage Refka/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Refka
 * @subpackage Refka/includes
 * @author     refka-mahdouani <refkamahdouani2013@gmail.com>
 */
class Refka_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {


		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
	
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	
		$table_name = $wpdb->prefix . "refka_test"; 
	
		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  nom text NOT NULL,
		  mail text ,
		  tel text NOT NULL,
		  msg text,
		  password text NOT NULL,
		  
		  PRIMARY KEY  (id)
		) $charset_collate;";
		maybe_create_table( $table_name, $sql );



	}

}
