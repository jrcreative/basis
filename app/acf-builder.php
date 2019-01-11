<?php
$fields = [];

// partials background
$partials_background = new StoutLogic\AcfBuilder\FieldsBuilder('partials_background');
$partials_background
    ->setGroupConfig('title', 'PARTIAL: Background')
    ->setLocation('post_type', '==', 'post')
;
$partials_background
    ->addTab('Background')
    ->addSelect('Background Color', [
        'choices' => [
            "none"=> "None",
            "diamanti" => "Diamanti",
            "orange" => "Orange",
            "green" => "Green",
            "dark-blue" => "Dark Blue",
            "white" => "White",
            "dark" => "Dark",
            "light" => "Light"
        ]])
    ->setWidth('33')
    ->addImage('Background Image')
    ->setWidth('33')
    ->addUrl('Background Video', [
        'instructions' => 'Upload video to media library and add the link here. Alternatively, provide a url to a video hosted on Vimeo or Youtube. Be sure to include a fallback background image for mobile devices.'
    ])
    ->setWidth('33')
    ->addText('Add Classes')
    ->addTab('', ['endpoint' => 1])
;

// partials text alignment
$partials_text_alignment = new StoutLogic\AcfBuilder\FieldsBuilder('Text Alignment');
$partials_text_alignment
    ->addField('text_alignment', 'button_group', [
        'choices' => [
            "left" => '<span class="dashicons dashicons-editor-alignleft">',
            "center" => '<span class="dashicons dashicons-editor-aligncenter">',
            "right" => '<span class="dashicons dashicons-editor-alignright">',
        ]])
    ->setWidth('20');

// partials section heading
$partials_section_heading = new StoutLogic\AcfBuilder\FieldsBuilder('section_heading');
$partials_section_heading
    ->addText('section_heading', ['instructions' => 'Small Heading the describes the content of this section in one or two words.'])
    ->setWidth('80')
;

// partials section color
$partials_text_color = new StoutLogic\AcfBuilder\FieldsBuilder('Text Color');
$partials_text_color
    ->addField('Text Color', 'button_group', ['choices' => [
        "dark" => "Dark",
        "light" => "Light",
    ]])
    ->setWidth('20')
;

// partials section title
$partials_section_title = new StoutLogic\AcfBuilder\FieldsBuilder('Section Title');
$partials_section_title
    ->addText('Section Title', ['instructions' => 'Large Title that spans all columns'])
    ->setWidth('80')
;

// partials column section
$partials_section_column = new StoutLogic\AcfBuilder\FieldsBuilder('Section Columns');
$partials_section_column
    ->setGroupConfig('title', 'PARTIAL: Section Column')
    ->setLocation('post_type', '==', 'post')
;
$partials_section_column
    ->addField('Content Type', 'button_group', [
        'choices' => [
            "text" => "Text",
            "image" => "Image",
            "video" => "Video",
            "card" => "Card",
            "form" => "Form",
    ]])
    ->addWysiwyg('Text')
        ->conditional('Content Type', '==', 'text')
    ->addGroup('Image')
        ->conditional('Content Type', '==', 'image')
        ->addImage('Image')
        ->addSelect('Image size', [
            'choices' => [
                "thumbnail" => "Thumbnail (150x150)",
                "medium" => "Medium (300x200)",
                "large" => "Large",
                "full" => "Full",
        ]])
            ->setDefaultValue('"large"')
        ->addSelect('Image Overflow', [
            'instructions' => 'Allow the image to flow out of the grid. Use Overflow Right if the image is in the last column, and Overflow Left if the image is on the left column. This is an experimental feature. Milage may vary.',
            'choices' => [
                "none" => "none",
                "right" => "Overflow Right",
                "left" => "Overflow Left",
        ]])
            ->setDefaultValue("none")
    ->endGroup()
    ->addGroup('Video', [
        'instructions' => 'Video will display in a modal window. For video to play inline, choose the Text options above and add the link. Vimeo, Youtube and other hosted videos will embed automatically.',
    ])
        ->conditional('Content Type', '==', 'video')
        ->addField('Video Source', 'button_group', [
            'instructions' => '<strong>Link<\/strong> directly to a video in the media library or hosted externally, or add the url to <strong>embed<\/strong> the video from Vimeo, Youtube or other video sources that allow embedding.',
            'choices' => [
                "link" => "Link",
                "embed" => "Embed"
        ]])
            ->setWidth('20')
        ->addUrl('URL')
            ->conditional('Video Source', '==', 'link')
            ->setWidth('80')
        ->addOembed('Embed')
            ->conditional('Video Source', '==', 'embed')
            ->setWidth('80')
        ->addImage('Poster Frame', [
            'instructions' => 'Add a screenshot that will show before the video plays.',
        ])
        ->addText('Link Text')
    ->endGroup()
    ->addGroup('Card')
        ->conditional('Content Type', '==', 'card')
        ->addImage('image')
            ->setWidth('60')
        ->addTrueFalse('Image Fills Background')
            ->setWidth('40')
        ->addText('Title')
        ->addWysiwyg('Text', [
            "toolbar" => "basic",
                    "media_upload" => 0,
        ])
        ->addUrl('Link')
            ->setWidth('50')
        ->addText('Link Text')
            ->setWidth('50')
    ->endGroup()
