<?php
namespace App\ACF;

use StoutLogic\AcfBuilder\FieldsBuilder;
use StoutLogic\AcfBuilder\FlexibleContentBuilder;

class PageBuilder
{
    protected $layouts = [];
    protected $fields = [];
    protected $colors = [
        "dark" => "Black",
        "light" => "White",
        "primary" => "Sand",
        "secondary" => "Light Grey",
        "info" => "Light Blue",
        "success" => "Green",
        "warning" => "Yellow",
        "danger" => "Red",
    ];

    public function __construct()
    {
        $this->layouts();
        $this->fields();
    }

    protected function add_layouts(FlexibleContentBuilder $builder, $condition_value = null, $condition_field = 'Columns', $condition_compare = '>')
    {
        if($condition_value)
        {
            $builder->conditional($condition_field, $condition_compare, $condition_value);
        }
        foreach($this->layouts as $layout)
        {
            // @TODO probably want to have sort of filter here
            $builder->addLayout($layout);
        }
        return $builder->endFlexibleContent();
    }

    protected function add_tabs($builder, $headings = true, $design = true, $advanced = true)
    {
        if($headings)
        {
            $builder->addTab('Headings')
                ->addText('Heading')
                ->addText('Subheading');
        }
        if($design)
        {
            $builder
                ->addTab('Design')
                ->addTrueFalse('Full Width')->setWidth(50)
                ->addText('Max Width')->setWidth(50)
                ->addField('Text Alignment', 'button_group', [
                    'choices' => [
                        "left" => "<span class=\"dashicons dashicons-editor-alignleft\"></span>",
                        "center" => "<span class=\"dashicons dashicons-editor-aligncenter\"></span>",
                        "right" => "<span class=\"dashicons dashicons-editor-alignright\"></span>",
                    ]
                ])->setWidth('50')
                ->addSelect('Text Color', [
                    'choices' => ['default' => 'Default'] + $this->colors,
                ])->setWidth('50')
                ->addImage('Background Image')->setWidth('50')
                ->addSelect('Background Color', [
                    'choices' => ['default' => 'Default'] + $this->colors,
                ])->setWidth('50')
//                ->addRadio('Background Video', [
//                    'choices' => ['link', 'embed']
//                ])->setWidth('50')
//                ->addUrl('Background Video Url')->setWidth('50')->conditional('Background Video', '==', 'link')
//                ->addOembed('Background Video Embed')->setWidth('50')->conditional('Background Video', '==', 'embed')
                ;
        }
        if($advanced)
        {
            $builder
                ->addTab('Advanced')
//                ->addText('Admin Label')
                ->addText('ID')->setWidth('50')
                ->addText('Class(es)')->setWidth('50');
        }

        return $builder;
    }

