<div class="col-4 mega-menu-cta-container d-none d-md-block">
@foreach($children as $child)
    @if ($child['is_cta'])
            <div class="mega-menu-cta has-featured-image">
                <a class="nav-link" href="{{ $child['url'] }}">
                    {!!  get_the_post_thumbnail($child['page-id'], 'thumbnail') !!}
                    <div class="cta-link">
                        {{ $child['title'] }}
                    </div>
                </a>
                <div class="cta-description">
                    {{ $child['description'] }}
                </div>
                <a href="{{ get_permalink($child['page-id']) }}" class="btn btn-primary m-auto" role="button">{{ $child['button_text'] or 'Learn More' }}</a>
            </div>
    @endif
@endforeach
</div>
<div class="col col-md-8 mega-menu-items">
    <div class="row">
@foreach($children as $child)
    @if(isset($child['children']) && count($child['children']) > 0)
        <div class="col-12 col-md-4 @if($child['join_prev_column']) m--30 @endif">
            <div class="mega-menu-header @if($child['join_prev_column']) d-none d-md-block @endif">{{$child['title']}}</div>
            @foreach($child['children'] as $tertiary)
                <a class="nav-link {{ $tertiary['is_current'] }} {{ implode(' ', $tertiary['classes']) }}"
                   href="{{$tertiary['url']}}">{{$tertiary['title']}}</a>
            @endforeach
        </div>
    @elseif(!$child['is_cta'])
        <div class="col-12 col-md-4">
            <a class="nav-link {{ $child['is_current'] }}
                {{ implode(' ', $child['classes']) }}" href="{{$child['url']}}">{{ $child['title'] }}
            </a>
        </div>
    @endif
@endforeach
    </div>
</div>
