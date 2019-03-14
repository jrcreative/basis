<div class="headings">
  @if(get_sub_field('Icon'))<img src="{!! get_sub_field('Icon')['url'] !!}" alt="{!! get_sub_field('Icon')['alt'] !!}">@endif
  @if(get_sub_field('Heading'))
      <{!! get_sub_field('Size') !!}>{!! get_sub_field('Heading') !!}</{!! get_sub_field('Size') !!}>
  @endif
</div>
