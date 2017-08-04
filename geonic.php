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
require_once( dirname( __FILE__ ) . '/lib/metaboxes.php' );

// Autoload
require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

add_action( 'init', 'activate_autoupdate' );

function activate_autoupdate() {
	$plugin_slug = plugin_basename( __FILE__ ); // e.g. `hello/hello.php`.
	$gh_user = 'ogijima-library';                      // The user name of GitHub.
	$gh_repo = 'geonic';       // The repository name of your plugin.

	// Activate automatic update.
	new Miya\WP\GH_Auto_Updater( $plugin_slug, $gh_user, $gh_repo );
}
