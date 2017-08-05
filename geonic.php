<?php
/**
 * Plugin Name:     Geonic
 * Plugin URI:      https://github.com/ogijima-library/geonic
 * Description:     A WordPress plugin that manages geometries.
 * Author:          Takayuki Miyauchi
 * Author URI:      https://miya.io/
 * Text Domain:     geonic
 * Domain Path:     /languages
 * Version:         nightly
 *
 * @package         Geonic
 */

require_once( dirname( __FILE__ ) . '/lib/post-type.php' );
require_once( dirname( __FILE__ ) . '/lib/taxonomy.php' );
// require_once( dirname( __FILE__ ) . '/lib/metaboxes.php' );

// Autoload
require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

add_action( 'init', function() {
	$plugin_slug = plugin_basename( __FILE__ ); // e.g. `hello/hello.php`.
	$gh_user = 'ogijima-library';                      // The user name of GitHub.
	$gh_repo = 'geonic';       // The repository name of your plugin.

	// Activate automatic update.
	new Miya\WP\GH_Auto_Updater( $plugin_slug, $gh_user, $gh_repo );
} );

add_action( 'rest_api_init', function() {
	// register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	register_rest_field( 'geometry', 'geometry', array(
		'get_callback' => function( $object ) {
			$post_id = $object['id'];
			return array(
				'lat' => get_post_meta( $post_id, '_geonic-lat', true ),
				'lng' => get_post_meta( $post_id, '_geonic-lng', true ),
			);
		},
		'schema' => null,
		)
	);
} );

$map = new \Miya\WP\Custom_Field\Map( 'geonic', 'Map' );
$map->add( 'geometry' );
