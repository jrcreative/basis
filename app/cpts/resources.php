<?php
// Register Custom Post Type
function register_resources() {

$labels = array(
'name'                  => _x( 'Resources', 'Post Type General Name', 'diamanti' ),
'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'diamanti' ),
'menu_name'             => __( 'Resources', 'diamanti' ),
'name_admin_bar'        => __( 'Resource', 'diamanti' ),
'archives'              => __( 'Resource Archives', 'diamanti' ),
'attributes'            => __( 'Resource Attributes', 'diamanti' ),
'parent_item_colon'     => __( 'Parent Resource:', 'diamanti' ),
'all_items'             => __( 'All Resources', 'diamanti' ),
'add_new_item'          => __( 'Add New Resource', 'diamanti' ),
'add_new'               => __( 'Add New', 'diamanti' ),
'new_item'              => __( 'New Resource', 'diamanti' ),
'edit_item'             => __( 'Edit Resource', 'diamanti' ),
'update_item'           => __( 'Update Resource', 'diamanti' ),
'view_item'             => __( 'View Resource', 'diamanti' ),
'view_items'            => __( 'View Resource', 'diamanti' ),
'search_items'          => __( 'Search Resources', 'diamanti' ),
'not_found'             => __( 'Not found', 'diamanti' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'diamanti' ),
'featured_image'        => __( 'Resource Image', 'diamanti' ),
'set_featured_image'    => __( 'Set resource image', 'diamanti' ),
'remove_featured_image' => __( 'Remove resource image', 'diamanti' ),
'use_featured_image'    => __( 'Use as resource image', 'diamanti' ),
'insert_into_item'      => __( 'Insert into resource', 'diamanti' ),
'uploaded_to_this_item' => __( 'Uploaded to this resource', 'diamanti' ),
'items_list'            => __( 'Resources list', 'diamanti' ),
'items_list_navigation' => __( 'Resources list navigation', 'diamanti' ),
'filter_items_list'     => __( 'Filter resource list', 'diamanti' ),
);
$args = array(
'label'                 => __( 'Resource', 'diamanti' ),
'description'           => __( 'A list of Resources', 'diamanti' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'author' ),
'taxonomies'            => array( 'type', ' role', ' industry', 'post_tag' ),
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
register_post_type( 'resource', $args );

}
add_action( 'init', 'register_resources', 0 );

// Register Custom Taxonomy
function resource_media() {

	$labels = array(
		'name'                       => _x( 'Media', 'Taxonomy General Name', 'diamanti' ),
		'singular_name'              => _x( 'Media', 'Taxonomy Singular Name', 'diamanti' ),
		'menu_name'                  => __( 'Media', 'diamanti' ),
		'all_items'                  => __( 'All Media', 'diamanti' ),
		'parent_item'                => __( 'Parent Media', 'diamanti' ),
		'parent_item_colon'          => __( 'Parent Media:', 'diamanti' ),
		'new_item_name'              => __( 'New Media Name', 'diamanti' ),
		'add_new_item'               => __( 'Add Media Type', 'diamanti' ),
		'edit_item'                  => __( 'Edit Media', 'diamanti' ),
		'update_item'                => __( 'Update Media', 'diamanti' ),
		'view_item'                  => __( 'View Media', 'diamanti' ),
		'separate_items_with_commas' => __( 'Separate media with commas', 'diamanti' ),
		'add_or_remove_items'        => __( 'Add or remove media', 'diamanti' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'diamanti' ),
		'popular_items'              => __( 'Hot Media', 'diamanti' ),
		'search_items'               => __( 'Search Media', 'diamanti' ),
		'not_found'                  => __( 'Not Found', 'diamanti' ),
		'no_terms'                   => __( 'No Media', 'diamanti' ),
		'items_list'                 => __( 'Media list', 'diamanti' ),
		'items_list_navigation'      => __( 'Media list navigation', 'diamanti' ),
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
	register_taxonomy( 'media', array( 'resource' ), $args );

}
add_action( 'init', 'resource_media', 0 );

// Register Custom Taxonomy - Roles for Resources
function resource_topic() {

	$labels = array(
		'name'                       => _x( 'Topic', 'Taxonomy General Name', 'diamanti' ),
		'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'diamanti' ),
		'menu_name'                  => __( 'Topics', 'diamanti' ),
		'all_items'                  => __( 'All Topics', 'diamanti' ),
		'parent_item'                => __( 'Parent Topic', 'diamanti' ),
		'parent_item_colon'          => __( 'Parent Topic:', 'diamanti' ),
		'new_item_name'              => __( 'New Topic Name', 'diamanti' ),
		'add_new_item'               => __( 'Add New Topic', 'diamanti' ),
		'edit_item'                  => __( 'Edit Topic', 'diamanti' ),
		'update_item'                => __( 'Update Topic', 'diamanti' ),
		'view_item'                  => __( 'View Topic', 'diamanti' ),
		'separate_items_with_commas' => __( 'Separate topics with commas', 'diamanti' ),
		'add_or_remove_items'        => __( 'Add or remove topics', 'diamanti' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'diamanti' ),
		'popular_items'              => __( 'Hot Topics', 'diamanti' ),
		'search_items'               => __( 'Search Topics', 'diamanti' ),
		'not_found'                  => __( 'Not Found', 'diamanti' ),
		'no_terms'                   => __( 'No Topics', 'diamanti' ),
		'items_list'                 => __( 'Topics list', 'diamanti' ),
		'items_list_navigation'      => __( 'Topics list navigation', 'diamanti' ),
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
	register_taxonomy( 'resource_topic', array( 'resource' ), $args );

}
add_action( 'init', 'resource_topic', 1 );