;

// block featured
$block_featured = new StoutLogic\AcfBuilder\FieldsBuilder('block_featured');
$block_featured
    ->setGroupConfig('title', 'BLOCK: Featured')
    ->setLocation('post_type', '==', 'post')
;
$block_featured
    ->addTab('Foreground')
    ->addFields($partials_text_alignment)
    ->addFields($partials_section_heading)
    ->addFields($partials_text_color)
    ->addFields($partials_section_title)
    ->addField('Layout', 'button_group', [
        'choices' => [
            "left" => "Left",
            "right" => "Right",
    ]])
        ->setDefaultValue('left')
    ->addPostObject('Primary', [
        "post_type" => [
            "post",
            "page",
            "resource"
    ]])
    ->addField('Secondary', 'relationship', [
        "post_type"=> [
            "post",
            "page",
            "resource",
            "event"
        ],
        "taxonomy" => [],
        "filters" => [
            "search",
            "post_type",
            "taxonomy"
        ],
        "elements" => [
            "featured_image"
        ],
        "min" => 2,
        "max" => 3,
    ])
    ->addFields($partials_background)
;

// block post grid
$block_post_grid = new StoutLogic\AcfBuilder\FieldsBuilder('block_post_grid');
$block_post_grid
    ->setGroupConfig('title', 'BLOCK: Post Grid')
    ->setLocation('page_temlate', '==', 'default')
;
$block_post_grid
    ->addTab('Post Grid')
    ->addFields($partials_text_alignment)
    ->addFields($partials_section_heading)
    ->addFields($partials_text_color)
    ->addFields($partials_section_title)
    ->addField('Feed Type', 'button_group', [
        'choices' => [
            "recent" => "Recent",
            "category" => "Category",
            "tag" => "Tag",
            "post_list" => "User Specified",
        ]])
        ->setWidth('60')
    ->addNumber('Number of posts', [
        "min" => 3,
        "max" => 100,
        "step" => 3
    ])
        ->setDefaultValue(3)
        ->setWidth('40')
    ->addTaxonomy('Article Category', ["taxonomy" => "category"])
        ->conditional('Feed Type', '==', 'category')
    ->addField('User Specified', 'relationship', [
        "post_type" => [
            "post",
            "page",
            "testimonial",
            "resource"
        ],
        "taxonomy"=> [],
        "filters" => [
            "search",
            "post_type",
            "taxonomy"
        ],
        "elements" => [
            "featured_image"
        ],
        "min" => 3,
    ])
        ->conditional('Feed Type', '==', 'post_list')
    ->addTaxonomy('Tag', [
        "taxonomy" => "post_tag",
        "field_type" => "checkbox",
    ])
        ->conditional('Feed Type', '==', 'tag')
    ->addFields($partials_background)
;

// block divider
$block_divider = new StoutLogic\AcfBuilder\FieldsBuilder('block_divider');
$block_divider
    ->setGroupConfig('title', 'BLOCK: Divider')
    ->setLocation('post_type', '==', 'post')
;
$block_divider
    ->addMessage('Divider', 'Adds a Horizontal line between sections')
;

// block testimonial
$block_testimonial = new StoutLogic\AcfBuilder\FieldsBuilder('block_testimonial');
$block_testimonial
    ->setGroupConfig("title", "BLOCK: Testimonial")
    ->setLocation('page_type', '==', 'post')
;
$block_testimonial
    ->addTab('Testimonial')
    ->addFields($partials_text_alignment)
    ->addFields($partials_text_color)
//    ->addFields((clone $partials_section_heading)->getField('section_heading')->setWidth('60'))//@TODO breaking other fields, clone isnt cloning?
    ->addNumber('Limit', [
        'instructions' => 'Set limit to 0 to show all in a category. If the limit is greater than one, they\'ll be presented as a slider.',

    ])
        ->setWidth('25')
        ->setDefaultValue(0)
    ->addTaxonomy('Testimonial Topic', [
        'instructions' => 'Choose which testimonials topics you would like to display',
        'taxonomy' => "topic",
        'field_type' => "multi_select",
    ])
        ->setWidth('75')
    ->addFields($partials_background)
