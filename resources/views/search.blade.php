@php
  if(get_search_query()) {
    $page_title = "Searching for: " . get_search_query();
  }
@endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container">

    @if (!have_posts())
      <div class="row">
        <div class="sm-col-12">
          <div class="alert alert-warning">
            {{  __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        </div>
      </div>
    @endif

    <di class="row">
      @while(have_posts()) @php the_post() @endphp
      <div class="col-sm-12 search-post">
        @include('partials.content-search')
      </div>
      @endwhile
    </di>

    <div class="row">
      <div class="col-sm-12">
        {!! get_the_posts_navigation() !!}
      </div>
    </div>
  </div>
@endsection
