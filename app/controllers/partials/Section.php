<?php

namespace App;

trait Section
{
    /**
     * @param $a
     * @return array
     */
    private function build_columns($a = null) {
    	$layout = '1_1';
	    if ($a['columns'] == 2) $layout = $a['two_column_layout'];
	    if ($a['columns'] == 3) $layout = $a['three_column_layout'];

	    switch ($a['columns']) {
            case '4':
                $columns[4] = [
                    'class' => $this->get_column_class($a['columns']),
                    'content' => $this->get_content($a['col_4'][$a['col_4']['content_type']], $a['col_4']['content_type']),
	                'content_type' => $a['col_4']['content_type']
                ];
            case '3':
                $columns[3] = [
                    'class' => $this->get_column_class($a['columns'], 3, $layout),
                    'content' => isset($a['col_3']['content_type']) ? $this->get_content($a['col_3'][$a['col_3']['content_type']], $a['col_3']['content_type']) : '',
                    'content_type' => $a['col_3']['content_type']
                ];
            case '2':
                $columns[2] = [
                    'class' => $this->get_column_class($a['columns'], 2, $layout),
                    'content' => $this->get_content($a['col_2'][$a['col_2']['content_type']], $a['col_2']['content_type']),
                    'content_type' => $a['col_2']['content_type']
                ];
            default:
                $columns[1] = [
                    'class' => $this->get_column_class($a['columns'], 1, $layout),
                    'content' => $this->get_content($a['col_1'][$a['col_1']['content_type']], $a['col_1']['content_type']),
                    'content_type' => $a['col_1']['content_type']
                ];
        };
        return array_reverse($columns);
    }

    private function get_content($content, $content_type) {
		switch ($content_type) {
			case 'text':
				return $content;
				break;
			case 'image':
				$image_size = is_array($content['image_size'] ) ? current($content['image_size']) : $content['image_size'];

				return [
					'image' => get_image($content['image'], $image_size),
					'overflow' => $content['image_overflow'] === 'none' ? false : $content['image_overflow'],
				];
				break;
			case 'card':
				return [
					'image' => get_image($content['image']),
					'image_fills_background' => $content['image_fills_background'],
					'title' => $content['title'],
					'text' => $content['text'],
					'link' => $content['link'],
					'link_text' => $content['link_text'],
				];
				break;
			case 'video':
				return [
					'source' => $this->format_video($content['video_source'], $content['url'], $content['embed'], $content['poster_frame']['url']),
					'url' => $content['url'] ?? '',
					'poster_frame' => get_image($content['poster_frame']) ?? '',
					'link_text' => $content['link_text'] ?? ''
				];
				break;
			case 'form':
				return $content;
				break;
			default:
				return "No Content Found";
		}

    }

    private function get_column_class(
        $num_cols,
        $col = '',
        $layout = '1_1'
    ) {

        if ($num_cols == 1) return 'col-md-10 offset-md-1';

	    if ($num_cols == 2) {
		    switch ( $layout ) {
			    case ('1_2'):
				    $column_class = $col == 1 ? 'col-md-4' : 'col-md-8';
				    break;
			    case ('2_1'):
				    $column_class = $col == 1 ? 'col-md-8' : 'col-md-4';
				    break;
			    default:
				    $column_class = 'col-md-6';
		    };
	    };

	    if ($num_cols == 3) {
	    	switch ($layout) {
			    case ('1_1_2'):
				    $column_class = $col == 3 ? 'col-md-6' : 'col-md-3';
				    break;
			    case ('2_1_1'):
				    $column_class = $col == 1 ? 'col-md-6' : 'col-md-3';
				    break;
			    case ('1_2_1'):
				    $column_class = $col == 2 ? 'col-md-6' : 'col-md-3';
				    break;
			    default:
				    $column_class = 'col-md-4';
		    }
	    }

	    if ($num_cols == 4) return 'col-md-3';

        return $column_class;
    }

    private function format_video($source, $link = '', $embed = '', $poster = '')
    {
    	if($source == 'link') {
    		return '<video class="embed-responsive embed-responsive-16by9"
                            playsinline
                            controls
                            poster="'. $poster . '"
                            src="' . $link . '"></video>';
	    } elseif($source == 'embed') {
    		return $embed;
	    };
    }

    /**
     * @param $a
     * @return array
     */
    private function section_output($a = null) {
        return [
            'type' => 'section',
            'heading' => show_block_heading($a['section_heading'], $a['text_color'] . ' text-' . $a['heading_alignment']),
	        'title' => show_block_title($a['section_title'], $a['text_color'] . ' text-' . $a['heading_alignment']),
            'bg-color' => get_color($a['background_color']['value']),
            'color' => isset($a['text_color']) ? $a['text_color'] : null,
            'class' => isset($a['add_classes']) ? $a['add_classes'] : null,
            'bg-image' => get_image($a['background_image']),
            'bg-video' => $a['background_video'],
            'cols' => $this->build_columns($a),
        ];
    }
}