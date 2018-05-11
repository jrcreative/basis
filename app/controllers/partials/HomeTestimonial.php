<?php

namespace App;

use WP_Query;

trait HomeTestimonial
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
                'quote' => $this->get_testimonial_quote($post)
                ];
        }, $query->posts);
    }

    private function get_testimonial_quote($post_id) {
        return  '<blockquote class="blockquote">'.get_field('quote', $post_id).'<footer class="blockquote-footer"><cite>'.get_field('cite', $post_id).'<br>'.get_field('description', $post_id).'</cite></footer></blockquote>';
    }

    private function testimonial_output($a = null)
    {
    	return [
            'type' => 'homeTestimonial',
		    'heading_block' => $a['heading_block'],
            'testimonials' => $this->get_testimonials($a['testimonial_topic'], $a['limit']),
	    ];
    }
}