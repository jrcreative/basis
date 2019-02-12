<article @php post_class(get_post_type().'-teaser') @endphp>
  <header>
    <a href="{{ get_permalink() }}">
      {!! get_the_post_thumbnail(null, 'basis-post-grid') !!}
      <h4 class="entry-title">{{ get_the_title() }}</h4>
    </a>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