;

// block section
$block_section = new StoutLogic\AcfBuilder\FieldsBuilder('block_section');
$block_section
    ->setGroupConfig('title', 'BLOCK: Section')
    ->setLocation('post_type', '==', 'page')
;
$block_section // @TODO
    ->addTab('Foreground')
//    ->addFields($partials_text_alignment)
    ->addFields($partials_section_heading)
    ->addFields($partials_text_color)
    ->addFields($partials_section_title)
    ->addField('Columns', 'button_group', [
        'choices' => [
            "1" => "One",
            "2" => "Two",
            "3" => "Three",
            "4" => "Four",
    ]])
        ->setDefaultValue('1')
        ->setWidth('50')
    ->addRadio('Two Column Layout', [
        'choices' => [
            "1_1" => "Even",
            "1_2" => "1\/3 - 2\/3",
            "2_1" => "2\/3 - 1\/3",
    ]])
        ->conditional('Columns', '==', '2')
        ->setDefaultValue('1_1')
        ->setWidth(50)
    ->addRadio('Three Column Layout', [
        'choices' => [
            "1_1_1" => "Even",
            "1_1_2" => "1\/4 + 1\/4 + 1\/2",
            "2_1_1" => "1\/2 + 1\/4 + 1\/4",
            "1_2_1" => "1\/4 + 1\/2 + 1\/4"
        ]])
        ->conditional('Columns', '==', '3')
        ->setDefaultValue('1_1_1')
        ->setWidth(50)
    ->addFields($partials_section_column)
//    ->addFields($partials_section_column)
//        ->conditional('Columns', '!=', '1')
//    ->addFields($partials_section_column)
//        ->conditional('Columns', '==', '3')
//        ->or('Columns', '==', '4')
//    ->addFields($partials_section_column)
//        ->conditional('Columns', '==', '4')
//    ->addFields($partials_background)
;

// block hero
$block_hero = new StoutLogic\AcfBuilder\FieldsBuilder('block_hero');
$block_hero
    ->setGroupConfig("title", "BLOCK: Hero")
    ->setGroupConfig('position', 'acf_after_title')
    ->setLocation('page_type', '==', 'front_page')
;
$block_hero
    ->addTab('Hero')
    ->addFields($partials_text_alignment)
    ->addField('text_color', 'button_group', [
        'choices' => [
            "dark" => "Dark",
            "light" => "Light",
        ]
    ])
    ->setWidth('20')
    ->addText('title')
    ->setWidth('60')
    ->addText('subtitle')
    ->addWysiwyg('description', [
        "toolbar" => "basic",
        "media_upload" => 0,
    ])
    ->addRepeater('call_to_action', ['max' => 2])
    ->addText('button_text')
    ->setWidth('50')
    ->addUrl('link')
    ->setWidth('50')
    ->endRepeater()
    ->addFields($partials_background)
;

// block home content
$block_home_content = new StoutLogic\AcfBuilder\FieldsBuilder('home_content_blocks');
$block_home_content
    ->setGroupConfig('title', 'HOME: Content Blocks')
    ->setLocation('page_template', '==', 'default')
    ->and('page_type', '==', 'front_page')
;
$block_home_content
    ->addFlexibleContent('Content Blocks')
        ->addLayout('Section')
        ->addFields($block_section)
        ->addFields($block_hero)
//        ->addFields($block_testimonial)
//        ->addFields($block_featured)
//        ->addFields($block_post_grid)
    ->endFlexibleContent()
;

// content blocks
$default_blocks = new StoutLogic\AcfBuilder\FieldsBuilder('default_content_blocks');
$default_blocks
    ->setGroupConfig('title', 'DEFAULT: Content Blocks')
    ->setGroupConfig('button_label', 'Add Content Block')
    ->setGroupConfig('hide_on_screen', [
        "the_content",
        "custom_fields",
        "discussion",
        "comments"
    ])
    ->setLocation('page_template', '==', 'default')
;
$default_blocks
    ->addFlexibleContent('Content Blocks')
        ->addLayout('Section')
            ->addFields($block_section)
        ->addLayout('Hero')
            ->addFields($block_hero)
        ->addLayout('Testimonial')
            ->addFields($block_testimonial)
        ->addLayout('Featured')
            ->addFields($block_featured)
        ->addLayout('Post Grid')
            ->addFields($block_post_grid)
        ->addLayout('Divider')
            ->addFields($block_divider)
    ->endFlexibleContent()
