@include('blocks.headings')
<div class="@if(get_sub_field('Text Alignment') && get_sub_field('Text Alignment') != "left")text-{{get_sub_field('Text Alignment')}}@endif">
  <img src="{{get_sub_field('Image')['url']}}" alt="{{get_sub_field('Image')['alt']}}" @if(!get_sub_field('Full Width'))style="width:auto;"@endif>
</div>
