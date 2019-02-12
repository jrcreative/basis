<nav class="navbar bg-faded">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="{{get_template_directory_uri()}}/../dist/images/revere-logo-white.png" alt="" class="logo-white">
          <img src="{{get_template_directory_uri()}}/../dist/images/revere-logo-black.png" alt="" class="logo-black">
          <span class="sr-only">{{ get_bloginfo('name', 'display') }}</span>
        </a>
      </div>
      <div class="col-sm-6 text-right">
        <div class="navbar-toggler collapsed" role="button" data-toggle="collapse"
             data-target="#primary-navigation-container" aria-controls="primary-navigation-container" aria-expanded="false"
             aria-label="Toggle navigation">
          <div id="nav-icon">
            <svg class="icon-white" width="30px" height="24px" viewBox="0 0 30 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="HOME" transform="translate(-1256.000000, -44.000000)" fill="#FFFFFF">
                  <g id="Menu" transform="translate(1256.000000, 44.000000)">
                    <path d="M9.64152,24 L28.39272,24 C29.28012,24 30.00012,23.2674 30.00012,22.3638 C30.00012,21.4602 29.28012,20.727 28.39272,20.727 L9.64152,20.727 C8.75412,20.727 8.03412,21.4602 8.03412,22.3638 C8.03412,23.2674 8.75412,24 9.64152,24 M1.60692,13.6362 L28.39272,13.6362 C29.28012,13.6362 30.00012,12.9036 30.00012,12 C30.00012,11.0964 29.28012,10.3638 28.39272,10.3638 L1.60692,10.3638 C0.71952,10.3638 0.00012,11.0964 0.00012,12 C0.00012,12.9036 0.71952,13.6362 1.60692,13.6362 M9.64152,3.273 L28.39272,3.273 C29.28012,3.273 30.00012,2.5398 30.00012,1.6362 C30.00012,0.7326 29.28012,0 28.39272,0 L9.64152,0 C8.75412,0 8.03412,0.7326 8.03412,1.6362 C8.03412,2.5398 8.75412,3.273 9.64152,3.273" id="Fill-1"></path>
                  </g>
                </g>
              </g>
            </svg>
            <svg class="icon-primary" width="30px" height="24px" viewBox="0 0 30 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <polygon id="path-1" points="0.00012 0 30 0 30 24 0.00012 24"></polygon>
              </defs>
              <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ABOUT" transform="translate(-1260.000000, -44.000000)">
                  <g id="Menu-Copy" transform="translate(1260.000000, 44.000000)">
                    <mask id="mask-2" fill="white">
                      <use xlink:href="#path-1"></use>
                    </mask>
                    <g id="Clip-2"></g>
                    <path d="M9.64152,24 L28.39272,24 C29.28012,24 30.00012,23.2674 30.00012,22.3638 C30.00012,21.4602 29.28012,20.727 28.39272,20.727 L9.64152,20.727 C8.75412,20.727 8.03412,21.4602 8.03412,22.3638 C8.03412,23.2674 8.75412,24 9.64152,24 M1.60692,13.6362 L28.39272,13.6362 C29.28012,13.6362 30.00012,12.9036 30.00012,12 C30.00012,11.0964 29.28012,10.3638 28.39272,10.3638 L1.60692,10.3638 C0.71952,10.3638 0.00012,11.0964 0.00012,12 C0.00012,12.9036 0.71952,13.6362 1.60692,13.6362 M9.64152,3.273 L28.39272,3.273 C29.28012,3.273 30.00012,2.5398 30.00012,1.6362 C30.00012,0.7326 29.28012,0 28.39272,0 L9.64152,0 C8.75412,0 8.03412,0.7326 8.03412,1.6362 C8.03412,2.5398 8.75412,3.273 9.64152,3.273" id="Fill-1" fill="#B69A62" mask="url(#mask-2)"></path>
                  </g>
                </g>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<div id="primary-navigation-container" class="collapse">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <a class="navbar-brand" href="{{ home_url('/') }}">
            <img src="{{get_template_directory_uri()}}/../dist/images/revere-logo-white.png" alt="">
            <span class="sr-only">{{ get_bloginfo('name', 'display') }}</span>
          </a>
        </div>
        <div class="col-sm-6 text-right">
          <a class="navbar-toggler" role="button" data-toggle="collapse" data-target="#primary-navigation-container" aria-controls="primary-navigation-container" aria-expanded="false"
             aria-label="Toggle navigation">&times;</a>
        </div>
      </div>
        <div class="row">
            <div class="col-md-4 col-lg-6 border-right">
              @foreach(get_field('featured_post', 'option') as $featured)
                <a class="text-light featured-menu-post" href="{!! get_the_permalink($featured->ID) !!}">
                  {!! get_the_post_thumbnail($featured->ID) !!}
                  <div class="featured-content">
                    <h5>{!! get_the_title($featured->ID) !!}</h5>
                    <div class="text-link">Read More</div>
                  </div>
                </a>
              @endforeach
            </div>
            <div class="col-md-8 col-lg-6">
              <div class="menus">
                @php
                wp_nav_menu([
                  'menu'            => 'primary_navigation',
                  'theme_location'  => 'primary_navigation',
                  'container'       => 'div',
                  'container_id'    => 'primary-navigation',
                  'container_class' => '',
                  'menu_id'         => false,
                  'menu_class'      => '',
                  'depth'           => 2,
                ]);
                @endphp
                @include('menus.social-media')
              </div>
            </div>
        </div>
    </div>
</div>
