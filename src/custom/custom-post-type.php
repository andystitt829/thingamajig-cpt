<?php
/**
 * Custom Post Type functionality
 *
 * @package     AndyWPDev\Thingamajig\Custom
 * @since       1.0.0
 * @author      Andy Stitt
 * @link        https://andystitt.com
 * @license     GNU General Public License 2.0+
 */
namespace AndyWPDev\Thingamajig\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_post_type' );
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_post_type() {

	$labels = array(
		'name'               => _x( 'Thingamajigs', 'post type general name', 'thingamajig' ),
		'singular_name'      => _x( 'Thingamajig', 'post type singular name', 'thingamajig' ),
		'menu_name'          => _x( 'Thingamajigs', 'admin menu', 'thingamajig' ),
		'name_admin_bar'     => _x( 'Thingamajig', 'add new on admin bar', 'thingamajig' ),
		'add_new_item'       => __( 'Add New Thingamajig', 'thingamajig' ),
		'new_item'           => __( 'New Thingamajig', 'thingamajig' ),
		'edit_item'          => __( 'Edit Thingamajig', 'thingamajig' ),
		'view_item'          => __( 'View Thingamajig', 'thingamajig' ),
		'all_items'          => __( 'All Thingamajigs', 'thingamajig' ),
		'search_items'       => __( 'Search Thingamajigs', 'thingamajig' ),
		'parent_item_colon'  => __( 'Parent Thingamajigs:', 'thingamajig' ),
		'not_found'          => __( 'No thingamajigs found.', 'thingamajig' ),
		'not_found_in_trash' => __( 'No thingamajigs found in Trash.', 'thingamajig' ),

		'featured_image' 		 => __( 'Profile image.', 'thingamajig' ),
		'set_featured_image' 		 => __( 'Set profile image.', 'thingamajig' ),
		'remove_featured_image' 		 => __( 'Remove profile image.', 'thingamajig' ),
		'use_featured_image' 		 => __( 'Use profile image.', 'thingamajig' ),
	);

	$features = get_all_post_type_features( 'post', array(
		'excerpt',
		'comments',
		'trackbacks',
		'custom-fields',
	));

	$args = array(
		'label'  => __( 'Thingamajigs', 'thingamajig' ),
		'labels' => $labels,
		'public' => true,
		'supports' => $features,
		'has_archive' => true,
	);

	register_post_type( 'thingamajigs', $args );
}

function get_all_post_type_features( $post_type = 'post', $exclude_features = array() ) {
		$configured_features = get_all_post_type_supports( $post_type );

		$features = array();

		foreach( $configured_features as $feature => $value ) {
			if( in_array( $feature, $exclude_features ) ) {
				continue;
			}

			$features[] = $feature;
		}

		return $features;
}
