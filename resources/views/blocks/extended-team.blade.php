<div class="row justify-content-md-center">
  <div class="col-sm-12 text-center">
    @if(get_sub_field('Heading'))<h1>{!! get_sub_field('Heading') !!}</h1>@endif
    @if(get_sub_field('Subheading'))<h2>{!! get_sub_field('Subheading') !!}</h2>@endif
  </div>
  <div class="col-sm-12 col-md-11 col-lg-10">
    <div class="slick">
      @foreach(get_sub_field('Members') as $member)
        <div>
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 profile-wrapper">
              <img src="{!! $member['Profile']['sizes']['extended-team'] !!}" alt="{{$member['Profile']['alt']}}">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8">
              <div class="content">
                <h5>{{$member['Name']}}</h5>
                <h6>{{$member['Position']}}</h6>
                <div>{!! $member['Bio'] !!}</div>
                <div class="social">
                  @if($member['Linkedin'])
                    <a href="{{$member['Linkedin']}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                  @endif
                  @if($member['Instagram'])
                    <a href="{{$member['Instagram']}}" target="_blank"><i class="fab fa-instagram"></i></a>
                  @endif
                  @if($member['Dribble'])
                    <a href="{{$member['Dribble']}}" target="_blank"><i class="fab fa-dribbble"></i></a>
                  @endif
                  @if($member['Twitter'])
                    <a href="{{$member['Twitter']}}" target="_blank"><i class="fab fa-twitter"></i></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      @foreach(get_sub_field('Quotes') as $quote)
        <div class="col-sm-12 col-md-4">
          <blockquote>{!! $quote['Quote'] !!}</blockquote>
          <cite>{!! $quote['Author'] !!}</cite>
        </div>
      @endforeach
    </div>
  </div>
</div>
