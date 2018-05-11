@if ($story_element)
    <section class="story-elements" >
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top nav flex-column d-none d-md-block list-group" id="story-element-labels" role="tablist" aria-orientation="vertical">
                        @foreach($story_element as $element)
                            <a class="list-group-item link-arrow" href="#story-{{ sanitize_title($element['name']) }}">
                                {{$element['name']}}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content" id="v-tabContent">
                        @foreach($story_element as $element)
                            <section class="{{ sanitize_title($element['name']) }}" id="story-{{ sanitize_title($element['name']) }}"
                                 aria-labelledby="story-{{ sanitize_title($element['name']) }}-item">

                                @if( $element['heading'] )
                                <div class="row">
                                    <div class="section-title col">
                                        <h2 class="section">{{ $element['heading'] }}</h2>
                                    </div>
                                </div>
                                @endif

                                @if($element['subheading'])
                                <div class="row">
                                    <div class="col">
                                        <h3 class="element-subheading">{{ $element['subheading'] }}</h3>
                                    </div>
                                </div>
                                @endif
                                <div class="story-element">
                                    @foreach($element['sections'] as $use_case)
                                        @include('blocks.section', [$use_case['type'] => $use_case])
                                    @endforeach
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <p class="alert-danger text-center m-5">There are no story elements to display</p>
@endif