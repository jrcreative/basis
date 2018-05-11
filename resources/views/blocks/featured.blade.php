@if($featured)
    <section class="featured {!! $featured['type'] !!} {!! $featured['background_color'] !!}"
             @if( !$featured['background_video'] && isset($featured['background_image']['url']) )
             style="background: url({{ $featured['background_image']['url'] }}) no-repeat center center; background-size: cover;
             @endif">
        @if( $featured['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $featured['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $featured['background_video'] }}" type="video/mp4">
            </video>
        @endif
        <div class="container">
            @if ($featured['title'])
                <div class="row">
                    <div class="col use_case-title">
                        {!! $featured['heading'] !!}
                        <div class="h2">{!! $featured['title'] !!}</div>
                    </div>
                </div>
            @endif
            <div class="row d-flex no-gutters @if($featured['reverse']) flex-row-reverse @endif">
                <div class="col-md-7 feature">
                    <a href="{!! get_permalink($featured['primary']['ID']) !!}">
                        <div class="primary col d-flex p-0 mb-3 mb-md-0"
                             style="background: url('{!! get_the_post_thumbnail_url($featured['primary']['ID'], 'large') !!}') center center;background-size: cover;min-height: 400px">
                            <div class="featured-meta">
                                <div class="category">{{ get_the_category($featured['primary']['ID'])[0]->name }}</div>
                                <div class="title">{{ $featured['primary']['title'] }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 d-md-flex flex-column">
                    @foreach( $featured['secondary'] as $secondary)
                        <a class="secondary col d-flex @if($featured['reverse']) flex-row-reverse @endif"
                           href="{!! the_permalink($secondary['ID'], 'thumbnail') !!}">
                            <img src="{!! get_the_post_thumbnail_url($secondary['ID'], 'thumbnail') !!}">
                            <div class="featured-meta @if($featured['reverse']) text-right @endif">
                                <div class="category">{{ get_the_category($secondary['ID'])[0]->name }}</div>
                                <div class="title">{{ $secondary['title'] }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no features to display</p>
@endif