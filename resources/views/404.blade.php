@extends('layouts.app')

@section('content')
  <section class="bg-dark-gray"></section>
  {{--@include('partials.page-header')--}}

  @if (!have_posts())
      <div class="container mb-5">
        <div class="row">
          <div class="col aligncenter">
            <h1 class="four-oh-four">404</h1>
            <p class="h4">
              Oops... Looks like you broke the internet
            </p>
            <p>
              Maybe you'll have better luck with search
            </p>
            <div class="d-flex justify-content-center">
              {!! get_search_form(false) !!}
            </div>
          </div>
        </div>
      </div>
  @endif
@endsection
