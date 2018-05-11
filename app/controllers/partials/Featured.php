<?php

namespace App;

trait Featured
{

	private function get_feature_data($post) {

		if(is_array($post)) return array_map(function($a) {
			return [
				'ID' => $a->ID,
				'title' => $a->post_title,
				'content' => $a->post_content,
				'excerpt' => $a->post_excerpt,
			];
		}, $post);

		return [
			'ID' => $post->ID,
			'title' => $post->post_title,
			'content' => $post->post_content,
			'excerpt' => $post->post_excerpt,
		];
	}

	private function featured_output($a = null)
	{
		return [
			'type' => 'featured',
			'heading' => show_block_heading($a['section_heading'], $a['text_color'] . ' text-' . $a['heading_alignment']),
			'title' => show_block_title($a['section_title'], $a['text_color'] . ' text-' . $a['heading_alignment']),
			'reverse' => $a['layout'] === 'right' ? true : false,
			'primary' => $this->get_feature_data($a['primary']),
			'secondary' => $this->get_feature_data($a['secondary']),
			'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'],
			'classes' => $a['add_classes'],
		];

	}
}