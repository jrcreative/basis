<div class="row">
  <div class="col-sm-12">
    @if(get_sub_field('Heading'))<h1>{!! get_sub_field('Heading') !!}</h1>@endif
    @if(get_sub_field('Subheading'))<h2>{!! get_sub_field('Subheading') !!}</h2>@endif
  </div>
</div>
<div class="row">
  @foreach(get_sub_field('Images') as $image)
    <div class="col-sm-12 col-md-4">
      <a data-fancybox="gallery" href="{{$image['Image']['url']}}"><img src="{{$image['Image']['sizes']['medium']}}" alt="{{$image['Image']['alt']}}"></a>
    </div>
  @endforeach
</div>
