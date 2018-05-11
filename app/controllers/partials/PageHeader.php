<?php

namespace App;

trait PageHeader
{
    private function page_header_output($a = null)
    {
    	$text_alignment = $a['text_alignment'] ?? 'center';

    	return [
            'type' => 'pageHeader',
            'heading' => show_block_heading($a['title'], $a['text_color'] . ' text-' . $text_alignment),
            'description' => $a['description'] ?? '',
		    'buttons' => $a['call_to_action'] ?? '',
            'alignment_class' => $a['text_alignment'] ?? 'center',
            'text_color' => $a['text_color'] ?? '',
            'background_image' => isset($a['background_image']) ? get_image($a['background_image']) : '',
		    'background_color' => isset($a['background_color']['value']) ? get_color($a['background_color']['value']) : '',
		    'background_video' => $a['background_video'] ?? '',
		    'classes' => $a['add_classes'] ?? '',
        ];
    }
}