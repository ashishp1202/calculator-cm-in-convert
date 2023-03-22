<?php
/**
 * CMINSHORT Class
 *
 * Handles the plugin functionality.
 *
 * @package WordPress
 * @package Plugin name
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


if ( !class_exists( 'CMINSHORT' ) ) {

	/**
	 * The main CMINSHORT class
	 */
	class CMINSHORT {

		private static $_instance = null;

		var $admin = null,
		    $front = null,
		    $lib   = null;

		public static function instance() {

			if ( is_null( self::$_instance ) )
				self::$_instance = new self();

			return self::$_instance;
		}

		function __construct() {
			add_action( 'plugins_loaded', array( $this, 'action__plugins_loaded' ), 1 );
		}

		
		/**
		 * Action: plugins_loaded
		 *
		 * - Plugin load function
		 *
		 * @method action__plugins_loaded
		 *
		 * @return [type] [description]
		*/
		function action__plugins_loaded() {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			global $wp_version;

			# Set filter for plugin's languages directory
			$CMINSHORT_lang_dir = dirname( CMINSHORT_PLUGIN_BASENAME ) . '/languages/';
			$CMINSHORT_lang_dir = apply_filters( 'CMINSHORT_languages_directory', $CMINSHORT_lang_dir );

			# Traditional WordPress plugin locale filter.
			$get_locale = get_locale();

			if ( $wp_version >= 4.7 ) {
				$get_locale = get_user_locale();
			}

			# Traditional WordPress plugin locale filter
			$locale = apply_filters( 'plugin_locale',  $get_locale, 'plugin-text-domain' );
			$mofile = sprintf( '%1$s-%2$s.mo', 'plugin-text-domain', $locale );

			# Setup paths to current locale file
			$mofile_global = WP_LANG_DIR . '/plugins/' . basename( CMINSHORT_DIR ) . '/' . $mofile;

			if ( file_exists( $mofile_global ) ) {
				# Look in global /wp-content/languages/plugin-name folder
				load_textdomain( 'plugin-text-domain', $mofile_global );
			} else {
				# Load the default language files
				load_plugin_textdomain( 'plugin-text-domain', false, $CMINSHORT_lang_dir );
			}
		}

	}
}

function CMINSHORT() {
	return CMINSHORT::instance();
}

CMINSHORT();
