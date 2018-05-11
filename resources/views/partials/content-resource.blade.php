<div class="col-md-4 article">
    <article @php(post_class())>
            <div class="card">
                @if(has_post_thumbnail())
                    {!! the_post_thumbnail('large', ['class' => 'img-fluid']) !!}
                @endif
                <div class="card-body">
                    <div class="post-date">{{ the_date('F j, Y') }}</div>
                    <h4 class="post-card-title">
                        {{ the_title() }}
                    </h4>
                    <div class="card-text">{{ the_excerpt() }}</div>
                </div>
                <div class="card-footer">
                    <a href="{{ the_permalink() }}" class="card-link">Read More  <span class="arrow-right"></span></a>
                </div>
            </div>
    </article>
</div>
