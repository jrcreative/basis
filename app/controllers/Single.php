<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
    use PostGrid;

	private $blogIndexId = '';

    public function __construct()
    {
        $this->blogIndexId = get_option("page_for_posts", true);
    }

    public function singleNavBg()
    {
        $page_header = [
            'image' => get_the_post_thumbnail_url($this->blogIndexId, 'full'),
        ];

        return $page_header;
    }

	public function PostGrid() {
		return $this->post_grid_output( get_field('related_articles'));
	}

	public function sidebar_cta() {
		$sidebarCTA = get_field('sidebar_cta')['button_text'] ? get_field('sidebar_cta') : get_field('sidebar_cta', 'options');

		if(!is_array($sidebarCTA)) return;

		return $this->sidebar_CTA_output($sidebarCTA);
	}
}
