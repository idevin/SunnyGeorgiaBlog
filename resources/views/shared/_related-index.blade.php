<div class="col-lg-8 col-12x">
    <p class="featured__title px-2">@lang('posts.last_posts')</p>

    <div id="slider" class="featured-carousel w-100">

        @foreach($allPosts as $postsInCategory)
            @foreach($postsInCategory['posts'] as $post)
                <div class="featured-card position-relative d-flex flex-column justify-content-between">
                    <img
                        src="{{$post->thumbnail->getUrl()}}"
                        alt="{{$post->thumbnail->name}}"
                        class="position-absolute w-100 h-100 top-0 start-0"
                        loading="lazy"
                    >

                    <div class="position-relative">

                        <a href="#" class="hashtag">
                            @include('shared._tags_simple', $post->tags)
                        </a>
                    </div>
                    <div class="position-relative">
                        <a href="{{ routeLink('posts.show', ['slug' => $post->slug])}}" class="featured-card__title">{{$post->title}}</a>
                        <a href="#" class="d-flex align-items-center mt-3">
                            <div class="featured-card-user position-relative">
                                <img loading="lazy"
                                     src="{{asset('images/png/user.png')}}"
                                     alt="user.png"
                                     class="w-100 h-100 rounded-circle position-absolute start-0 end-0 bottom-0"
                                >
                            </div>
                            <div class="ms-0 ms-sm-3">
                                <p class="user__name">{{$post->author->fullname}}</p>
                                <p class="day__info">
                                    {{ humanize_date($post->posted_at) }}
                                    · 1 min
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        @endforeach
    </div>
</div>
