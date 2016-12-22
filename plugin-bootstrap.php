<?php
/**
 * Thingamajig Plugin
 *
 * @package     AndyWPDev\Thingamajig
 * @author      Andy Stitt
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Thingamajig Custom Post Type
 * Plugin URI:  https://github.com/andystitt829/thingamajig-cpt
 * Description: A plugin that generates a custom post type (CPT). Simply replace "Thingamajig" with whatever your CPT name is.
 * Version:     1.0.0
 * Author:      Andy Stitt
 * Author URI:  https://andystitt.com
 * Text Domain: thingamajig
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace AndyWPDev\Thingamajig;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'THINGAMAJIG_URL', $plugin_url );
	define( 'THINGAMAJIG_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Initialize the plugin hooks
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\flush_rewrites' );
	register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
}

/**
 * Flush the rewrites.
 *
 * @since 1.0.0
 *
 * @return void
 */
function flush_rewrites() {
	init_autoloader();

	Custom\register_custom_post_type();

	flush_rewrite_rules();
}

/**
 * Kick off the plugin by initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_autoloader() {
	require_once( 'src/support/autoloader.php' );

	Support\autoload_files( __DIR__ . '/src/' );
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_constants();
	init_hooks();
	init_autoloader();
}

launch();
