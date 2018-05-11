<?php

namespace App;

trait Hero
{
	private function hero_output($a = null)
	{
		return [
			'type' => 'hero',
			'heading' => show_block_heading($a['title'], $a['text_color'] . ' text-' . $a['text_alignment']),
			'description' => $a['description'],
			'buttons' => $a['call_to_action'],
			'alignment_class' => $a['text_alignment'],
			'text_color' => $a['text_color'],
			'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'],
			'classes' => $a['add_classes'],
		];
	}
}