@foreach($tags as $tag)
{{--        <?php--}}
{{--        $tagName = $tag->getTranslations('name', [app()->getLocale()]);--}}
{{--        ?>--}}
    @if($tag->slug)
        <a href="{{routeLink('tags.show', ['slug' => $tag->slug])}}" style="text-transform: capitalize">
            #{{$tag->name}}
        </a>
        @if(!$loop->last)
            &nbsp
        @endif
    @endif
@endforeach
