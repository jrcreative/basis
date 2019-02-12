<div class="block block-{{get_row_layout()}}
    @if(get_sub_field('Class(es)') && get_sub_field('Class(es)')){{get_sub_field('Class(es)')}}@endif
    @if(get_sub_field('Text Alignment') && get_sub_field('Text Alignment') != "left")text-{{get_sub_field('Text Alignment')}}@endif
    @if(get_sub_field('Text Color') && get_sub_field('Text Color') != "default")text-{{get_sub_field('Text Color')}}@endif
    @if(get_sub_field('Background Color') && get_sub_field('Background Color') != "default")bg-{{get_sub_field('Background Color')}}@endif"
    style="
      @if(get_sub_field('Background Image') && get_sub_field('Background Image')) background: url({!! get_sub_field('Background Image')['url'] !!}) no-repeat center center; background-size: cover;@endif
      @if(get_sub_field('Max Width') && get_sub_field('Max Width')) max-width: {{get_sub_field('Max Width') }}; margin-left: auto; margin-right: auto;@endif
    "
>
  @include('blocks.'.get_row_layout())
</div>
