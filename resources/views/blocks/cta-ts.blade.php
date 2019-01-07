@if($calltoaction)
<section class="section-cta-footer">
<div class="row">
    <div class="col-md-8 cta-left-content">

     <p class="p-cta">
            {{ $calltoaction['cta_content'] }}
    </p>
  
    </div>
    <div class="col-md-4 cta-right-content">
    <a class="btn btn-primary" href="{{ $calltoaction['cta_button_link'] }}">
          {{ $calltoaction['cta_button_name'] }}
    </a>  

    </div>
</div>
</section>
@else 
<p class="alert-danger text-center m-5">There are no features to display</p>
@endif



