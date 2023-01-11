@extends('layouts.app')

@section('content')
    <div class="article">
        <div class="container">
            <div class="row d-flex flex-wrap-reverse flex-sm-wrap">
                <div class="col-xl-7 col-md-6">
                    <div class="hashtag">
                        @if(count($tags) > 0)
                            @include('shared/_tags')
                        @endif
                    </div>
                    <p class="article__title">{{ $post->title }}</p>
                    @if($settings->show_author == 1)
                        <a
                            href="{{ routeLink('users.show', ['user' => $post->author->name]) }}"
                            class="article-user d-flex align-items-center"
                        >
                            <img
                                loading="lazy"
                                src="{{asset('images/png/user.png')}}"
                                alt="user.png"
                                class="user__img">
                            <div class="ms-0 ms-sm-3">
                                <p class="user__name">{{$post->author->fullname}}</p>
                                <p class="day__info d-flex align-items-center">
                                    @if($settings->show_date == 1)
                                        {{ humanize_date($post->posted_at) }} ·
                                    @endif
                                    <svg style="width: 16px" fill="#838C99" class="d-block mx-2"
                                         viewBox="0 0 125.668 125.668"
                                         style="enable-background:new 0 0 125.668 125.668;"
                                         xml:space="preserve">
                                        <path d="M84.17,76.55l-16.9-9.557V32.102c0-2.541-2.061-4.601-4.602-4.601s-4.601,2.061-4.601,4.601v37.575
                                            c0,0.059,0.016,0.115,0.017,0.174c0.006,0.162,0.025,0.319,0.048,0.479c0.021,0.146,0.042,0.291,0.076,0.433
                                            c0.035,0.141,0.082,0.277,0.129,0.414c0.051,0.146,0.1,0.287,0.164,0.426c0.061,0.133,0.134,0.257,0.208,0.383
                                            c0.075,0.127,0.148,0.254,0.234,0.374c0.088,0.122,0.188,0.235,0.288,0.349c0.097,0.11,0.192,0.217,0.299,0.317
                                            c0.107,0.101,0.222,0.19,0.339,0.28c0.126,0.098,0.253,0.191,0.39,0.276c0.052,0.031,0.092,0.073,0.145,0.102L79.64,84.562
                                            c0.716,0.404,1.493,0.597,2.261,0.597c1.605,0,3.163-0.841,4.009-2.337C87.161,80.608,86.381,77.801,84.17,76.55z"
                                        />

                                        <path d="M62.834,0C28.187,0,0,28.187,0,62.834c0,34.646,28.187,62.834,62.834,62.834c34.646,0,62.834-28.188,62.834-62.834
                                        C125.668,28.187,97.48,0,62.834,0z M66.834,115.501v-9.167h-8v9.167c-24.77-1.865-44.823-20.872-48.292-45.167h9.459v-8h-9.988
                                        c0.258-27.558,21.716-50.126,48.821-52.167v9.167h8v-9.167c27.104,2.041,48.563,24.609,48.821,52.167h-9.487v8h8.958
                                        C111.657,94.629,91.605,113.636,66.834,115.501z"
                                        />
                                    </svg>
                                    1 min
                                    <svg class="d-block mx-2" width="18px" height="18px" fill="#838C99"
                                         viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/>
                                    </svg>
                                    {{ trans_choice('comments.count', $post->comments_count) }}
                                </p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-xl-5 col-md-6">
                    <img src="{{$post->thumbnail->getUrl()}}" alt="{{$post->thumbnail->name}}" class="article__img">
                </div>
            </div>
            <div class="row">
                <div class="col-12 position-relative">
                    <div class="tableOfContents-mobile">
                        <div class="tableOfContents">
                            <svg
                                class="burger"
                                width="16"
                                height="14"
                                viewBox="0 0 16 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 1.625C0 1.02734 0.492188 0.5 1.125 0.5H14.625C15.2227 0.5 15.75 1.02734 15.75 1.625C15.75 2.25781 15.2227 2.75 14.625 2.75H1.125C0.492188 2.75 0 2.25781 0 1.625ZM0 7.25C0 6.65234 0.492188 6.125 1.125 6.125H14.625C15.2227 6.125 15.75 6.65234 15.75 7.25C15.75 7.88281 15.2227 8.375 14.625 8.375H1.125C0.492188 8.375 0 7.88281 0 7.25ZM14.625 14H1.125C0.492188 14 0 13.5078 0 12.875C0 12.2773 0.492188 11.75 1.125 11.75H14.625C15.2227 11.75 15.75 12.2773 15.75 12.875C15.75 13.5078 15.2227 14 14.625 14Z"
                                    fill="white"
                                />
                            </svg>
                            <span class="tableOfContents__text">{{__('main.Contents', [])}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 col-md-10">
                    <div id="article-container" class="article-item">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($tags) > 0)
        @include('shared/_related')
    @endif
    <div class="modal-article">
        <div class="modal-article-item position-relative">
            <svg class="modal-article__close" width="42" height="42" viewBox="0 0 42 42" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M25.8984 24.9766C26.3555 25.3984 26.3555 26.1367 25.8984 26.5586C25.6875 26.7695 25.4062 26.875 25.125 26.875C24.8086 26.875 24.5273 26.7695 24.3164 26.5586L20.625 22.8672L16.8984 26.5586C16.6875 26.7695 16.4062 26.875 16.125 26.875C15.8086 26.875 15.5273 26.7695 15.3164 26.5586C14.8594 26.1367 14.8594 25.3984 15.3164 24.9766L19.0078 21.25L15.3164 17.5586C14.8594 17.1367 14.8594 16.3984 15.3164 15.9766C15.7383 15.5195 16.4766 15.5195 16.8984 15.9766L20.625 19.668L24.3164 15.9766C24.7383 15.5195 25.4766 15.5195 25.8984 15.9766C26.3555 16.3984 26.3555 17.1367 25.8984 17.5586L22.207 21.2852L25.8984 24.9766Z"
                    fill="#A0AEBF"/>
            </svg>
            <ul id="content-list"></ul>
        </div>
    </div>
@endsection

@section('meta.post')
    <x-meta.post :data="$post"/>
@endsection

@section('meta.common')
    <x-meta.common :data="$post"/>
@endsection

@section('meta.profile')
    <x-meta.profile :data="$post->author"/>
@endsection

@section('title')
    :: {{$post->title}}
@endsection

@push('inline-scripts')
    <script src="{{ mix('/js/article.js') }}" defer></script>
@endpush
