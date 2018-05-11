<?php

namespace App;

trait CtaBar
{
	private function showButtonLink($button_text, $button_link) {
		return '<a class="btn btn-white" href="'.$button_link.'">'.$button_text.'</a>';
	}

	private function cta_bar_output($a = null) {
		return [
			'type' => 'ctaBar',
			'text' => $a['text'],
			'button' => $this->showButtonLink($a['button_text'], $a['button_link']),
			'text_color' => $a['text_color'] ?? '',
			'background_image' => $a['background_image'] !== '' ? get_image($a['background_image']) : null,
			'background_color' => get_color($a['background_color']['value']),
			'background_video' => $a['background_video'] ?? '',
			'classes' => $a['add_classes'],
		];
	}
}