<?php

function category_init() {

	register_taxonomy( 'geo-team', array( 'geometry' ), array(
		'hierarchical'      => true,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => false,
		'rewrite'           => false,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Teams', 'geonic' ),
			'singular_name'              => _x( 'Team', 'taxonomy general name', 'geonic' ),
			'search_items'               => __( 'Search teams', 'geonic' ),
			'popular_items'              => __( 'Popular teams', 'geonic' ),
			'all_items'                  => __( 'All teams', 'geonic' ),
			'parent_item'                => __( 'Parent category', 'geonic' ),
			'parent_item_colon'          => __( 'Parent category:', 'geonic' ),
			'edit_item'                  => __( 'Edit category', 'geonic' ),
			'update_item'                => __( 'Update category', 'geonic' ),
			'add_new_item'               => __( 'New category', 'geonic' ),
			'new_item_name'              => __( 'New category', 'geonic' ),
			'separate_items_with_commas' => __( 'Separate teams with commas', 'geonic' ),
			'add_or_remove_items'        => __( 'Add or remove teams', 'geonic' ),
			'choose_from_most_used'      => __( 'Choose from the most used teams', 'geonic' ),
			'not_found'                  => __( 'No teams found.', 'geonic' ),
			'menu_name'                  => __( 'Teams', 'geonic' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'geo-team',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

	register_taxonomy( 'geo-category', array( 'geometry' ), array(
		'hierarchical'      => true,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => false,
		'rewrite'           => false,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Categories', 'geonic' ),
			'singular_name'              => _x( 'Category', 'taxonomy general name', 'geonic' ),
			'search_items'               => __( 'Search categories', 'geonic' ),
			'popular_items'              => __( 'Popular categories', 'geonic' ),
			'all_items'                  => __( 'All categories', 'geonic' ),
			'parent_item'                => __( 'Parent category', 'geonic' ),
			'parent_item_colon'          => __( 'Parent category:', 'geonic' ),
			'edit_item'                  => __( 'Edit category', 'geonic' ),
			'update_item'                => __( 'Update category', 'geonic' ),
			'add_new_item'               => __( 'New category', 'geonic' ),
			'new_item_name'              => __( 'New category', 'geonic' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'geonic' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'geonic' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'geonic' ),
			'not_found'                  => __( 'No categories found.', 'geonic' ),
			'menu_name'                  => __( 'Categories', 'geonic' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'geo-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

	register_taxonomy( 'geo-tag', array( 'geometry' ), array(
		'hierarchical'      => true,
		'public'            => false,
		'show_in_nav_menus' => false,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => false,
		'rewrite'           => false,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Tags', 'geonic' ),
			'singular_name'              => _x( 'Tag', 'taxonomy general name', 'geonic' ),
			'search_items'               => __( 'Search tags', 'geonic' ),
			'popular_items'              => __( 'Popular tags', 'geonic' ),
			'all_items'                  => __( 'All tags', 'geonic' ),
			'parent_item'                => __( 'Parent tag', 'geonic' ),
			'parent_item_colon'          => __( 'Parent tag:', 'geonic' ),
			'edit_item'                  => __( 'Edit tag', 'geonic' ),
			'update_item'                => __( 'Update tag', 'geonic' ),
			'add_new_item'               => __( 'New tag', 'geonic' ),
			'new_item_name'              => __( 'New tag', 'geonic' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'geonic' ),
			'add_or_remove_items'        => __( 'Add or remove tags', 'geonic' ),
			'choose_from_most_used'      => __( 'Choose from the most used tags', 'geonic' ),
			'not_found'                  => __( 'No tags found.', 'geonic' ),
			'menu_name'                  => __( 'Tags', 'geonic' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'geo-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );
}

add_action( 'init', 'category_init' );
