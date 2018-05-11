@if($mediagrid)
<section class="media-grid {!! $mediagrid['type'] !!} {!! $mediagrid['background_color'] !!}"
         @if( !$mediagrid['background_video'] && isset($mediagrid['background_image']['url']) )
         style="background: url({{ $mediagrid['background_image']['url'] }}) no-repeat center center; background-size: cover;
         @endif">
    @if( $mediagrid['background_video'] )
        <video playsinline autoplay muted loop poster="{{ $mediagrid['background_image']['url'] }}" id="bgvid" style="background-image: url('{{ $hero['background_image']['url'] }}');">
            <source src="{{ $mediagrid['background_video'] }}" type="video/mp4">
        </video>
    @endif

        <div class="container">
            @if($mediagrid['title'])
                <div class="row">
                    <div class="col use_case-title">
                        <h2 class="use_case mb-5 aligncenter underline">{{ $mediagrid['title'] }}</h2>
                    </div>
                </div>
            @endif

            @if($mediagrid['grid_type'] == 'image' && $mediagrid['images'])
            <div class="images row no-gutters">
                @foreach($mediagrid['images'] as $image)
                    <div class="image col-md-2 col-sm-4 col-6 p-2">
                        <img class="img-fluid" src="{{$image['sizes']['medium']}}" alt="{{$image['alt']}}">
                    </div>
                @endforeach
            </div>

            @elseif ($mediagrid['grid_type'] == 'post' && $mediagrid['posts'])
                <div class="posts row no-gutters">
                @foreach($mediagrid['posts'] as $post_id)
                    <div class="post col-md-2 col-sm-4 col-6 p-2">
                    @if( has_post_thumbnail($post_id))
                        <a href="{!! the_permalink($post_id) !!}">
                            {!! get_the_post_thumbnail($post_id, 'medium', ['class' => 'img-fluid']) !!}
                        </a>
                    @endif
                    </div>
                @endforeach
                </div>
            @endif

            @if($mediagrid['description'])
                <div class="description mt-5">
                    {!! $mediagrid['description'] !!}
                </div>
            @endif
            
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no features to display</p>
@endif