<?php

function geometry_init() {
	register_post_type( 'geometry', array(
		'labels'            => array(
			'name'                => __( 'Geometries', 'geonic' ),
			'singular_name'       => __( 'Geometry', 'geonic' ),
			'all_items'           => __( 'All Geometries', 'geonic' ),
			'new_item'            => __( 'New geometry', 'geonic' ),
			'add_new'             => __( 'Add New', 'geonic' ),
			'add_new_item'        => __( 'Add New geometry', 'geonic' ),
			'edit_item'           => __( 'Edit geometry', 'geonic' ),
			'view_item'           => __( 'View geometry', 'geonic' ),
			'search_items'        => __( 'Search geometries', 'geonic' ),
			'not_found'           => __( 'No geometries found', 'geonic' ),
			'not_found_in_trash'  => __( 'No geometries found in trash', 'geonic' ),
			'parent_item_colon'   => __( 'Parent geometry', 'geonic' ),
			'menu_name'           => __( 'Geometries', 'geonic' ),
		),
		'public'            => false,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => false,
		'supports'          => array( 'title', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => false,
		'query_var'         => false,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'geometry',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}

add_action( 'init', 'geometry_init' );

function geometry_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['geometry'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Geometry updated. <a target="_blank" href="%s">View geometry</a>', 'geonic'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'geonic'),
		3 => __('Custom field deleted.', 'geonic'),
		4 => __('Geometry updated.', 'geonic'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Geometry restored to revision from %s', 'geonic'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Geometry published. <a href="%s">View geometry</a>', 'geonic'), esc_url( $permalink ) ),
		7 => __('Geometry saved.', 'geonic'),
		8 => sprintf( __('Geometry submitted. <a target="_blank" href="%s">Preview geometry</a>', 'geonic'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Geometry scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview geometry</a>', 'geonic'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Geometry draft updated. <a target="_blank" href="%s">Preview geometry</a>', 'geonic'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'geometry_updated_messages' );
