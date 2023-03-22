<?php
/**
 * Plugin Name: Calculate CM IN Covert Shortcode
 * Plugin URL: https://wordpress.org/plugin-url/
 * Description: Calculate CM IN Covert Shortcode plugin.
 * Version: 1.0
 * Author: Ashish Prajapat
 * Author URI: 
 * Developer: Ashish Prajapat
 * Developer E-Mail: ashishp1202@gmail.com
 * Text Domain: calculate-cm-in-covert-shortcode
 * Domain Path: /languages
 *
 * Copyright: 
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions
 *
 * @package Calculate CM IN Covert Shortcode
 * @since 1.0
 */

if ( !defined( 'CMINSHORT_VERSION' ) ) {
	define( 'CMINSHORT_VERSION', '1.2' ); // Version of plugin
}

if ( !defined( 'CMINSHORT_FILE' ) ) {
	define( 'CMINSHORT_FILE', __FILE__ ); // Plugin File
}

if ( !defined( 'CMINSHORT_DIR' ) ) {
	define( 'CMINSHORT_DIR', dirname( __FILE__ ) ); // Plugin dir
}

if ( !defined( 'CMINSHORT_URL' ) ) {
	define( 'CMINSHORT_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}

if ( !defined( 'CMINSHORT_PLUGIN_BASENAME' ) ) {
	define( 'CMINSHORT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}

if ( !defined( 'CMINSHORT_PREFIX' ) ) {
	define( 'CMINSHORT_PREFIX', 'cminshort' ); // Plugin prefix
}

/**
 * Initialize the main class
 */
if ( !function_exists( 'CMINSHORT' ) ) {

	if ( is_admin() ) {
		require_once( CMINSHORT_DIR . '/inc/admin/class.' . CMINSHORT_PREFIX . '.admin.php' );
	} else {
		require_once( CMINSHORT_DIR . '/inc/front/class.' . CMINSHORT_PREFIX . '.front.php' );
	}
	//Initialize all the things.
	require_once( CMINSHORT_DIR . '/inc/class.' . CMINSHORT_PREFIX . '.php' );
}
