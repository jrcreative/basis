<div class="container">
  @include('blocks.headings')
  <div class="slick">
    @foreach(get_sub_field('Slides') as $slide)
      <div class="slide">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
              @if($slide['Heading'])<h6>{!! $slide['Heading'] !!}</h6>@endif
              @if($slide['Content'])
                <div class="content">
                  {!! $slide['Content'] !!}
                </div>
              @endif
              @if($slide['Link'])
                  <a href="{!! $slide['Link']['url'] !!}">Read More</a>
              @endif
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
              <img src="{{$slide['Image']['sizes']['slides']}}" alt="{{$slide['Image']['alt']}}">
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
