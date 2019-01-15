<section class="block block-{{get_row_layout()}} text-{{get_sub_field('Text Alignment')}} text-{{get_sub_field('Text Color')}} bg-{{get_sub_field('Background Color')}}"
         @if(get_sub_field('Background Image')) style="background: url({!! get_sub_field('Background Image')['url'] !!}) no-repeat center center; background-size: cover"@endif
>
  @yield('block')
</section>
