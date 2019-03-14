@include('blocks.headings')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-8">
      <div class="slick">
        @foreach(get_sub_field('Members') as $member)
          <div class="slide">
            <blockquote>{!! $member['Testimony'] !!}</blockquote>
            <div>
              <img src="{!! $member['Head Shot']['url'] !!}" alt="{!! $member['Head Shot']['alt'] !!}">
              @if($member['Name'] || $member['position'])
                <div class="info">
                  -
                  <span class="name">{!! $member['Name'] !!}</span>
                  <span class="position">{!! $member['Position'] !!}</span>
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
