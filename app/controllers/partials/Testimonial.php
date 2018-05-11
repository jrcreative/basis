<?php

namespace App;

use WP_Query;

trait Testimonial
{
    private function get_testimonials($term = null, $limit = '0')
    {

        $args = array(
            'post_type'       => array( 'testimonial' ),
            'post_status'     => array( 'publish' ),
            'posts_per_page'  => $limit,
            'orderby'         => 'rand',
            'fields'          => 'ids',
        );

        $tax_query = $term ? [
            'tax_query' => array(
                array(
                    'taxonomy' => 'topic',
                    'field'    => 'term_id',
                    'terms'    => $term,
                ),
            ),
        ] : [];

        $query = $term ? new WP_Query($args + $tax_query) : new WP_Query($args);

        return array_map( function ($post) {
            return [
                'image' => $this->get_testimonial_image($post),
                'quote' => $this->get_testimonial_quote($post)
                ];
        }, $query->posts);
    }

    private function get_testimonial_image($post_id)
    {
        return get_the_post_thumbnail($post_id, 'medium');
    }

    private function get_testimonial_quote($post_id) {
        return  '<blockquote class="blockquote">'.get_field('quote', $post_id).'<footer class="blockquote-footer"><cite>'.get_field('cite', $post_id). '<br>' .get_field('description', $post_id).'</cite></footer></blockquote>';
    }

    private function testimonial_output($a = null)
    {
    	return [
            'type' => 'testimonial',
            'testimonials' => $this->get_testimonials($a['testimonial_topic'], $a['limit']),
		    'title' => show_block_title($a['section_heading'], $a['text_color'] . ' align' . $a['heading_alignment']),
		    'text_color' => $a['text_color'],
            'background_image' => get_image($a['background_image']),
            'background_color' => get_color($a['background_color']['value']),
            'background_video' => $a['background_video'],
            'classes' => $a['add_classes'] . $a['background_video'] ? ' bg-video' : '',
	    ];
    }
}