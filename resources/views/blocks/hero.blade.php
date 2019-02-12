<div
  class="text-center text-light hero-wrapper"
  style="background: url({!! get_sub_field('Background')['url'] !!}) no-repeat center center; background-size: cover"
>
  <div class="hero-content">
    @if(get_sub_field('Heading'))
      <h1>{!! get_sub_field('Heading') !!}</h1>
    @endif
    @if(get_sub_field('Call To Action'))
      <div class="btn-group" role="group">
        @foreach(get_sub_field('Call To Action') as $button)
          @include('partials.button', ['button' => $button['Button'], 'classes' => 'outline-'.$button['Button Style']])
        @endforeach
      </div>
    @endif
    @if(get_sub_field('Hashtag'))
      <h5>#{!! get_sub_field('Hashtag') !!}</h5>
    @endif
  </div>
</div>
