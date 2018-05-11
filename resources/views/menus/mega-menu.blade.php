<div class="collapse navbar-collapse" id="primary-navigation">
    <ul id="primary-nav" class="primary-menu navbar-nav ml-auto">
        @foreach( $show_mega_menu as $primary)
                @if(isset( $primary['children']) && count($primary['children']) > 1 )
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ $primary['is_current'] }} {{ implode(' ', $primary['classes']) }}" id="navbarDropdownMenuLink-{{ $primary['ID'] }}"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation">
                            {{ $primary['title'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="row">
                                @include('partials.mega-menu-children', ['children' => $primary['children']])
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ $primary['is_current'] }} {{ implode(' ', $primary['classes']) }}" href="{{$primary['url']}}">
                            {{$primary['title']}}
                        </a>
                    </li>
                @endif
        @endforeach
        <li class="nav-search d-none d-sm-inline">
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <label>
                    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                    <input type="search" class="search-field"
                           placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                           value="<?php echo get_search_query() ?>" name="s"
                           title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                    @if('resource' == get_post_type())
                        <input type="hidden" value="resource" name="post_type">
                    @endif
                </label>
                <button type="submit" class="search-submit"
                        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </li>
     </ul>
</div>