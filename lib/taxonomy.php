<?php

function category_init() {
	register_taxonomy( 'geo-category', array( 'geometry' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search categories', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular categories', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All categories', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent category', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent category:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit category', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update category', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'New category', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New category', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No categories found.', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'geo-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

	register_taxonomy( 'tag-category', array( 'geometry' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search categories', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular categories', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All categories', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent category', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent category:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit category', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update category', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'New category', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New category', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No categories found.', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Categories', 'YOUR-TEXTDOMAIN' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'geo-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );
}

add_action( 'init', 'category_init' );
