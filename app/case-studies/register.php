<?php
function basis_register_case_studies() {
    register_post_type( 'case_study', [
            'labels' => [
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' )
            ],
            'public' => true,
            'has_archive' => false,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => ['title', 'editor', 'author', 'thumbnail']
        ]
    );
}
add_action( 'init', 'basis_register_case_studies' );
