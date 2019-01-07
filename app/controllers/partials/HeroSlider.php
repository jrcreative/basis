<?php

namespace App;

trait HeroSlider {

	private function hero_slider_output($a = null)
	{

		return [
			'type' => 'heroSlider',
			'slides' => $a['slides'],
//			'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
//			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'],
			'classes' => $a['add_classes'],
		];
	}
}