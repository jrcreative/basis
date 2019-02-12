@php
  $posts = new WP_Query(['post_type' => 'case_study', 'posts_per_page' => get_sub_field('How many')]);
@endphp
<div class="row">
  <div class="col-sm-12">
    @if(get_sub_field('Heading'))<h1>{!! get_sub_field('Heading') !!}</h1>@endif
    @if(get_sub_field('Subheading'))<h2>{!! get_sub_field('Subheading') !!}</h2>@endif
  </div>
</div>
<div class="row">
  @while($posts->have_posts())
    @php($posts->the_post())
    <div class="{{ get_sub_field('Small Columns') }} {{ get_sub_field('Medium Columns') }} {{ get_sub_field('Large Columns') }}">
      <a href="{{the_permalink(get_the_ID())}}" class="post-grid-item">
        {!! get_the_post_thumbnail(get_the_ID(), 'basis-post-grid') !!}
        <div class="post-grid-content">
          <h5>{{get_the_title(get_the_ID())}}</h5>
          <div class="text-link">View Case Study</div>
        </div>
      </a>
    </div>
  @endwhile
  @php(wp_reset_postdata())
</div>
