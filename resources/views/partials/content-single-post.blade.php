<section class="single single-{{get_post_type()}}">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <article @php post_class() @endphp>
          <header>
            <h1 class="entry-title">{{ get_the_title() }}</h1>
            {!! get_the_post_thumbnail(null, 'full') !!}
            @include('partials/entry-meta')
          </header>
          <div class="entry-content">
            @php the_content() @endphp
          </div>
          <footer>
            {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
          </footer>
          @php comments_template('/partials/comments.blade.php') @endphp
        </article>
      </div>
    </div>
  </div>
</section>
