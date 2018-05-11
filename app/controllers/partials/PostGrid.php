<?php

namespace App;

use WP_Query;

trait PostGrid
{

	/**
	 * Return a list of posts via category, post selection or tag queries
	 *
	 * @param $type
	 * @param int $limit limit the number of posts to display
	 * @param array $category
	 * @param array $posts
	 * @param array $tags
	 *
	 * @return WP_Query
	 */
	private function get_posts($type, $limit = 3, $category = [], $posts = [], $tags = [])
    {
        if ($type === 'category') {
	        return new WP_Query([
			        'post_type' => ['post'],
			        'cat' => $category,
			        'ignore_sticky_posts' => true,
			        'posts_per_page' => $limit,
		        ]
	        );
        } elseif ($type === 'post_list') {
	        return new WP_Query([
	        	    'post_type' =>  ['page', 'post', 'resource'],
			        'post__in'            => $posts,
			        'ignore_sticky_posts' => true,
		            'orderby' => 'post__in'
		        ]
	        );
        } elseif ($type === 'tag') {
            return new WP_Query([
            	    'post_type' => ['post', 'resource'],
	                'tag__in'            => $tags,
	                'ignore_sticky_posts' => true,
	                'posts_per_page' => $limit,
	            ]
            );
        } else {
	        return new WP_Query([
			        'post_type' => ['post'],
			        'posts_per_page' => $limit,
			        'ignore_sticky_posts' => true,
		        ]
	        );
        }
    }

    private function post_grid_output($a = null)
    {
//    	var_dump($a); die();

    	$heading = $a['feed_type'] === 'recent' ? __("Recent Articles") : __("Related Articles");

	    /**
	     * @TODO rewrite $this->get_posts() to accept only 3 arguments. Make feed type the same name as the option so it can be called like $a[$a['feed_type']
	     */

    	return [
            'type' => 'postGrid',
            'heading' => isset($a['section_heading']) && $a['section_heading'] !== '' ? show_block_heading($a['section_heading'], $a['text_color'] . ' text-' . $a['heading_alignment']) : $heading,
            'title' => show_block_title($a['section_title'], $a['text_color'] . ' text-' . $a['heading_alignment']),
		    'color' => $a['text_color'],
            'query' => $this->get_posts($a['feed_type'], $a['posts_limit'], $a['category'] ?? '', $a['post_list'] ?? '', $a['tag'] ?? ''),
            'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'],
			'classes' => $a['add_classes'],
        ];
    }
}
