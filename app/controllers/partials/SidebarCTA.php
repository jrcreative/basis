<?php

namespace App;

trait SidebarCTA
{
	private function showButtonLink($post_id, $text = 'Learn More') {
		return '<a class="btn" href="'.get_permalink($post_id).'">' . $text . '</a>';
	}


	private function sidebar_CTA_output($a = null) {
		return [
			'type' => 'sidebarCTA',
			'post_id' => $a['link']->ID,
			'title' => $a['title'],
			'image' => has_post_thumbnail() ? get_the_post_thumbnail($a['link']->ID, 'medium', ['class' => 'img-fluid']) : null,
			'description' => $a['description'],
			'button' => $this->showButtonLink($a['link']->ID, $a['button_text']),
		];
	}
}

