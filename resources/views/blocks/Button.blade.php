<div class="container text-center">
  <div class="row">
    <div class="col">
      @if(get_sub_field('Buttons'))
        <div class="btn-group" role="group">
          @foreach(get_sub_field('Buttons') as $button)
            @include('partials.button', ['button' => $button['Button'], 'classes' => 'outline-'.$button['Button Style']])
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
