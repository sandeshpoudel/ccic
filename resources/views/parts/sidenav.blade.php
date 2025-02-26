@if(!isset($innerLoop))
    <ul class="nav nav-list">
        @else
            <ul class="submenu">
                @endif


                @php

                    if (Voyager::translatable($items)) {
                        $items = $items->load('translations');
                    }

                @endphp

                @foreach ($items->sortBy('order') as $item)

                    @php

                        $originalItem = $item;
                        if (Voyager::translatable($item)) {
                            $item = $item->translate($options->locale);
                        }

                        $listItemClass = null;
                        $linkAttributes =  null;
                        $styles = null;
                        $icon = null;
                        $caret = null;

                        // Background Color or Color
                        if (isset($options->color) && $options->color == true) {
                            $styles = 'color:'.$item->color;
                        }
                        if (isset($options->background) && $options->background == true) {
                            $styles = 'background-color:'.$item->color;
                        }

                        // With Children Attributes
                        if(!$originalItem->children->isEmpty()) {
                            $linkAttributes =  'class="dropdown-toggle"';
                            $caret = '<b class="arrow fa fa-angle-down"></b>';

                            if(url($item->link()) == url()->current()){
                                $listItemClass = 'open';
                            }else{
                                $listItemClass = '';
                            }
                        }

                    @endphp

                    <li class="{{ $listItemClass }}">
                        <a href="{{ url($item->link()) }}" target="{{ $item->target }}" {!! $linkAttributes or '' !!}>
                            <i class="{{ $item->icon_class }}"></i>
                            <span class="menu-text"> {{ $item->title }} </span>

                            {!! $caret !!}
                        </a>

                        <b class="arrow"></b>

                        @if(!$originalItem->children->isEmpty())
                            @include('parts.sidenav', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
                        @endif
                    </li>
                @endforeach
            </ul>
