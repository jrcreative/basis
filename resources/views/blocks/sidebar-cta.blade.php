@if (isset($sidebar_cta))
    <div class="sidebar-cta">
        <h5 class="text-dark">{!! $sidebar_cta['title'] !!}</h5>
        <p>{!! $sidebar_cta['description'] !!}</p>
        <a href="{!! the_permalink($sidebar_cta['post_id']) !!}">
            {!! $sidebar_cta['image'] !!}
        </a>
        <div class="pt-4">
            {!! $sidebar_cta['button'] !!}
        </div>
    </div>
@else
    <p class="alert-danger text-center m-5">There is no Sidebar CTA to display</p>
@endif