<nav class="navbar bg-faded">
    <a class="navbar-brand" href="{{ home_url('/') }}">

        <svg width="195px" height="28px" viewBox="0 0 195 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <polygon id="path-1" points="0.000210638298 0.48867 32.9292957 0.48867 32.9292957 28 0.000210638298 28"></polygon>
            </defs>
            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Nav" transform="translate(0.000000, -9.000000)">
                    <g id="Group-10">
                        <g id="Group-7">
                            <g id="nav">
                                <g id="Page-1" transform="translate(0.000000, 9.000000)">
                                    <path d="M42.0748331,17.4020861 L46.2284087,17.4020861 C50.4115421,17.4020861 52.6846782,16.1034497 53.1766046,13.4320523 C53.366619,12.399393 53.2322014,11.6145428 52.7642028,11.0309922 C52.0147013,10.0949857 50.3432777,9.62116873 47.7956762,9.62116873 L43.5083867,9.62116873 L42.0748331,17.4020861 Z M45.7618176,22 L36,22 L39.13172,5 L48.7598237,5 C53.0520395,5 56.0584907,6.03483948 57.6954302,8.07763006 C58.8481847,9.51506861 59.2479188,11.4146967 58.8509997,13.5686744 C58.1000907,17.6448083 54.2667246,22 45.7618176,22 Z" id="Fill-1" fill="#FFFFFF"></path>
                                    <polygon id="Fill-3" fill="#FFFFFF" points="64.0028624 22 59 22 61.9971376 5 67 5"></polygon>
                                    <path d="M76.3935176,14.3763074 L81.4125247,14.3763074 L79.9319747,9.61485592 L79.7168948,9.61485592 L76.3935176,14.3763074 Z M90,22 L83.8627204,22 L82.6294052,18.3655923 L73.6767942,18.3655923 L71.0593935,22 L65,22 L77.2774173,5 L84.0913768,5 L90,22 Z" id="Fill-5" fill="#FFFFFF"></path>
                                    <polygon id="Fill-7" fill="#FFFFFF" points="116.807353 22 111.523342 22 113.44467 11.7734034 105.287276 22 102.498553 22 98.2010341 11.6673079 96.260335 22 91 22 94.1926474 5 101.363549 5 105.356869 14.5595024 112.919497 5 120 5"></polygon>
                                    <path d="M128.393518,14.3763074 L133.412525,14.3763074 L131.931975,9.61485592 L131.716895,9.61485592 L128.393518,14.3763074 Z M142,22 L135.86272,22 L134.629405,18.3655923 L125.676794,18.3655923 L123.059393,22 L117,22 L129.277417,5 L136.091377,5 L142,22 Z" id="Fill-9" fill="#FFFFFF"></path>
                                    <polygon id="Fill-11" fill="#FFFFFF" points="163.853919 22 158.223495 22 150.221846 11.2371121 148.229564 22 143 22 146.146788 5 152.477126 5 159.927328 15.0878003 161.793767 5 167 5"></polygon>
                                    <polygon id="Fill-13" fill="#FFFFFF" points="177.905393 22 172.538311 22 174.869322 9.62169787 167 9.62169787 167.869813 5 189 5 188.129468 9.62169787 180.237124 9.62169787"></polygon>
                                    <polygon id="Fill-15" fill="#FFFFFF" points="192.002862 22 187 22 189.997138 5 195 5"></polygon>
                                    <g id="Group-19">
                                        <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"></use>
                                        </mask>
                                        <g id="Clip-18"></g>
                                        <polygon id="Fill-17" fill="#FFFFFF" mask="url(#mask-2)" points="16.4644021 28.00007 0.000210638298 7.65457 5.79908298 0.48867 19.934317 0.48867 25.560466 7.35777 16.3780404 18.66907 13.664317 15.31467 20.0038277 7.48657 17.9051681 4.80137 7.73835957 4.80137 5.42976383 7.65457 16.4644021 21.29127 27.5004447 7.65387 21.7444021 0.48867 27.1297213 0.48867 32.9292957 7.65457"></polygon>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        <span class="sr-only">{{ get_bloginfo('name', 'display') }}</span></a>

    {!! wp_nav_menu([
        'menu' => 'Secondary Header Navigation',
        'theme_location' => 'secondary_navigation',
        'fallback_cb'    => false, // Do not fall back to wp_page_menu()
        'container_class' => 'secondary-menu d-none d-md-block'
    ]) !!}

    <div class="navbar-toggler collapsed" role="button" data-toggle="collapse"
         data-target="#primary-navigation-container" aria-controls="primary-navigation-container" aria-expanded="false"
         aria-label="Toggle navigation">
        <div id="nav-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
<div id="primary-navigation-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-7 d-none d-md-flex form-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8  offset-lg-2 form">
                            <div class="h2">{!! get_field('form_title', 'options') !!}</div>
                            <p class="form-description">
                                {!! get_field('form_description', 'options') !!}
                            </p>
                            @if(get_field('select_a_form', 'options'))
                                <p>
                                    {{ gravity_form( get_field('select_a_form', 'options'), false, false, false, false, true, 60, true ) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 menu">
                <a class="navbar-toggler" role="button" data-toggle="collapse" data-target="#primary-navigation-container" aria-controls="primary-navigation-container" aria-expanded="false"
                   aria-label="Toggle navigation">&times;</a>
	            <?php
	            wp_nav_menu([
		            'menu'            => 'primary_navigation',
		            'theme_location'  => 'primary_navigation',
		            'container'       => 'div',
		            'container_id'    => 'primary-navigation',
		            'container_class' => '',
		            'menu_id'         => false,
		            'menu_class'      => 'navbar-nav mr-auto',
		            'depth'           => 2,
		            'fallback_cb'     => 'bs4navwalker::fallback',
		            'walker'          => new bs4navwalker()
	            ]);
	            ?>
                <div class="menu-meta text-center">
                    <div>
                        {!! $diamanti_social_bugs !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</nav>