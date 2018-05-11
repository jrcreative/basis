<?php
// Register Custom Post Type
function register_events() {

$labels = array(
'name'                  => _x( 'Events', 'Post Type General Name', 'diamanti' ),
'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'diamanti' ),
'menu_name'             => __( 'Events', 'diamanti' ),
'name_admin_bar'        => __( 'Event', 'diamanti' ),
'archives'              => __( 'Event Archives', 'diamanti' ),
'attributes'            => __( 'Event Attributes', 'diamanti' ),
'parent_item_colon'     => __( 'Parent Event:', 'diamanti' ),
'all_items'             => __( 'All Events', 'diamanti' ),
'add_new_item'          => __( 'Add New Event', 'diamanti' ),
'add_new'               => __( 'Add New', 'diamanti' ),
'new_item'              => __( 'New Event', 'diamanti' ),
'edit_item'             => __( 'Edit Event', 'diamanti' ),
'update_item'           => __( 'Update Event', 'diamanti' ),
'view_item'             => __( 'View Event', 'diamanti' ),
'view_items'            => __( 'View Event', 'diamanti' ),
'search_items'          => __( 'Search Events', 'diamanti' ),
'not_found'             => __( 'Not found', 'diamanti' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'diamanti' ),
'featured_image'        => __( 'Event Image', 'diamanti' ),
'set_featured_image'    => __( 'Set event image', 'diamanti' ),
'remove_featured_image' => __( 'Remove event image', 'diamanti' ),
'use_featured_image'    => __( 'Use as event image', 'diamanti' ),
'insert_into_item'      => __( 'Insert into event', 'diamanti' ),
'uploaded_to_this_item' => __( 'Uploaded to this event', 'diamanti' ),
'items_list'            => __( 'Events list', 'diamanti' ),
'items_list_navigation' => __( 'Events list navigation', 'diamanti' ),
'filter_items_list'     => __( 'Filter event list', 'diamanti' ),
);
$args = array(
'label'                 => __( 'Event', 'diamanti' ),
'description'           => __( 'A list of Events', 'diamanti' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
'taxonomies'            => array( 'type', ' role', ' industry', 'post_tag' ),
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-calendar-alt',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'event', $args );

}
add_action( 'init', 'register_events', 0 );

// Register Custom Taxonomy
function event_type() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'diamanti' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'diamanti' ),
		'menu_name'                  => __( 'Type', 'diamanti' ),
		'all_items'                  => __( 'All Types', 'diamanti' ),
		'parent_item'                => __( 'Parent Type', 'diamanti' ),
		'parent_item_colon'          => __( 'Parent Type:', 'diamanti' ),
		'new_item_name'              => __( 'New Type Name', 'diamanti' ),
		'add_new_item'               => __( 'Add New Type', 'diamanti' ),
		'edit_item'                  => __( 'Edit Type', 'diamanti' ),
		'update_item'                => __( 'Update Type', 'diamanti' ),
		'view_item'                  => __( 'View Type', 'diamanti' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'diamanti' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'diamanti' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'diamanti' ),
		'popular_items'              => __( 'Hot Types', 'diamanti' ),
		'search_items'               => __( 'Search Types', 'diamanti' ),
		'not_found'                  => __( 'Not Found', 'diamanti' ),
		'no_terms'                   => __( 'No Types', 'diamanti' ),
		'items_list'                 => __( 'Types list', 'diamanti' ),
		'items_list_navigation'      => __( 'Types list navigation', 'diamanti' ),
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
	register_taxonomy( 'type', array( 'event' ), $args );

}
add_action( 'init', 'event_type', 0 );