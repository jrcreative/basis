<?php

namespace App;

use Sober\Controller\Controller;
use WP_Query;

class Index extends Controller
{
    use Hero, PageHeader, PostGrid;
    private $page_id = '';
    private $featured_posts = [];
    private $page_title = '';

    public function __construct()
    {
        $this->page_id = get_option( 'page_for_posts' );
        $this->featured_posts = $this->getFeaturedPosts();
        $this->page_title = get_the_archive_title();
    }

    public function page_header()
    {
	    $page_header = get_fields($this->page_id)['page_header'];
	    $page_header['subtitle'] = $this->page_title !== '' ? $this->page_title  : get_fields($this->page_id)['page_header']['subtitle'];

        return $this->page_header_output($page_header);
    }

    private function getFeaturedPosts() {
    	return new WP_Query([
		    'meta_key' => 'featured_post',
		    'meta_value' => true,
		    'fields' => 'ids',
		    'posts_per_page' => 1,
	    ]);
    }

    public function stickyQuery()
    {
		return new WP_Query([
			'post__in' => $this->featured_posts->posts,
			'ignore_sticky_posts' => true,
			'posts_per_page' => 1,
		]);
    }

    public function mainQuery()
    {
	    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    	return new WP_Query([
    		'post__not_in' => $this->featured_posts->posts,
		    'paged'         => $paged,
	    ]);
    }

    public function blogHero() {
    	return $this->hero_output(get_fields($this->page_id)['hero']);
    }
}
