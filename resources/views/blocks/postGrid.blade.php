@if($postGrid['query']->have_posts())

    <section class="post-grid {{ $postGrid['background_color'] }}  {{ $postGrid['color']}}"
             @if( $postGrid['background_image']['url'] ) style="background: url('{!! $postGrid['background_image']['url'] !!}') center center; background-size: cover;" @endif
    >
        <div class="container">
            @if ($postGrid['title'])
                <div class="row">
                    <div class="col use_case-title">
                        {!! $postGrid['heading'] !!}
                        <div class="h2">{!! $postGrid['title'] !!}</div>
                    </div>
                </div>
            @endif
            <div class="row articles">
                @while( $postGrid['query']->have_posts() )
                    {{ $postGrid['query']->the_post() }}
                    <article @php(post_class('col-md-4'))>
                        <div class="card">
                            @if(has_post_thumbnail())
                                <a href="{{ the_permalink() }}">
                                    {!! the_post_thumbnail('medium', ['class' => 'img-fluid']) !!}
                                </a>
                            @endif
                            <div class="card-body">
                                <div class="post-date">{{ the_time('F j, Y') }}</div>
                                <a href="{{ the_permalink() }}">
                                    <a href="{{ the_permalink() }}">
                                        <h4 class="card-title">{{ the_title() }}</h4>
                                    </a>
                                    <div class="card-text">{{ the_excerpt() }}</div>
                                </a>
                            </div>
                            <div class="card-footer">
                                <a href="{{ the_permalink() }}" class="card-link link-arrow">Read More</a>
                            </div>
                        </div>
                    </article>
                @endwhile
                {{ wp_reset_query() }}
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no related articles to display</p>
@endif