@if (isset($cta_bar))
    <div class="cta-bar {{ $cta_bar['background_color'] }}">
        <div class="container {{ $cta_bar['text_color'] }}">
            <div class="row d-flex align-items-center">
                <div class="col-sm-8">
                    <p class="large mb-3 m-md-0 text-center text-sm-left">{!! $cta_bar['text'] !!}</p>
                </div>
                <div class="col-sm-4 d-flex justify-content-center justify-content-sm-end">
                    {!! $cta_bar['button'] !!}
                </div>
            </div>
        </div>
    </div>
@else
    <p class="alert-danger text-center m-5">There is no CTA Bar to display</p>
@endif