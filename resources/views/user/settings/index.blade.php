@extends('user.index')

@section('content_right')
    <div class="container p-0">
        @if(session()->has('flash message'))
            <p class="flash-mes"> {{ session()->get('flash message') }}</p>
        @endif
        @include('user.blocks.errors')
    </div>

    <div class="container-fluid">
        <form method="post" action=" {{ route('auth.settings.update' , $user->id )}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Имя</label>
                <input value="{{ $user->name }}" type="text" class="form-control" id="name" aria-describedby="name"
                       name="name">
                <small id="emailHelp" class="form-text text-muted">Ваше имя.</small>
            </div>
            <div class="form-group">
                <label for="theme">Ваше изображение</label>
                <input type="file" class="form-control" name="image" id="theme">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input value="{{ $user->email }}" type="email" name="email" class="form-control" id="Email"
                       aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту
                    кому-либо еще.</small>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" class="form-control" id="Password">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
