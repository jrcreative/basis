<?php

namespace App;

use Sober\Controller\Controller;

class Page extends Controller
{
    use Section, Hero, PageHeader, PostGrid, MediaGrid, Divider;

    /**
     *
     * @return string url of featured image
     */
    public function featured_image($size = 'large')
    {
        if (has_post_thumbnail()) {
            return get_the_post_thumbnail_url($size, ['class' => 'img-fluid']);
        }
    }


    public function page_header()
    {
	    $page_header = get_field('page_header');

	    if ( !isset($page_header) || !is_array($page_header) ) return;

	    return $this->page_header_output($page_header);
    }

    /**
     * @return array of Content Blocks
     */
    public function content_blocks()
    {
        $content_blocks = get_field('content_blocks');
	    if ( !isset($content_blocks) || !isset($content_blocks['cb']) || !is_array($content_blocks['cb']) ) return;

        return array_map(function($a) {
            $layout = $a['acf_fc_layout'] . '_output';
            return $this->$layout($a);
        }, $content_blocks['cb']);
    }

}
