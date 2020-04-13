@extends('user.index')

@section('content_right')
    @if(session()->has('flash message'))
        <p class="flash-mes"> {{ session()->get('flash message') }}</p>
    @endif

    @include('user.blocks.errors')

    <div class="container-fluid">
        <form action="{{ route('auth.post.update' , $post->id )}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('user.post.blocks.form.field')
            <button type="submit" class="btn-success btn">Обновить</button>
        </form>
    </div>
@endsection
