<?php

namespace App;

use Sober\Controller\Controller;
use WP_Query;

class archiveProject extends Controller
{
    use PageHeader;

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
}
