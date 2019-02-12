@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @while(have_rows('Section'))
    @php the_row() @endphp
    <section class="section
      @if(get_sub_field('Class(es)')){{get_sub_field('Class(es)')}}@endif
      @if(get_sub_field('Text Alignment') != "left")text-{{get_sub_field('Text Alignment')}}@endif
      @if(get_sub_field('Text Color') != "default")text-{{get_sub_field('Text Color')}}@endif
      @if(get_sub_field('Background Color') != "default")bg-{{get_sub_field('Background Color')}}@endif
      @if(!get_sub_field('Full Width')) container @endif"
      style="
        @if(get_sub_field('Background Image')) background: url({!! get_sub_field('Background Image')['url'] !!}) no-repeat center center; background-size: cover;@endif
        @if(get_sub_field('Max Width')) max-width: {{get_sub_field('Max Width')}}; @endif
      "
    >
      @if(get_sub_field('Columns') > 0)
      <div class="row">
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
    </section>
  @endwhile
  @endwhile
@endsection
