@extends('layouts.default')
@section('title' , 'Пост')

@section('content')

    <div class="container">

        <div class="post-info">
            @include('post.card')
        </div>

        <div class="post-text">
            <p>{{$post->text}}</p>
        </div>

        <div class="post-comments">
            <span>Comments</span>
            <div class="number-comments"> {{ $post->comments_count() }}</div>
        </div>

        @foreach($post->comments as $comment)
            @if(!$comment->parent_id)
                @include('post.blocks.comment')
            @endif
        @endforeach

        @guest
            @include('post.blocks.auth')
        @else
            <div class="send-comment">
                @include('post.blocks.form.form')
            </div>
        @endguest
    </div>
    @include('post.blocks.form.answer')
@endsection
