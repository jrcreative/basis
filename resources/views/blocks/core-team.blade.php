<div class="row">
  <div class="col-sm-12 text-center">
    @if(get_sub_field('Heading'))<h1>{!! get_sub_field('Heading') !!}</h1>@endif
    @if(get_sub_field('Subheading'))<h2>{!! get_sub_field('Subheading') !!}</h2>@endif
  </div>
  @foreach(get_sub_field('Members') as $member)
    <div class="col-sm-12 col-md-4">
      <div class="member text-center">
        <img src="{!! $member['Profile']['sizes']['team'] !!}" alt="{{$member['Profile']['alt']}}">
        <h5>{{$member['Name']}}</h5>
        <h6>{{$member['Position']}}</h6>
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
  @endforeach
  @foreach(get_sub_field('Quotes') as $quote)
    <div class="col-sm-12 col-md-4">
      <blockquote>{!! $quote['Quote'] !!}</blockquote>
      <cite>{!! $quote['Author'] !!}</cite>
    </div>
  @endforeach
</div>
