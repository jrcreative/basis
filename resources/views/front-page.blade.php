@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('blocks.heroSlider')
    @include('blocks.ctaBar')
    @include('partials.content-page')
  @endwhile
@endsection
