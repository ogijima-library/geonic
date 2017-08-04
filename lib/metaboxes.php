<?php

add_action( 'admin_enqueue_scripts', function( $hook ) {
	$screen = get_current_screen();
	if ( ( 'post-new.php' === $hook || 'post.php' === $hook ) && 'geometry' === $screen->post_type ) {
		wp_enqueue_script(
			'riot',
			'https://cdn.jsdelivr.net/npm/riot@3.6/riot+compiler.min.js',
			array(),
			false,
			true
		);

		wp_enqueue_script(
			'leaflet',
			'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.1.0/leaflet.js',
			array(),
			false,
			true
		);

		wp_enqueue_script(
			'app',
			plugins_url( 'js/app.js', dirname( __FILE__ ) ),
			array( 'jquery', 'riot', 'leaflet' ),
			false,
			true
		);

		wp_enqueue_style(
			'leaflet',
			'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.1.0/leaflet.css',
			array(),
			false
		);
	}
} );

add_action( 'add_meta_boxes', function() {
	add_meta_box( 'meta-box-id',
		__( 'Latitude and Longitude', 'geonic' ),
		'add_meta_boxes_callback',
		'geometry'
	);
} );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function add_meta_boxes_callback( $post ) {
	$tag = plugins_url( 'tags/map.tag', dirname( __FILE__ ) );
	wp_nonce_field( 'geonic-latlng', 'geonic-latlng-nonce' );
	?>
		<div id="geonic-map" style="width=100%; height:300px;"><map></map></div>
		<p class="">
			Latitude: <input id="geonic-lat" type="text" name="geonic-lat" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'geonic-lat', true ) ); ?>">
			Longitude: <input id="geonic-lng" type="text" name="geonic-lng" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'geonic-lng', true ) ); ?>">
		</p>
		<script src="<?php echo esc_url( $tag ); ?>" type="riot/tag"></script>
	<?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
add_action( 'save_post', function( $post_id ) {
	if ( ! empty( $_POST['geonic-latlng-nonce'] ) && wp_verify_nonce( $_POST['geonic-latlng-nonce'], 'geonic-latlng' ) ) {
		update_post_meta( $post_id, 'geonic-lat', $_POST['geonic-lat'] );
		update_post_meta( $post_id, 'geonic-lng', $_POST['geonic-lng'] );
	}
} );
