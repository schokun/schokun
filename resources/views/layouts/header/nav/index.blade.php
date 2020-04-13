<nav class="navbar navbar-dark navbar-expand-sm  fixed-top bg-dark header-nav">
    <div class="container">
{{--        <a class="py-2 active" href="/">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"--}}
{{--                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img"--}}
{{--                 viewBox="0 0 24 24" focusable="false">--}}
{{--                <circle cx="12" cy="12" r="10"/>--}}
{{--                <path--}}
{{--                    d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>--}}
{{--            </svg>--}}
{{--        </a>--}}
        <div class="logo">
            <a href="/">
                <img src="https://hyperhost.ua/info/wp-content/themes/bootstrap-basic4/assets/img/logo-go-to-blog.png" alt="">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
{{--                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
                @auth
                    @if (Auth::user()->role->name == 'Админ')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard' , 'users') }}">Админка</a>
                        </li>
                    @endif
                    <li class="nav-item {{ Route::is('auth*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('auth.stats') }}">Личный кабинет</a>
                    </li>
                @endauth
            </ul>
            @guest
                <div class="form-inline mt-2 mt-md-0 auth">
                    <a href="{{ route('login') }}">Вход</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                </div>
            @endguest
            @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <Button type="submit" class="exitBtn">Выход</Button>
                </form>
            @endauth
        </div>
    </div>
</nav>
