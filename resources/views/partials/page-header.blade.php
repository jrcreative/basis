@if(isset($page_header))
  @include('blocks.hero', array('hero' => $page_header))
@else
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1>{!! the_title() !!}</h1>
        </div>
      </div>
    </div>
  </section>
@endif