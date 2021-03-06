@while(have_rows('Section'))
@php the_row() @endphp
<section class="section
      @if(get_sub_field('Class(es)')){{get_sub_field('Class(es)')}}@endif
  @if(get_sub_field('Text Alignment') != "left")text-{{get_sub_field('Text Alignment')}}@endif
@if(get_sub_field('Text Color') != "default")text-{{get_sub_field('Text Color')}}@endif
@if(get_sub_field('Background Color') != "default")bg-{{get_sub_field('Background Color')}}@endif"
style="
@if(get_sub_field('Background Type') == 'solid')
@if(get_sub_field('Background Image')) background: url({!! get_sub_field('Background Image')['url'] !!}) no-repeat center center; background-size: cover;@endif
@elseif(get_sub_field('Background Type') == 'gradient')
background-image: linear-gradient(to bottom, {{get_sub_field('Top Background Color')}}, {{get_sub_field('Bottom Background Color')}});
@endif
@if(get_sub_field('Padding Top'))padding-top: {!! get_sub_field('Padding Top')!!}px;@endif
@if(get_sub_field('Padding Right'))padding-right: {!! get_sub_field('Padding Right')!!}px;@endif
@if(get_sub_field('Padding Bottom'))padding-bottom: {!! get_sub_field('Padding Bottom')!!}px;@endif
@if(get_sub_field('Padding Left'))padding-left: {!! get_sub_field('Padding Left')!!}px;@endif
"
>
@if(!get_sub_field('Full Width'))<div class="container-fluid" style="@if(get_sub_field('Max Width')) max-width: {{get_sub_field('Max Width')}}; @endif">@endif
  @if(get_sub_field('Columns') > 0)
  <div class="row" @if(get_sub_field('Vertically Centered'))style="display: flex;align-items: center;"@endif>
  @if (get_sub_field('Columns') == 10)
  <div class="col-sm-12">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 20)
  <div class="col-sm-12 col-md-6">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-6">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 30)
  <div class="col-sm-12 col-md-4">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-8">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 40)
  <div class="col-sm-12 col-md-8">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-4">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 50)
  <div class="col-sm-12 col-md-4">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-4">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-4">
    @if(have_rows('Column 3'))
    @while(have_rows('Column 3'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 60)
  <div class="col-sm-12 col-md-6">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 3'))
    @while(have_rows('Column 3'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 70)
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-6">
    @if(have_rows('Column 3'))
    @while(have_rows('Column 3'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 80)
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-6">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 3'))
    @while(have_rows('Column 3'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @elseif (get_sub_field('Columns') == 90)
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 1'))
    @while(have_rows('Column 1'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 2'))
    @while(have_rows('Column 2'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 3'))
    @while(have_rows('Column 3'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  <div class="col-sm-12 col-md-3">
    @if(have_rows('Column 4'))
    @while(have_rows('Column 4'))
    @php the_row() @endphp
    @include('blocks.base')
    @endwhile
    @endif
  </div>
  @else
  <div class="col-sm-12">
    <div class="alert alert-primary">There is no layout for column value {{get_sub_field('Columns')}}</div>
  </div>
  @endif
</div>
@endif
@if(!get_sub_field('Full Width'))</div>@endif
</section>
@endwhile
