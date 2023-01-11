@extends('layouts.app')

@section('content')
    <div class="result">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Form::open(['url' => routeLink('posts.search'), 'method' => 'GET']) !!}
                    {!! Form::text('q', null, ['class' => 'search__inp', 'placeholder' => __('posts.search')]) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-12">
                    <p class="result__title mb-2">
                        @lang('posts.search_title')
                        <span class="result__title-num">{{count($posts)}}</span>
                    </p>

                    {{--                    <p class="result__title_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>--}}
                </div>
            </div>

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        @include('shared._post-card-author', $post)
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $posts->links('shared._pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
