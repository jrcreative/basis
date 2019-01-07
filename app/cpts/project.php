<?php
// Register Custom Post Type
function register_project() {

$labels = array(
'name'                  => _x( 'Projects', 'Post Type General Name', 'basis' ),
'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'basis' ),
'menu_name'             => __( 'Projects', 'basis' ),
'name_admin_bar'        => __( 'Project', 'basis' ),
'archives'              => __( 'Project Archives', 'basis' ),
'attributes'            => __( 'Project Attributes', 'basis' ),
'parent_item_colon'     => __( 'Parent Project:', 'basis' ),
'all_items'             => __( 'All Projects', 'basis' ),
'add_new_item'          => __( 'Add New Project', 'basis' ),
'add_new'               => __( 'Add New', 'basis' ),
'new_item'              => __( 'New Project', 'basis' ),
'edit_item'             => __( 'Edit Project', 'basis' ),
'update_item'           => __( 'Update Project', 'basis' ),
'view_item'             => __( 'View Project', 'basis' ),
'view_items'            => __( 'View Project', 'basis' ),
'search_items'          => __( 'Search Projects', 'basis' ),
'not_found'             => __( 'Not found', 'basis' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'basis' ),
'featured_image'        => __( 'Project Image', 'basis' ),
'set_featured_image'    => __( 'Set project image', 'basis' ),
'remove_featured_image' => __( 'Remove project image', 'basis' ),
'use_featured_image'    => __( 'Use as project image', 'basis' ),
'insert_into_item'      => __( 'Insert into project', 'basis' ),
'uploaded_to_this_item' => __( 'Uploaded to this project', 'basis' ),
'items_list'            => __( 'Projects list', 'basis' ),
'items_list_navigation' => __( 'Projects list navigation', 'basis' ),
'filter_items_list'     => __( 'Filter project list', 'basis' ),
);
$args = array(
'label'                 => __( 'Project', 'basis' ),
'description'           => __( 'A list of Projects', 'basis' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'author' ),
'taxonomies'            => ['client', 'industry'],
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-portfolio',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'project', $args );

}
add_action( 'init', 'register_project', 0 );

// Register Custom Taxonomy - Industries for Projects
function project_industry() {

	$labels = array(
		'name'                       => _x( 'Industry', 'Taxonomy General Name', 'basis' ),
		'singular_name'              => _x( 'Industry', 'Taxonomy Singular Name', 'basis' ),
		'menu_name'                  => __( 'Industries', 'basis' ),
		'all_items'                  => __( 'All Industries', 'basis' ),
		'parent_item'                => __( 'Parent Industry', 'basis' ),
		'parent_item_colon'          => __( 'Parent Industry:', 'basis' ),
		'new_item_name'              => __( 'New Industry Name', 'basis' ),
		'add_new_item'               => __( 'Add Industry Type', 'basis' ),
		'edit_item'                  => __( 'Edit Industry', 'basis' ),
		'update_item'                => __( 'Update Industry', 'basis' ),
		'view_item'                  => __( 'View Industry', 'basis' ),
		'separate_items_with_commas' => __( 'Separate industries with commas', 'basis' ),
		'add_or_remove_items'        => __( 'Add or remove industries', 'basis' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'basis' ),
		'popular_items'              => __( 'Hot Industries', 'basis' ),
		'search_items'               => __( 'Search Industries', 'basis' ),
		'not_found'                  => __( 'Not Found', 'basis' ),
		'no_terms'                   => __( 'No Industries', 'basis' ),
		'items_list'                 => __( 'Industries list', 'basis' ),
		'items_list_navigation'      => __( 'Industries list navigation', 'basis' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'industry', array( 'project' ), $args );

}
add_action( 'init', 'project_industry', 0 );

// Register Custom Taxonomy - Clients for Projects
function project_client() {

	$labels = array(
		'name'                       => _x( 'Client', 'Taxonomy General Name', 'basis' ),
		'singular_name'              => _x( 'Client', 'Taxonomy Singular Name', 'basis' ),
		'menu_name'                  => __( 'Clients', 'basis' ),
		'all_items'                  => __( 'All Clients', 'basis' ),
		'parent_item'                => __( 'Parent Client', 'basis' ),
		'parent_item_colon'          => __( 'Parent Client:', 'basis' ),
		'new_item_name'              => __( 'New Client Name', 'basis' ),
		'add_new_item'               => __( 'Add New Client', 'basis' ),
		'edit_item'                  => __( 'Edit Client', 'basis' ),
		'update_item'                => __( 'Update Client', 'basis' ),
		'view_item'                  => __( 'View Client', 'basis' ),
		'separate_items_with_commas' => __( 'Separate clients with commas', 'basis' ),
		'add_or_remove_items'        => __( 'Add or remove clients', 'basis' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'basis' ),
		'popular_items'              => __( 'Hot Clients', 'basis' ),
		'search_items'               => __( 'Search Clients', 'basis' ),
		'not_found'                  => __( 'Not Found', 'basis' ),
		'no_terms'                   => __( 'No Clients', 'basis' ),
		'items_list'                 => __( 'Clients list', 'basis' ),
		'items_list_navigation'      => __( 'Clients list navigation', 'basis' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'client', array( 'project' ), $args );

}
add_action( 'init', 'project_client', 1 );