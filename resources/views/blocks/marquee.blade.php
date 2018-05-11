@if($marquee)
    <section class="marquee {!! $marquee['type'] !!} {!! $marquee['background_color'] !!}"
             @if( !$marquee['background_video'] && isset($marquee['background_image']['url']) )
             style="background: url({{ $marquee['background_image']['url'] }}) no-repeat center center; background-size: cover;
             @endif">
        @if( $marquee['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $marquee['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $marquee['background_video'] }}" type="video/mp4">
            </video>
        @endif
        <div class="container">
            <div class="content">{!! $marquee['content'] !!}</div>

            <div class="slick marquee-images">
                @if($marquee['images'])
                    @foreach($marquee['images'] as $image)
                        <img class="img-fluid" src="{!! $image['sizes']['medium'] !!}" alt="{!! $image['alt'] !!}">
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no features to display</p>
@endif