@if ($newsletter_block)
    <div class="newsletter-bar bg-green">
        <div class="container light">
            <div class="row d-flex align-items-center">
                <div class="col-6">
                    <p class="large m-0">{!! $newsletter_block['cta'] !!}</p>
                </div>
                <div class="col-6">
                    {{ gravity_form($newsletter_block['form_id'], false, false, false, '', true ) }}
                </div>
            </div>
        </div>
    </div>
@else
    <p class="alert-danger text-center m-5">There are no newsletter form to display</p>
@endif