    protected function layouts()
    {
        $this->layouts['text'] = new FieldsBuilder('text', ['label' => 'Text']);
        $this->layouts['text']
            ->addTab('Text')
            ->addWysiwyg('Content')
            ->addRepeater('Call To Action')
            ->addLink('Button')->setWidth('75')
            ->addSelect('Button Style', [
                'choices' => $this->colors,
            ])->setDefaultValue('dark')->setWidth('25')
            ->endRepeater()
        ;
        $this->layouts['text'] = $this->add_tabs($this->layouts['text']);

        $this->layouts['title'] = new FieldsBuilder('title', ['label' => 'Title']);
        $this->layouts['title']
            ->addTab('Text')
            ->addText('Title')
            ->addTrueFalse('Small and Centered')
        ;
        $this->layouts['title'] = $this->add_tabs($this->layouts['title'], false, false, true);

        $this->layouts['hero-text'] = new FieldsBuilder('hero-text', ['label' => 'Hero Text']);
        $this->layouts['hero-text']
            ->addTab('Text')
            ->addText('Small Heading')
            ->addText('Heading')
            ->addWysiwyg('Content')
        ;
        $this->layouts['hero-text'] = $this->add_tabs($this->layouts['hero-text'], false, false);

        $this->layouts['image'] = new FieldsBuilder('image', ['label' => 'Image']);
        $this->layouts['image']
            ->addTab('Image')
            ->addImage('Image')
        ;
        $this->layouts['image'] = $this->add_tabs($this->layouts['image'], false, false);


        $this->layouts['gallery'] = new FieldsBuilder('gallery', ['label' => 'Gallery']);
        $this->layouts['gallery']
            ->addTab('Gallery')
            ->addRepeater('Images')
            ->addImage('Image')
            ->endRepeater()
        ;
        $this->layouts['gallery'] = $this->add_tabs($this->layouts['gallery'], true, false);

        $this->layouts['divider'] = new FieldsBuilder('Divider');
        $this->layouts['divider']
            ->addTab('Divider')
            ->addMessage('Divider', 'Divider')
        ;
        $this->layouts['divider'] = $this->add_tabs($this->layouts['divider'], false);

        $this->layouts['hero'] = new FieldsBuilder('hero', ['label' => 'Hero']);
        $this->layouts['hero']
            ->addTab('Hero')
            ->addImage('Background')
            ->addText('Heading')->setWidth('50')
            ->addText('Hashtag')->setWidth('50')
            ->addRepeater('Call To Action')
            ->addLink('Button')->setWidth('75')
            ->addSelect('Button Style', [
                'choices' => $this->colors,
            ])->setDefaultValue('light')->setWidth('25')
            ->endRepeater()
        ;
        $this->layouts['hero'] = $this->add_tabs($this->layouts['hero'], false, false);

        $this->layouts['slider'] = new FieldsBuilder('Slider');
        $this->layouts['slider']
            ->addTab('Slider')
            ->addRepeater('Slides')
            ->addImage('Slide')
            ->endRepeater()
        ;
        $this->layouts['slider'] = $this->add_tabs($this->layouts['slider'], false, false);

        $this->layouts['core-team'] = new FieldsBuilder('core-team', ['label' => 'Core Team']);
        $this->layouts['core-team']
            ->addTab('team')
            ->addRepeater('Members', ['layout' => 'block'])
            ->addImage('Profile')
            ->addText('Name')->setWidth('50')
            ->addText('Position')->setWidth('50')
            ->addUrl('Linkedin')->setWidth('25')
            ->addUrl('Instagram')->setWidth('25')
            ->addUrl('Dribble')->setWidth('25')
            ->addUrl('Twitter')->setWidth('25')
            ->endRepeater()
            ->addRepeater('Quotes')
            ->addWysiwyg('Quote')
            ->addText('Author')
            ->endRepeater()
        ;
        $this->layouts['core-team'] = $this->add_tabs($this->layouts['core-team'], true, false);

        $this->layouts['extended-team'] = new FieldsBuilder('extended-team', ['label' => 'Extended Team']);
        $this->layouts['extended-team']
            ->addTab('team')
            ->addRepeater('Members', ['layout' => 'block'])
            ->addImage('Profile')->setWidth('50')
            ->addWysiwyg('Bio')->setWidth('50')
            ->addText('Name')->setWidth('50')
            ->addText('Position')->setWidth('50')
            ->addUrl('Linkedin')->setWidth('25')
            ->addUrl('Instagram')->setWidth('25')
            ->addUrl('Dribble')->setWidth('25')
            ->addUrl('Twitter')->setWidth('25')
            ->endRepeater()
        ;
        $this->layouts['extended-team'] = $this->add_tabs($this->layouts['extended-team']);

        $this->layouts['button'] = new FieldsBuilder('Button');
        $this->layouts['button']
            ->addTab('Button')
            ->addRepeater('Buttons')
            ->addLink('Button')->setWidth('75')
            ->addSelect('Button Style', [
                'choices' => $this->colors,
            ])->setDefaultValue('dark')->setWidth('25')
            ->endRepeater()
        ;
        $this->layouts['button'] = $this->add_tabs($this->layouts['button'], false, false);

        $this->layouts['post_grid'] = new FieldsBuilder('post-grid', ['label' => 'Post Grid']);
        $this->layouts['post_grid']
            ->addTab('Post Grid')
            ->addField('Feed Type', 'button_group', [
                'choices' => [
//                    "recent" => "Recent",
//                    "category" => "Category",
//                    "tag" => "Tag",
                    "post_list" => "User Specified",
                ]])->setWidth('50')
            ->addNumber('Number of Post', [
                "min" => 3,
                "max" => 100,
                "step" => 3,
            ])->setWidth('25')
            ->addTrueFalse('Large First Post')->setWidth('25')
            ->addTaxonomy('Article Category', ["taxonomy" => "category"])
            ->conditional('Feed Type', '==', 'category')
            ->addPostObject('User Specified', [
                "post_type" => [
                    "post",
                    "page",
                    "testimonial",
                    "resource"
                ],
                'multiple' => true
            ])
            ->conditional('Feed Type', '==', 'post_list')
            ->addTaxonomy('Tag', ["taxonomy" => "post_tag"])
            ->conditional('Feed Type', '==', 'tag')
        ;
        $this->layouts['post_grid'] = $this->add_tabs($this->layouts['post_grid'], false, false);

        $this->layouts['case_grid'] = new FieldsBuilder('case-studies-grid', ['label' => 'Case Studies Grid']);
        $this->layouts['case_grid']
            ->addTab('Case Studies')
            ->addNumber('How many')
            ->addSelect('Small Columns', [
                'choices' => [
                        'col-sm-12' => '1',
                        'col-sm-6' => '2',
                        'col-sm-4' => '3',
                        'col-sm-3' => '4',
                        'col-sm-2' => '6',
                        'col-sm-1' => '12',
                ]
            ])->setWidth('33')
            ->addSelect('Medium Columns', [
                'choices' => [
                    'col-md-12' => '1',
                    'col-md-6' => '2',
                    'col-md-4' => '3',
                    'col-md-3' => '4',
                    'col-md-2' => '6',
                    'col-md-1' => '12',
                ]
            ])->setWidth('33')
            ->addSelect('Large Columns', [
                'choices' => [
                    'col-lg-12' => '1',
                    'col-lg-6' => '2',
                    'col-lg-4' => '3',
                    'col-lg-3' => '4',
                    'col-lg-2' => '6',
                    'col-lg-1' => '12',
                ]
            ])->setWidth('34')
        ;
        $this->layouts['case_grid'] = $this->add_tabs($this->layouts['case_grid'], true, false, true);

        ksort($this->layouts);
    }

