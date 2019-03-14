<div class="headings">
  @if(get_sub_field('Icon'))<img src="{!! get_sub_field('Icon')['url'] !!}" alt="{!! get_sub_field('Icon')['alt'] !!}">@endif
  @if(get_sub_field('Headings'))
    @foreach(get_sub_field('Headings') as $heading)
        <{!! $heading['Size'] !!}>{!! $heading['Heading'] !!}</{!! $heading['Size'] !!}>
    @endforeach
  @endif
</div>
