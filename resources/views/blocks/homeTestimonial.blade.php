@if ($homeTestimonial)
    <section class="heading-block"
             @if( isset($homeTestimonial['heading_block']['background_image']['url']) )
             style="background: url({{ $homeTestimonial['heading_block']['background_image']['url'] }}) no-repeat center center; background-size: cover;
             @endif">
        <div class="overlay bg-diamanti-grad"></div>
        <div class="container">
            <div class="row light">
                <div class="col-md-5">
                    <h2 class="section-heading text-green">{!! $homeTestimonial['heading_block']['heading'] !!}</h2>
                    <div class="h2 title block-title">{!! $homeTestimonial['heading_block']['title'] !!}</div>
                </div>
                <div class="col-md-6 offset-md-1 mt-5">
                    <div class="row">
                        @foreach( $homeTestimonial['heading_block']['logos'] as $logo)
                            <div class="col-4">
                                <img class='img-fluid' src="{{ $logo['url'] }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="@if( count($homeTestimonial['testimonials']) > 1 ) testimonial-slider @else testimonial-single @endif">
                        @foreach( $homeTestimonial['testimonials'] as $homeTestimonial)
                            <div class="testimonials">
                                <div class="testimonial-quote">
                                    {!! $homeTestimonial['quote'] !!}
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