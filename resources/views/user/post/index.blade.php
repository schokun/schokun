@extends('user.index')

@section('content_right')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success add_post" href="{{ route('auth.post.create') }}">Добавит пост</a>
                <div class="wrap">
                    <div class="container-fluid">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Смотреть</th>
                                <th scope="col">Редактировать</th>
                                <th scope="col">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row"> {{$loop->index + 1}}</th>
                                    <td>{{$post->short_title}}</td>
                                    <td>
                                        {{ $post->category->name }}
                                    </td>
                                    <td>
                                        <a class="btn-info btn" href="{{ route('post.show' , $post->slug) }}">Смотреть</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('auth.post.edit' , $post->id) }}"
                                           class="btn btn-primary">Редактировать</a>
                                    </td>
                                    <td>
                                        <form id="destroy-form" action="{{ route('auth.post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delPost">
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modal.post.delete')
@endsection