;

// block Story Elements
$block_story = new StoutLogic\AcfBuilder\FieldsBuilder('Story Elements');
$block_story
    ->setGroupConfig("title", "BLOCK: Story Elements")
;
$block_story
    ->addRepeater('Story Elements', [
        "button_label" => "Add Element",
//        "collapsed" => "field_5a5fbb543d8b7", // @TODO
        "min" => 0,
        "max" => 0,
    ])
        ->addText('Element Name')
        ->addText('Heading')
        ->addText('Subheading')
        ->addField('Element Details', 'clone', ['clone' => ['group_5a5fbdef357e6']]) // @TODO
        ->addFields($default_blocks)
    ->endRepeater()
;

// main temlate builder
$fields['template_default'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_default');
$fields['template_default']
    ->setGroupConfig("title", "TEMPLATE: Default")
    ->setGroupConfig("hide_on_screen", [
        "the_content",
        "custom_fields",
        "discussion",
        "comments",
        "format",
        "send-trackbacks"
    ])
    ->setLocation('page_template', '==', 'default')
    ->and('page_type', '!=', 'posts_page')
    ->and('page_type', '!=', 'front_page')
;
$fields['template_default']
    ->addFields($block_hero)
    ->addFields($default_blocks)
;

// story temlate builder
$fields['template_story'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_story');
$fields['template_story']
    ->setGroupConfig("title", "TEMPLATE: Story")
    ->setGroupConfig("hide_on_screen", [
        "the_content",
        "custom_fields",
        "discussion",
        "comments",
        "format",
        "send-trackbacks"
    ])
    ->setLocation('page_template', '==', 'views\/template-story.blade.php')
;
$fields['template_story']
    ->addFields($block_hero)//group_59611a47e654f
    ->addFields($block_section)//group_5a4ad357ecc73
    ->addFields($block_story)
    ->addFields($default_blocks)//group_593857d4e9b91
;

// post temlate builder
$fields['template_post'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_post');
$fields['template_post']
    ->setGroupConfig("title", "TEMPLATE: Post")
    ->setLocation('post_type', '==', 'post')
;
$fields['template_post']
    ->addFields($block_post_grid)
;

// post temlate builder
$fields['template_home'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_home');
$fields['template_home']
    ->setGroupConfig("title", "TEMPLATE: Home")
    ->setGroupConfig("hide_on_screen", [
        "custom_fields",
        "discussion",
        "comments",
        "format",
        "send-trackbacks"
    ])
    ->setLocation('page_type', '==', 'front_page')
;
$fields['template_post']
//    ->addFields($block_hero)
    ->addFields($block_home_content)
;

// template by the numbers
$fields['template_numbers'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_numbers');
$fields['template_numbers']
    ->setGroupConfig("title", "TEMPLATE: By the Numbers")
    ->setGroupConfig("hide_on_screen", [
        "the_content",
        "custom_fields",
        "discussion",
        "comments",
        "format",
        "send-trackbacks"
    ])
    ->setLocation('page_template', '==', 'views\/template-numbers.blade.php')
;
$fields['template_numbers']
    ->addFields($block_hero)
    ->addFields($default_blocks)
;

// template blog
$fields['template_blog'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_blog');
$fields['template_blog']
    ->setGroupConfig("title", "TEMPLATE: Blog")
    ->setLocation('page_type', '==', 'posts_page')
;
$fields['template_blog']
    ->addGroup('Page Header')
        ->addFields($block_hero)
    ->endGroup()
    ->addGroup('Hero')
        ->addFields($block_hero)
    ->endGroup()
;

// template blog
$fields['template_case'] = new StoutLogic\AcfBuilder\FieldsBuilder('template_case');
$fields['template_case']
    ->setGroupConfig("title", "TEMPLATE: Use Case")
    ->setGroupConfig("hide_on_screen", [
        "the_content",
        "custom_fields",
        "discussion",
        "comments",
        "format",
        "send-trackbacks"
    ])
    ->setLocation('page_template', '==', 'views\/template-use-case.blade.php')
;
$fields['template_case']
    ->addFields($block_hero)
    ->addFields($default_blocks)
    ->addGroup('Use Case')
        ->addFields($block_section)
        ->addWysiwyg('Main Column')
            ->setWidth('75')
        ->addWysiwyg('Sidebar Column')
            ->setWidth('25')
        ->addFields($partials_background)
    ->endGroup()
;

add_action('acf/init', function() use ($fields) {
    foreach($fields as $field) {
        acf_add_local_field_group($field->build());
    }
});

