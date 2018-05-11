<footer class="content-info">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-6 col-md-2">
                @php(dynamic_sidebar('sidebar-footer-1'))
            </div>
            <div class="col-6 col-md-2">
                @php(dynamic_sidebar('sidebar-footer-2'))
            </div>
            <div class="col-6 col-md-2">
                @php(dynamic_sidebar('sidebar-footer-3'))
            </div>
            <div class="col-6 col-md-2">
                @php(dynamic_sidebar('sidebar-footer-4'))
            </div>
            <div class="col-6 col-md-1">
                @php(dynamic_sidebar('sidebar-footer-5'))
            </div>
            <div class="col-12 col-md-3">
                <h5 class="company-name">{!! get_bloginfo('name') !!}</h5>
                <div class="address">{!! get_field('address', 'options') !!}</div>
                <a class="text-orange" href="{{ get_field('get_directions_page', 'options')  }}">{{ _('Get Directions') }}</a>
                <br><br>
                <a class="phone-number" href="tel:{!! get_field('phone_number', 'options') !!}">{!! get_field('phone_number', 'options') !!}</a>
            </div>
        </div>

        <div class="footer-base">
            <div class="row">
                <div class="col-md-10 copyright">
                    <span class="copyright">&copy {!! date('Y') . ' ' . get_bloginfo('name') !!} . All rights reserved.</span>
                    <span class="bullet">•</span>
                    <a href="{{ get_field('privacy_policy_page', 'options') }}">{{ _e('Privacy Policy') }}</a>
                </div>
                <div class="col-md-2 text-right">
                    {!! $social_bugs !!}
                </div>
            </div>
        </div>
    </div>
</footer>
