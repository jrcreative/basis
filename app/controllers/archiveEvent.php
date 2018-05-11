<?php

namespace App;

use Sober\Controller\Controller;
use WP_Query;

class archiveEvent extends Controller
{
    use PageHeader;

    private $page_id = '';

    public function __construct()
    {
        $this->page_id = get_option( 'page_for_posts' );
    }

    public function pageHeader()
    {
        $page_header = [
            'title' => __('Resources', 'komprise'),
            'subtitle' => '',
            'description' => '',
            'background_image' => get_field('background_image', $this->page_id),
            'background_color' => get_field('background_color', $this->page_id),
	        'text_color' => get_field('text_color', $this->page_id),
        ];

        return $this->page_header_output($page_header);
    }

    public function eventStickyQuery()
    {
		return new WP_Query([
			'post_type' => ['resource'],
			'meta_key' => 'featured_post',
			'meta_value' => true,
			'posts_per_page' => 3,
		]);
    }

    public function eventMainQuery()
    {
    	return new WP_Query([
    		'post_type' => ['resource']
	    ]);
    }
}
