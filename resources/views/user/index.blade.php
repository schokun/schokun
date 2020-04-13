@extends('layouts.default')
@section('title', 'Личный кабинет')

@section('content')
    <div class="d-flex profile">
        <div class='sidebar-wrap'>
            @include('user.blocks.nav.index')
        </div>
        <div class="w-100">
            @yield('content_right', 'Default Content')
        </div>
    </div>
@endsection
