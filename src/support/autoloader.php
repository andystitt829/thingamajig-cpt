<?php
/**
 * File autoloader functionality
 *
 * @package     AndyWPDev\Thingamajig\Support
 * @since       1.0.0
 * @author      Andy Stitt
 * @link        https://andystitt.com
 * @license     GNU General Public License 2.0+
 */
namespace AndyWPDev\Thingamajig\Support;

/**
 * Load all of the plugin's files.
 *
 * @since 1.0.0
 *
 * @param string $src_root_dir Root directory for the source files
 *
 * @return void
 */
function autoload_files( $src_root_dir ) {

	$filenames = array(
		 'custom/custom-post-type',
	);

	foreach( $filenames as $filename ) {
		include_once( $src_root_dir . $filename . '.php' );
	}
}
