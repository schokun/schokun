@extends('layouts.default')
@section('title', 'Главная страничка')

@section('content')
    <main>
       @include('home.blocks.categoryLink')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="all-project">
                        @forelse($posts as $post)
                            @include('post.card')

                            @empty
                            <div class="alert alert-info mt-5" role="alert">
                               Данная категория пустая
                            </div>
                        @endforelse
                        <div class="d-flex justify-content-center mb-5">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
