<?php
// Register Custom Post Type
function register_staff() {

$labels = array(
'name'                  => _x( 'Staff', 'Post Type General Name', 'basis' ),
'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'basis' ),
'menu_name'             => __( 'Staff', 'basis' ),
'name_admin_bar'        => __( 'Staff', 'basis' ),
'archives'              => __( 'Staff Archives', 'basis' ),
'attributes'            => __( 'Staff Attributes', 'basis' ),
'parent_item_colon'     => __( 'Parent Staff:', 'basis' ),
'all_items'             => __( 'All Staff', 'basis' ),
'add_new_item'          => __( 'Add New Staff', 'basis' ),
'add_new'               => __( 'Add New', 'basis' ),
'new_item'              => __( 'New Staff', 'basis' ),
'edit_item'             => __( 'Edit Staff', 'basis' ),
'update_item'           => __( 'Update Staff', 'basis' ),
'view_item'             => __( 'View Staff', 'basis' ),
'view_items'            => __( 'View Staff', 'basis' ),
'search_items'          => __( 'Search Staff', 'basis' ),
'not_found'             => __( 'Not found', 'basis' ),
'not_found_in_trash'    => __( 'Not found in Trash', 'basis' ),
'featured_image'        => __( 'Staff Image', 'basis' ),
'set_featured_image'    => __( 'Set staff image', 'basis' ),
'remove_featured_image' => __( 'Remove staff image', 'basis' ),
'use_featured_image'    => __( 'Use as staff image', 'basis' ),
'insert_into_item'      => __( 'Insert into staff', 'basis' ),
'uploaded_to_this_item' => __( 'Uploaded to this staff', 'basis' ),
'items_list'            => __( 'Staff list', 'basis' ),
'items_list_navigation' => __( 'Staff list navigation', 'basis' ),
'filter_items_list'     => __( 'Filter staff list', 'basis' ),
);
$args = array(
'label'                 => __( 'Staff', 'basis' ),
'description'           => __( 'A list of Staff', 'basis' ),
'labels'                => $labels,
'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
'taxonomies'            => [],
'hierarchical'          => true,
'public'                => true,
'show_ui'               => true,
'show_in_menu'          => true,
'menu_position'         => 5,
'menu_icon'             => 'dashicons-groups',
'show_in_admin_bar'     => true,
'show_in_nav_menus'     => true,
'can_export'            => true,
'has_archive'           => true,
'exclude_from_search'   => false,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'staff', $args );

}
add_action( 'init', 'register_staff', 0 );