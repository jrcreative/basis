<?php

//include( 'cpts/staff.php' );
include( 'cpts/project.php' );

include( 'widget/MuamCurrentIssueWidget.php');

/**
 * Register our Widgets
 */
//add_action( 'widgets_init', function() {
//	register_widget( 'MuamCurrentIssueWidget' );
//});

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('sage/librefranklin', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700', false, null);
	wp_enqueue_script('sage/webfonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', null, true);
}, 100);

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( [ 'page_title' => __( "Theme Options", 'basis' ) ] );
}

add_filter( 'acf/load_field/name=background_color', 'select_background_color_options' );

function select_background_color_options( $field ) {
	$field['choices'] = [
		'none'      => 'None',
		'brand'     => 'Basis',
		'orange'    => 'Orange',
		'green'     => 'Green',
		'dark-blue' => 'Dark Blue',
		'white'     => 'White',
		'dark'      => 'Dark',
		'light'     => 'Light',
	];

	return $field;
}

add_post_type_support( 'page', 'excerpt' );

/**
 * @param $field
 *
 * @return mixed
 */
function select_form_options( $field ) {
	$forms = RGFormsModel::get_forms( null, 'title' );

	$output = [];
	foreach ( $forms as $form ) {
		$output[ $form->id ] = $form->title;
	}

	$field['choices'] = $output;

	return $field;
}

if ( class_exists( 'GFForms' ) ) {
	add_filter( 'acf/load_field/name=select_a_form', 'select_form_options' );
}

add_filter( 'get_the_archive_title', function ( $title ) {
	$title = '';

	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_search() ) {
		$title = 'Search';
	} elseif ( is_404() ) {
		$title = '';
	}

	return $title;
} );

/**
 * Style Gravity forms with Bootstrap CSS
 */
add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );
function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
	$id       = $field->id;
	$field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";

	return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
}

/**
 * Enable option to hide form input label
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/**
 * Helper Functions
 */

/**
 *
 * Get either the url, or an array of image data
 *
 * @param mixed $img attachment id or object
 * @param string $size
 *
 * @TODO Make the output a consistent array
 *
 * @return mixed
 */
function get_image( $img, $size = 'full' ) {
	if ( ! $img ) {
		return;
	}

	if ( is_int( $img ) ) {
		return wp_get_attachment_image_src( $img, $size )[0];
	}

	return [
		'url'     => $size === 'full' ? $img['url'] : $img['sizes'][ $size ],
		'lqip' => $img['sizes']['lqip'] ?? '',
		'alt'     => $img['alt'] ?? '',
		'caption' => $img['caption'] ?? '',
		'height' => $size === 'full' ? $img['height'] : $img['sizes'][$size . '-height'] ?? '',
		'width' => $size === 'full' ? $img['width'] :  $img['sizes'][$size . '-width'] ?? '',
	];
}

/**
 *
 * Format section titles for consistent output
 *
 * @param $title
 * @param $classes
 *
 * @return string
 */
function show_block_heading( $title, $classes = '' ) {
	return $title ? "<h2 class='section-heading $classes'>$title</h2>" : '';
}

/**
 *
 * Format section titles for consistent output
 *
 * @param $title
 * @param $classes
 *
 * @return string
 */
function show_block_title( $title, $classes = '' ) {
	return $title ? "<h3 class='section-title $classes'>$title</h3>" : '';
}

/**
 *
 * format the color for use as a css class
 *
 * @param null $color
 *
 * @return string
 */
function get_color( $color = null ) {
	return $color ? 'bg-' . $color : 'bg-None';
}

/**
 *
 * Format the WordPress Gallery and add Bootstrap Grid support
 *
 */
function basis_gallery( $output = '', $atts, $instance ) {
	if ( empty( $atts ) ) {
		return $output;
	}

	$columns = $atts['columns'];

	if ( strlen( $atts['columns'] ) < 1 || ! isset( $atts['columns'] ) || $columns > 12 ) {
		$columns = 3;
	}

	$col_class = 'col-sm-' . floor( 12 / $columns ); // floor(): not a great way to handle 5 columns, but good enough for now

	$return = '<div class="row gallery">';

	$image_ids = explode( ',', $atts['ids'] );
	foreach ( $image_ids as $key => $image_id ) {
		$image_url = get_image( (int) $image_id, $atts['size'] );
		$caption   = get_post( (int) $image_id );
		$return    .= '
            <div class="' . $col_class . '">
                <div class="gallery-image-wrap">
                    <a data-featherlight="' . $image_url . '" data-gallery="gallery" href="#">
                        <img src="' . $image_url . '" alt="" class="img-fluid">
                        <p class="wp-caption caption">' . $caption->post_excerpt . '</p>
                    </a>
                </div>
            </div>';
	}
	$return .= '</div>';
	return $return;
}

add_filter( 'post_gallery', 'basis_gallery', 99, 3 );

add_image_size( 'basis-admin-post-featured-image', 50, 50, true );

add_filter( 'manage_posts_columns', 'basis_add_post_admin_thumbnail_column', 2 );
add_filter( 'manage_pages_columns', 'basis_add_post_admin_thumbnail_column', 2 );

function basis_add_post_admin_thumbnail_column( $columns ) {
	return ['featured' => 'Featured Image']+$columns;
}

add_action( 'manage_posts_custom_column', 'basis_show_post_thumbnail_column', 5, 2 );
add_action( 'manage_pages_custom_column', 'basis_show_post_thumbnail_column', 5, 2 );

function basis_show_post_thumbnail_column( $columns, $id ) {
	switch ( $columns ) {
		case 'featured':
			if ( function_exists( 'the_post_thumbnail' ) ) {
				the_post_thumbnail( 'basis-admin-post-featured-image' );
			} else {
				echo 'not found';
			}
			break;
	}
}

add_action('admin_head', 'basis_column_width');

function basis_column_width() {
	echo '<style type="text/css">';
	echo '.column-featured { text-align: center; width:110px; overflow:hidden }';
	echo '</style>';
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'basis_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'basis_wrapper_end', 10);

function basis_wrapper_start() {
	echo '<main id="main">';
}

function basis_wrapper_end() {
	echo '</main>';
}


// Customize ACF - move to basis builder plugin

function acf_apply_metabox_title($field_groups) {

	foreach ( $field_groups as $k => $field_group ) {
		if ( isset($field_group['metabox_title']) && !empty($field_group['metabox_title']) ) {
			$field_groups[$k]['title'] = $field_group['metabox_title'];
		}
	}

	return $field_groups;
}
//add_filter('acf/get_field_groups', 'acf_apply_metabox_title');
