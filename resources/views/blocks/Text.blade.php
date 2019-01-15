@extends('blocks.base')
@section('block')
  <h1>{!! get_sub_field('Heading') !!}</h1>
  <h2>{!! get_sub_field('Subheading') !!}</h2>
  <div>
    {!! get_sub_field('Content') !!}
  </div>
@endsection
