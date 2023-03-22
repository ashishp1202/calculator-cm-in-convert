<?php
/**
 * CMINSHORT_Admin Class
 *
 * Handles the admin functionality.
 *
 * @package WordPress
 * @subpackage Plugin name
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'CMINSHORT_Admin' ) ) {

	/**
	 * The CMINSHORT_Admin Class
	 */
	class CMINSHORT_Admin {

		var $action = null,
			$filter = null;
	}

	add_action( 'plugins_loaded', function() {
		CMINSHORT()->admin = new CMINSHORT_Admin;
	} );
}
