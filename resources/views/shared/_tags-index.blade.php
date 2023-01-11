<div class="col-xl-3 col-lg-4  col-12 px-2">
    <p class="featured-hashtag__title d-none d-lg-flex">@lang('tags.all')</p>
    <p class="featured-hashtag__title d-lg-none text-center text-sm-start">Search by Hashtag</p>
    @include ('posts/_search_form')

    <div class="featured-hashtag-item d-flex flex-wrap align-items-start">
        @foreach($tags as $tag)
            {{--    @dd($tags)--}}

            {{--        <?php--}}
            {{--        $tagName = $tag->getTranslations('name', [app()->getLocale()]);--}}
            {{--        ?>--}}
            @if($tag->slug)
                <a href="{{routeLink('tags.show', ['slug' => $tag->slug])}}" class="hashtag blue">
                    #{{$tag->name}}
                </a>
                @if(!$loop->last)
                    &nbsp
                @endif
            @endif
        @endforeach
    </div>
</div>
