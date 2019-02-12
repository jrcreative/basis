<div class="slick">
  @foreach(get_sub_field('Slides') as $slide)
    <div class="slide">
      <img src="{{$slide['Slide']['sizes']['slides']}}" alt="{{$slide['Slide']['alt']}}">
    </div>
  @endforeach
</div>
