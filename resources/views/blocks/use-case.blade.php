@if($use_case)
    <section class="use-case sr {{ $use_case['bg-color'] }} {{ $use_case['color']}}"
             @if( $use_case['bg-image']['url'] ) style="background: url('{!! $use_case['bg-image']['url'] !!}') center center; background-size: cover;" @endif
    >
        <div class="container {{ $use_case['class'] or '' }}">

            @if ($use_case['title'])
                <div class="row">
                    <div class="col section-title">
                        {!! $use_case['heading'] !!}
                        <div class="h2">{!! $use_case['title'] !!}</div>
                    </div>
                </div>
            @endif
            <div class="content row">
                <div class="col-md-9 main">
                    {!! $use_case['main'] !!}
                </div>
                <div class="col-md-3 sidebar">
                    {!! $use_case['sidebar'] !!}
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no sections to display</p>
@endif