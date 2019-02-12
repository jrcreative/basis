@if(get_sub_field('Feed Type') == "recent")
@elseif(get_sub_field('Feed Type') == "category")
@elseif(get_sub_field('Feed Type') == "tag")
@elseif(get_sub_field('Feed Type') == "post_list")
  <div class="row">
    @if(get_sub_field('Large First Post'))
      @php $post = get_sub_field_object('User Specified')['value'][0] @endphp
      <div class="col-sm-12 col-md-6">
        <a href="{{the_permalink($post->ID)}}" class="post-grid-item">
          {!! get_the_post_thumbnail($post->ID, 'basis-post-grid-large') !!}
          <div class="post-grid-content">
            <h5>{{get_the_title($post->ID)}}</h5>
            <div class="text-link">View {{$post->post_type}}</div>
          </div>
        </a>
      </div>
      <div class="col-sm-12 col-md-6">
        <a href="{{the_permalink($post->ID)}}" class="post-grid-item">
          @php $post = get_sub_field_object('User Specified')['value'][1] @endphp
          {!! get_the_post_thumbnail($post->ID, 'basis-post-grid') !!}
          <div class="post-grid-content">
            <h5>{{get_the_title($post->ID)}}</h5>
            <div class="text-link">View {{$post->post_type}}</div>
          </div>
        </a>
        <a href="{{the_permalink($post->ID)}}" class="post-grid-item">
          @php $post = get_sub_field_object('User Specified')['value'][2] @endphp
          {!! get_the_post_thumbnail($post->ID, 'basis-post-grid') !!}
          <div class="post-grid-content">
            <h5>{{get_the_title($post->ID)}}</h5>
            <div class="text-link">View {{$post->post_type}}</div>
          </div>
        </a>
      </div>
    @endif
    @for($i = get_sub_field('Large First Post') ? 3 : 0; $i < get_sub_field('Number of Post'); $i++)
      @php $post = get_sub_field_object('User Specified')['value'][$i] @endphp
      <div class="col-sm-12 col-md-6">
        <a href="{{the_permalink($post->ID)}}" class="post-grid-item">
          <h5>{!! get_the_post_thumbnail($post->ID, 'basis-post-grid') !!}</h5>
          <div class="post-grid-content">
            {{get_the_title($post->ID)}}
            <div class="text-link">View {{$post->post_type}}</div>
          </div>
        </a>
      </div>
    @endfor
  </div>
@endif
