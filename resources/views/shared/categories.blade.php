    <a href="{{routeLink('categories.show', ['slug_path' => $child['slug_path']])}}" class="header-list__link">
        {{$child['title'][session()->get('locale')]}}
    </a>
    @if (count($children) > 0)
    <li class="submenu">
            @foreach ($children as $child)
                @include('shared.categories', ['child' => $child, 'children' => $child['children']])
            @endforeach
    </li>
    @endif
