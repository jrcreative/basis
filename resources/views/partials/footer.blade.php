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
  <div class="copyright">&copy {!! date('Y') . ' ' . get_bloginfo('name') !!} . All rights reserved.</div>
  @include('menus.social-media')
</footer>
