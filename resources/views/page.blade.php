@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @if(get_field('Columns') > 0)
    <div class="container">
      <div class="row">
        @if (get_field('Columns') == 10)
          <div class="col-sm-12">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 20)
          <div class="col-sm-12 col-md-6">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-6">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 30)
          <div class="col-sm-12 col-md-4">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-8">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 40)
          <div class="col-sm-12 col-md-8">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-4">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 50)
          <div class="col-sm-12 col-md-4">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-4">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-4">
            @if(get_field('Column 3'))
              @while(has_sub_field('Column 3'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 60)
          <div class="col-sm-12 col-md-6">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 3'))
              @while(has_sub_field('Column 3'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 70)
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-6">
            @if(get_field('Column 3'))
              @while(has_sub_field('Column 3'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 80)
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-6">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 3'))
              @while(has_sub_field('Column 3'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @elseif (get_field('Columns') == 90)
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 1'))
              @while(has_sub_field('Column 1'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 2'))
              @while(has_sub_field('Column 2'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 3'))
              @while(has_sub_field('Column 3'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
          <div class="col-sm-12 col-md-3">
            @if(get_field('Column 4'))
              @while(has_sub_field('Column 4'))
                @include('blocks.'.get_row_layout())
              @endwhile
            @endif
          </div>
        @else
          <div class="col-sm-12">
            <div class="alert alert-primary">There is no layout for column value {{get_field('Columns')}}</div>
          </div>
        @endif
      </div>
    </div>
  @endif
  @endwhile
@endsection
