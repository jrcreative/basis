@if ($testimonial)
    <section
            class="testimonial {{ $testimonial['text_color'] }} {!! $testimonial['classes'] !!} {!! $testimonial['background_color'] !!}"
            @if( !$testimonial['background_video'] && isset($testimonial['background_image']['url']) )
            style="background: url({{ $testimonial['background_image']['url'] }}) no-repeat center center; background-size: cover;
            @endif">
        @if( $testimonial['background_video'] )
            <video playsinline autoplay muted loop poster="{{ $testimonial['background_image']['url'] }}" id="bgvid"
                   style="background-image: url('{{ $hero['background_image']['url'] }}');">
                <source src="{{ $testimonial['background_video'] }}" type="video/mp4">
            </video>
        @endif
        <div class="container">
            @if ($testimonial['title'])
                <div class="row">
                    <div class="col use_case-title h2">
                        {!! $testimonial['title'] !!}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="@if( count($testimonial['testimonials']) > 1 ) testimonial-slider @else testimonial-single @endif">
                        @foreach( $testimonial['testimonials'] as $testimonial)
                            <div class="testimonials">
                                <div class="homeTestimonial-image">
                                    {!! $testimonial['image'] !!}
                                </div>
                                <div class="homeTestimonial-quote">
                                    {!! $testimonial['quote'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no testimonials to display</p>
@endif