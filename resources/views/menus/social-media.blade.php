<nav class="nav social-navigation">
  @if(get_field('instagram', 'option'))
    <a href="{{get_field('instagram', 'option')}}" class="nav-link" target="_blank">Instagram</a>
  @endif
  @if(get_field('facebook', 'option'))
    <a href="{{get_field('facebook', 'option')}}" class="nav-link" target="_blank">Facebook</a>
  @endif
  @if(get_field('dribble', 'option'))
    <a href="{{get_field('dribble', 'option')}}" class="nav-link" target="_blank">Dribble</a>
  @endif
  @if(get_field('twitter', 'option'))
    <a href="{{get_field('twitter', 'option')}}" class="nav-link" target="_blank">Twitter</a>
  @endif
</nav>
