@if (isset($hero)) 

@if ( is_front_page() ) 
<section
            class="hero hero-home {{ $hero['classes'] }}  {{ $hero['text_color'] }} {!! $hero['type'] !!} {!! $hero['remove_padding'] !!} {!! $hero['background_color'] !!}"
            @if( !$hero['background_video'] && isset($hero['background_image']['url']) )
            style="background: url({{ $hero['background_image']['url'] }}) no-repeat center center; background-size: cover"
            ;
            @endif>

        @if( $hero['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $hero['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $hero['background_video'] }}" type="video/mp4">
            </video>
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    @if($hero['heading'] || $hero['subheading'])
                        <div class="hero-statement text-{{ $hero['alignment_class'] }}">
                            {!! $hero['heading'] !!}
                            @if($hero['subheading'])
                                <h3>
                                    {!! $hero['subheading'] !!}
                                </h3>
                            @endif
                        </div>
                    @endif

                    @if($hero['description'])
                        <div class="description text-{{ $hero['alignment_class'] }}">
                            {!!  $hero['description'] !!}
                        </div>
                    @endif

                    @if ($hero['buttons'])
                        <div class="button-container text-{{ $hero['alignment_class'] }}">
                            @foreach ($hero['buttons'] as $button)
                                <a class="btn btn-primary mt-5"
                                   href="{!! $button['link'] !!}">{{ $button['button_text'] }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@else 
<section
            class="hero hero-global {{ $hero['classes'] }}  {{ $hero['text_color'] }} {!! $hero['type'] !!} {!! $hero['remove_padding'] !!} {!! $hero['background_color'] !!}"
            @if( !$hero['background_video'] && isset($hero['background_image']['url']) )
            style="background: url({{ $hero['background_image']['url'] }}) no-repeat center center; background-size: cover"
            ;
            @endif>

        @if( $hero['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $hero['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $hero['background_video'] }}" type="video/mp4">
            </video>
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    @if($hero['heading'] || $hero['subheading'])
                        <div class="hero-statement text-{{ $hero['alignment_class'] }}">
                            {!! $hero['heading'] !!}
                            @if($hero['subheading'])
                                <h3>
                                    {!! $hero['subheading'] !!}
                                </h3>
                            @endif
                        </div>
                    @endif

                    @if($hero['description'])
                        <div class="description text-{{ $hero['alignment_class'] }}">
                            {!!  $hero['description'] !!}
                        </div>
                    @endif

                    @if ($hero['buttons'])
                        <div class="button-container text-{{ $hero['alignment_class'] }}">
                            @foreach ($hero['buttons'] as $button)
                                <a class="btn btn-primary mt-5"
                                   href="{!! $button['link'] !!}">{{ $button['button_text'] }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
@else
    <p class="alert-danger text-center m-5">There is no hero to display</p>
@endif
