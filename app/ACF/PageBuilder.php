<?php
namespace App\ACF;

use StoutLogic\AcfBuilder\FieldsBuilder;
use StoutLogic\AcfBuilder\FlexibleContentBuilder;

class PageBuilder
{
    protected $layouts = [];
    protected $fields = [];

    public function __construct()
    {
        $this->layouts();
        $this->filter_layouts();
        $this->fields();
        $this->filter_fields();
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

    protected function add_tabs(FieldsBuilder $builder, $headings = true, $design = true, $advanced = true)
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
                ->addField('Text Alignment', 'button_group', [
                    'choices' => [
                        "left" => "<span class=\"dashicons dashicons-editor-alignleft\"></span>",
                        "center" => "<span class=\"dashicons dashicons-editor-aligncenter\"></span>",
                        "right" => "<span class=\"dashicons dashicons-editor-alignright\"></span>",
                    ]
                ])->setWidth('50')
                ->addField('Text Color', 'button_group', [
                    'choices' => [
                        "light" => "Light",
                        "dark" => "Dark"
                    ]
                ])->setWidth('50')
                ->addColorPicker('Background Color')
                ->addImage('Large Background Image')->setWidth('50')
                ->addImage('Small Background Image')->setWidth('50')
                ->addRadio('Background Video', [
                    'choices' => ['link', 'embed']
                ])->setWidth('50')
                ->addUrl('Background Video Url')->setWidth('50')->conditional('Background Video', '==', 'link')
                ->addOembed('Background Video Embed')->setWidth('50')->conditional('Background Video', '==', 'embed');
        }
        if($advanced)
        {
            $builder
                ->addTab('Advanced')
                ->addText('Admin Label')
                ->addText('ID')->setWidth('50')
                ->addText('Class(es)')->setWidth('50');
        }

        return $builder;
    }

    protected function layouts()
    {
        $this->layouts['text'] = new FieldsBuilder('Text');
        $this->layouts['text']
            ->addTab('Text')
            ->addWysiwyg('Content')
        ;
        $this->layouts['text'] = $this->add_tabs($this->layouts['text']);

        $this->layouts['divider'] = new FieldsBuilder('Divider');
        $this->layouts['divider']
            ->addTab('Divider')
            ->addMessage('Divider', 'Divider')
        ;
        $this->layouts['divider'] = $this->add_tabs($this->layouts['divider'], false, true, true);

        $this->layouts['hero'] = new FieldsBuilder('Hero');
        $this->layouts['hero']
            ->addTab('Hero')
            ->addWysiwyg('Description')
            ->addRepeater('Call To Action')
            ->addText('Button Text')->setWidth('33')
            ->addUrl('Button Link')->setWidth('33')
            ->addSelect('Button Style', [
                'choices' => ['primary', 'secondary', 'warniing', 'alert']
            ])->setWidth('33')
            ->endRepeater()
        ;
        $this->layouts['hero'] = $this->add_tabs($this->layouts['hero']);

        $this->layouts['slider'] = new FieldsBuilder('Slider');
        $this->layouts['slider']
            ->addTab('Slider')
            ->addRepeater('Slides', ['layout' => 'block'])
            ->addWysiwyg('Description')->setWidth('50')
            ->addImage('Background')->setWidth('50')
            ->addRepeater('Call To Action')->setWidth('100')
            ->addText('Button Text')->setWidth('33')
            ->addUrl('Button Link')->setWidth('33')
            ->addSelect('Button Style', [
                'choices' => ['primary', 'secondary', 'warniing', 'alert']
            ])->setWidth('33')
            ->endRepeater()
            ->endRepeater()
        ;
        $this->layouts['slider'] = $this->add_tabs($this->layouts['slider'], false, false);

        $this->layouts['button'] = new FieldsBuilder('Button');
        $this->layouts['button']
            ->addTab('Button')
            ->addText('Button Text')->setWidth('33')
            ->addUrl('Button Link')->setWidth('33')
            ->addSelect('Button Style', [
                'choices' => ['primary', 'secondary', 'warniing', 'alert']
            ])->setWidth('33')
        ;
        $this->layouts['button'] = $this->add_tabs($this->layouts['button'], false, false);

        $this->layouts['post_grid'] = new FieldsBuilder('Post Grid');
        $this->layouts['post_grid']
            ->addTab('Post Grid')
            ->addField('Feed Type', 'button_group', [
                'choices' => [
                    "recent" => "Recent",
                    "category" => "Category",
                    "tag" => "Tag",
                    "post_list" => "User Specified",
                ]])->setWidth('50')
            ->addNumber('Number of Post', [
                "min" => 3,
                "max" => 100,
                "step" => 3,
            ])->setWidth('50')
            ->addTaxonomy('Article Category', ["taxonomy" => "category"])
            ->conditional('Feed Type', '==', 'category')
            ->addPostObject('User Specified', [
                "post_type" => [
                    "post",
                    "page",
                    "testimonial",
                    "resource"
                ]])
            ->conditional('Feed Type', '==', 'post_list')
            ->addTaxonomy('Tag', ["taxonomy" => "post_tag"])
            ->conditional('Feed Type', '==', 'tag')
        ;
        $this->layouts['post_grid'] = $this->add_tabs($this->layouts['post_grid']);
    }

    protected function fields()
    {
        $this->fields['section'] = new FieldsBuilder('SECTION');
        $this->fields['section']
            ->setLocation('post_type', '==', 'post')
            ->addTab('Section')
            ->addField('Columns', 'range', [
                'wrapper' => ['class' => 'column-types'],
                "default_value" => 10,
                "min" => 10,
                "max" => 90,
                "step" => 10,
            ]);

        $this->fields['section'] = $this->add_layouts($this->fields['section']->addFlexibleContent('Column 1', [
            'wrapper' => ['class' =>'admin-section-column-1 col'],
            'button_label' => 'Add Block',
        ]));
        $this->fields['section'] = $this->add_layouts($this->fields['section']->addFlexibleContent('Column 2', [
            'wrapper' => ['class' =>'admin-section-column-2 col'],
            'button_label' => 'Add Block',
        ]), '19');
        $this->fields['section'] = $this->add_layouts($this->fields['section']->addFlexibleContent('Column 3', [
            'wrapper' => ['class' =>'admin-section-column-3 col'],
            'button_label' => 'Add Block',
        ]), '49');
        $this->fields['section'] = $this->add_layouts($this->fields['section']->addFlexibleContent('Column 4', [
            'wrapper' => ['class' =>'admin-section-column-4 col'],
            'button_label' => 'Add Block',
        ]), '89');
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
        $fields = $this->fields;
        add_action('acf/init', function() use ($fields) {
            foreach($fields as $field) {
                acf_add_local_field_group($field->build());
            }
        });
    }
}
