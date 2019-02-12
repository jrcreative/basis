@if(!get_field('isFooter1Hidden'))
  <footer class="preprefooter text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          @php dynamic_sidebar('sidebar-footer-1') @endphp
        </div>
      </div>
    </div>
  </footer>
@endif
@if(!get_field('isFooter2Hidden'))
  <footer class="prefooter text-center">
    @php dynamic_sidebar('sidebar-footer-2') @endphp
  </footer>
@endif
<footer class="footer text-center">
  <div class="icon">
    <svg width="55px" height="36px" viewBox="0 0 55 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Footer" transform="translate(-693.000000, -36.000000)" fill="#B69A62">
          <g id="Group-5-Copy-2">
            <g transform="translate(693.000000, 36.000000)">
              <path d="M16.6447368,36 L1.82143483,2.01159679 C1.61028047,1.52827975 1.04985819,1.30931844 0.56911681,1.52026897 C0.088375426,1.73255463 -0.130747028,2.29597947 0.0804073367,2.78063165 L14.5690496,36 L16.6447368,36 Z" id="Fill-1"></path>
              <path d="M24.8454677,16.6413452 C23.6740005,16.0202752 22.4917859,15.4842648 21.3055411,15.033314 C20.1421344,15.6948885 19.0069398,16.4104692 17.9039873,17.1746553 C18.0571378,16.0202752 18.2237226,14.8253905 18.4104588,13.5913515 C17.439162,12.9540796 16.463835,12.3694637 15.4911948,11.8388539 C16.788944,11.3933037 18.1189354,11.0422641 19.4690782,10.7884355 C20.0669026,9.35997452 20.7090601,7.89505941 21.4036111,6.39639049 C21.9799407,7.71008856 22.5562703,9.02513678 23.1326,10.340185 C24.5109547,10.2591759 25.9000568,10.2767279 27.2878155,10.3928409 C26.2197921,11.2407365 25.1907281,12.1061841 24.1979365,12.9851331 C24.4034806,14.2286233 24.6197722,15.4478107 24.8454677,16.6413452 M28.7091599,3.76089344 C17.0079224,-2.76439205 4.34210526,1.18345293 4.34210526,1.18345293 L14.8436636,25.3498268 C14.8436636,25.3498268 18.8081128,21.0806456 32.1751981,25.3498268 C45.5422834,29.619008 55,8.51342911 55,8.51342911 C55,8.51342911 40.4117408,10.2848288 28.7091599,3.76089344" id="Fill-3"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>
  </div>
  <div class="copyright">&copy {!! date('Y') . ' ' . get_bloginfo('name') !!} . All rights reserved.</div>
  @include('menus.social-media')
</footer>
