<?php

// Register Custom Post Types
function diamanti_testimonials_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Types General Name', 'diamanti' ),
		'singular_name'         => _x( 'Testimonial', 'Post Types Singular Name', 'diamanti' ),
		'menu_name'             => __( 'Testimonials', 'diamanti' ),
		'name_admin_bar'        => __( 'Testimonial', 'diamanti' ),
		'archives'              => __( 'Testimonial Archives', 'diamanti' ),
		'attributes'            => __( 'Testimonial Attributes', 'diamanti' ),
		'parent_item_colon'     => __( 'Parent Item:', 'diamanti' ),
		'all_items'             => __( 'All Testimonials', 'diamanti' ),
		'add_new_item'          => __( 'Add New Testimonial', 'diamanti' ),
		'add_new'               => __( 'Add New', 'diamanti' ),
		'new_item'              => __( 'New Testimonial', 'diamanti' ),
		'edit_item'             => __( 'Edit Testimonial', 'diamanti' ),
		'update_item'           => __( 'Update Testimonial', 'diamanti' ),
		'view_item'             => __( 'View Testimonial', 'diamanti' ),
		'view_items'            => __( 'View Testimonials', 'diamanti' ),
		'search_items'          => __( 'Search Testimonial', 'diamanti' ),
		'not_found'             => __( 'Not found', 'diamanti' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'diamanti' ),
		'featured_image'        => __( 'Image or Logo', 'diamanti' ),
		'set_featured_image'    => __( 'Set testimonial image', 'diamanti' ),
		'remove_featured_image' => __( 'Remove testimonial image', 'diamanti' ),
		'use_featured_image'    => __( 'Use as testimonial image', 'diamanti' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'diamanti' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'diamanti' ),
		'items_list'            => __( 'Testimonials list', 'diamanti' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'diamanti' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'diamanti' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'diamanti' ),
		'description'           => __( 'Client Testimonials', 'diamanti' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'testimonial_topic', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'diamanti_testimonials_cpt', 0 );

// Register Custom Taxonomy
function testimonial_topic() {

	$labels = array(
		'name'                       => _x( 'Topics', 'Taxonomy General Name', 'diamanti' ),
		'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'diamanti' ),
		'menu_name'                  => __( 'Topic', 'diamanti' ),
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
		'no_terms'                   => __( 'No topics', 'diamanti' ),
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
	register_taxonomy( 'topic', array( 'testimonial' ), $args );

}
add_action( 'init', 'testimonial_topic', 0 );
