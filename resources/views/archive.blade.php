@php
  $page_title = get_the_archive_title() ?: get_the_title( get_option('page_for_posts', true) );
@endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container">
    @if (!have_posts())
      <div class="row">
        <div class="sm-col-12">
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        </div>
      </div>
    @endif

    <div class="row">
      @while (have_posts()) @php the_post() @endphp
        <div class="col-sm-12 col-md-6 col-lg-4">
          @include('partials.content-'.get_post_type())
        </div>
      @endwhile
    </div>

    <div class="row">
      <div class="col-sm-12">
        {!! get_the_posts_navigation() !!}
      </div>
    </div>
  </div>
@endsection