    protected function fields()
    {
        $this->fields['footer'] = new FieldsBuilder('FOOTER OPTIONS');
        $this->fields['footer']
            ->setLocation('post_type', '==', 'page')
            ->setGroupConfig('hide_on_screen', [
                'the_content',
                'comments'
            ])
            ->setGroupConfig('position', 'side')
        ;
        $this->fields['footer']
            ->addTrueFalse('isFooter1Hidden', ['label' => 'Hide Footer 1'])
            ->addTrueFalse('isFooter2Hidden', ['label' => 'Hide Footer 2'])
        ;

        $this->fields['section'] = new FieldsBuilder('PAGE BUILDER');
        $section = $this->fields['section']
            ->setLocation('post_type', '==', 'page')
            ->setGroupConfig('hide_on_screen', [
                'the_content',
                'comments'
            ])
            ->addRepeater('Section', ['layout' => 'block'])
            ->addTab('Content')
            ->addField('Columns', 'range', [
                'wrapper' => ['class' => 'column-types'],
                "default_value" => 10,
                "min" => 10,
                "max" => 90,
                "step" => 10,
                "id" => 'acf-field_section_columns',
            ]);
        $section = $this->add_layouts($section->addFlexibleContent('Column 1', [
            'wrapper' => ['class' =>'admin-section-column-1 col'],
            'button_label' => 'Add Block',
        ]));
        $section = $this->add_layouts($section->addFlexibleContent('Column 2', [
            'wrapper' => ['class' =>'admin-section-column-2 col'],
            'button_label' => 'Add Block',
        ]), '19');
        $section = $this->add_layouts($section->addFlexibleContent('Column 3', [
            'wrapper' => ['class' =>'admin-section-column-3 col'],
            'button_label' => 'Add Block',
        ]), '49');
        $section = $this->add_layouts($section->addFlexibleContent('Column 4', [
            'wrapper' => ['class' =>'admin-section-column-4 col'],
            'button_label' => 'Add Block',
        ]), '89');
        $section->endRepeater();
        $this->add_tabs($section, false, true, true);
    }

    protected function filter_layouts()
    {
        foreach($this->layouts as $k=>$v)
        {
            $this->layouts[$k] = apply_filters('basis_acf_layout_'.$k, $this->layouts[$k]);
        }
        $this->layouts = apply_filters('basis_acf_layouts', $this->layouts);
    }

    protected function filter_fields()
    {
        foreach($this->fields as $k=>$v)
        {
            $this->fields[$k] = apply_filters('basis_acf_field_'.$k, $this->fields[$k]);
        }
        $this->fields = apply_filters('basis_acf_fields', $this->fields);
    }

    public function register()
    {
        $buiilder = $this;
        add_action('acf/init', function() use ($buiilder) {
            $buiilder->filter_layouts();
            $buiilder->filter_fields();
            foreach($buiilder->fields as $field) {
                acf_add_local_field_group($field->build());
            }
        });
    }
}
