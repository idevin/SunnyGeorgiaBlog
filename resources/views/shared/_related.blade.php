<div class="related">
    <div class="container">
        <div class="row">
            <div
                class="col-12 d-flex justify-content-sm-between justify-content-center align-items-center mb-3 mb-lg-0">
                <p class="related__title">Related Posts</p>
                <a href="#" class="related-hashtag d-none d-sm-flex">
{{--                    @include('shared/_tags')--}}
                </a>
            </div>
        </div>
        <div class="row" >
{{--            @dd($tags)--}}
            @foreach($tags as $tag)
                {{--        <?php--}}
                {{--        $tagName = $tag->getTranslations('name', [app()->getLocale()]);--}}
                {{--        ?>--}}
                @foreach($tag->posts as $related)
                    @if($loop->iteration <= 3 )
                        <div class="col-lg-4">
                            <div class="related-card">
                                <img
                                    loading="lazy"
                                    class="related-card__img"
                                    src="{{$related->thumbnail->getUrl()}}"
                                    alt="{{$related->thumbnail->name}}"
                                >

                                <div class="related-card-info">
                                    <div class="hashtag">
                                        @php
                                            $relatedTags = $related->tags->each(function ($tag){
                                               return $tag->byLocale(session()->get('locale'))->get();
                                            })
                                        @endphp
                                        @if(count($relatedTags) > 0)
                                            @include('shared/_tags', $relatedTags)
                                        @endif
                                    </div>
                                    <a href="#" class="related-card__title">{{$related->title}}</a>
                                    <a href="#" class="d-flex align-items-center mt-3">
                                        <div class="">
                                            <p class="user__name">{{$related->author->fullname}}</p>
                                            <p class="day__info d-flex align-items-center flex-wrap">
                                                @if($settings->show_date == 1)
                                                    {{ humanize_date($post->posted_at) }} ·
                                                @endif
                                                <svg style="width: 12px" fill="#838C99" class="d-block mx-1"
                                                     viewBox="0 0 125.668 125.668"
                                                     style="enable-background:new 0 0 125.668 125.668;"
                                                     xml:space="preserve">
                                            <path d="M84.17,76.55l-16.9-9.557V32.102c0-2.541-2.061-4.601-4.602-4.601s-4.601,2.061-4.601,4.601v37.575
                                                c0,0.059,0.016,0.115,0.017,0.174c0.006,0.162,0.025,0.319,0.048,0.479c0.021,0.146,0.042,0.291,0.076,0.433
                                                c0.035,0.141,0.082,0.277,0.129,0.414c0.051,0.146,0.1,0.287,0.164,0.426c0.061,0.133,0.134,0.257,0.208,0.383
                                                c0.075,0.127,0.148,0.254,0.234,0.374c0.088,0.122,0.188,0.235,0.288,0.349c0.097,0.11,0.192,0.217,0.299,0.317
                                                c0.107,0.101,0.222,0.19,0.339,0.28c0.126,0.098,0.253,0.191,0.39,0.276c0.052,0.031,0.092,0.073,0.145,0.102L79.64,84.562
                                                c0.716,0.404,1.493,0.597,2.261,0.597c1.605,0,3.163-0.841,4.009-2.337C87.161,80.608,86.381,77.801,84.17,76.55z"/>
                                                    <path d="M62.834,0C28.187,0,0,28.187,0,62.834c0,34.646,28.187,62.834,62.834,62.834c34.646,0,62.834-28.188,62.834-62.834
                                                C125.668,28.187,97.48,0,62.834,0z M66.834,115.501v-9.167h-8v9.167c-24.77-1.865-44.823-20.872-48.292-45.167h9.459v-8h-9.988
                                                c0.258-27.558,21.716-50.126,48.821-52.167v9.167h8v-9.167c27.104,2.041,48.563,24.609,48.821,52.167h-9.487v8h8.958
                                                C111.657,94.629,91.605,113.636,66.834,115.501z"/>
                                        </svg>
                                                1 min
                                                <svg class="d-block mx-1" width="14px" height="14px" fill="#838C99"
                                                     viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/>
                                                </svg>
                                                230
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endforeach
        </div>
    </div>
</div>
