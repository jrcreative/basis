<div class="col-md-8 resource-sticky bg-diamanti light">
    <div class="row">
        <div class="col-md-6">
            {{ the_post_thumbnail('large', ['class' => 'img-fluid']) }}
        </div>
        <div class="col-md-6">
            <h3>{{ the_title() }}</h3>
            <a class="btn btn-primary" href="{{ the_permalink() }}">See Resource</a>
        </div>
    </div>

</div>
