<div class="container">
  <div class="row">
    <div class="col">
      @if(get_sub_field('Heading'))<h1>{!! get_sub_field('Heading') !!}</h1>@endif
      @if(get_sub_field('Subheading'))<h2>{!! get_sub_field('Subheading') !!}</h2>@endif
      <div>
        {!! get_sub_field('Content') !!}
      </div>
      @if(get_sub_field('Call To Action'))
        <div class="btn-group" role="group">
          @foreach(get_sub_field('Call To Action') as $button)
            @include('partials.button', ['button' => $button['Button'], 'classes' => 'outline-'.$button['Button Style']])
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
