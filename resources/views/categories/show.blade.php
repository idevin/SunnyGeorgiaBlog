@extends('layouts.app')

@section('content')
    <div class="author">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="author__title">{{$category->title}}
                        <span class="author__title-num">{{ $posts_count }}</span>
                    </p>
                    <p class="result__title_text">{{$category->meta_description}}</p>
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

@section('meta.common')
    <x-meta.common :data="$category"/>
@endsection

@section('title')
    :: {{$category->title}}
@endsection
