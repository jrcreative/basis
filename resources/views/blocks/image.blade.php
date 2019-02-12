@if(get_sub_field('Heading')) <h1>{!! get_sub_field('Heading') !!}</h1> @endif
@if(get_sub_field('Subheading')) <h2>{!! get_sub_field('Subheading') !!}</h2> @endif
<img src="{{get_sub_field('Image')['url']}}" alt="{{get_sub_field('Image')['alt']}}">
