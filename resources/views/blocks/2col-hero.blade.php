@if (isset($hero))
    <section class="hero {{ $hero['text_color'] }} {!! $hero['type'] !!} {!! $hero['background_color'] !!}"
         @if( !$hero['background_video'] && isset($hero['background_image']['url']) )
         style="background: url({{ $hero['background_image']['url'] }}) no-repeat center center; background-size: cover;
         @endif">

        @if(isset($hero_slider['background_image']['url']))
            <div class="overlay bg-diamanti-grad"></div>
        @endif

        @if( $hero['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $hero['background_image']['url'] }}" id="bgvid" style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $hero['background_video'] }}" type="video/mp4">
            </video>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    @if($hero['heading'])
                    <div class="hero-statement">
                        {!! $hero['heading'] !!}
                    </div>
                    @endif

                    @if($hero['title'])
                        <div class="h2">
                            {!! $hero['title'] !!}
                        </div>
                    @endif

                    @if ($hero['buttons'])
                        <div class="button-container text-{{ $hero['alignment_class'] }}">
                            @foreach ($hero['buttons'] as $button)
                                <a class="btn btn-action mt-5" href="{!! $button['link'] !!}">{{ $button['button_text'] }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-5"
                    @if($hero['description'])
                        <div class="description text-{{ $hero['alignment_class'] }}">
                            {!!  $hero['description'] !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There is no hero to display</p>
@endif