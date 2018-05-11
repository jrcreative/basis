<?php

namespace App;

trait MediaGrid {

	private function media_grid_output($a = null)
	{
		return [
			'type' => 'mediagrid',
			'title' => $a['title'],
			'description' => $a['description'],
			'grid_type' => $a['grid_type'],
			'images' => $a['images'],
			'posts' => $a['posts'],
			'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'],
			'classes' => $a['add_classes'],
		];

	}
}