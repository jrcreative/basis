@if (isset($hero_slider))
    <section class="hero-slider {{ $hero_slider['background_color'] }} {{ $hero_slider['classes'] or '' }}"

    @if( !$hero_slider['background_video'] && isset($hero_slider['background_image']['url']) )
        style="background: url({{ $hero_slider['background_image']['url'] }}) no-repeat center center fixed; background-size: cover;
    @endif">

        @if(isset($hero_slider['background_image']['url']))
            <div class="overlay bg-diamanti-grad"></div>
        @endif

        @if( $hero_slider['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $hero_slider['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero_slider['background_image']['url'] }}');">
                <source src="{{ $hero_slider['background_video'] }}" type="video/mp4">
            </video>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 homeHeroSlides">
                    @foreach( $hero_slider['slides'] as $slide )
                        <div class="homeHeroSlide">
                            <div class="text-{{ $slide['text_alignment'] }} {{ $slide['text_color'] }}">
                                <div class="h1"> {!! $slide['title'] !!}</div>
                                <p class="subtitle h3">{!! $slide['subtitle'] !!}</p>
                                <p class="description">{!! $slide['description'] !!}</p>
                                @if( $slide['call_to_action'])
                                    @foreach($slide['call_to_action'] as $cta)
                                        <a class='btn btn-action' href="{!! $cta['link'] !!}">{!! $cta['button_text'] !!}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There is no hero slider to display</p>
@endif