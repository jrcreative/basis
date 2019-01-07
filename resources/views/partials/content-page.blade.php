@if($content_blocks)
    @foreach($content_blocks as $block)
        @include('blocks.'.$block['type'], array($block['type'] => $block))
    @endforeach
@endif

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
