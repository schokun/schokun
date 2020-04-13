<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <nav class="p-4 pt-5">
            <a  class="img auth_photo logo rounded-circle mb-5"
            style="background: url('/storage/{{$user->image->path}}')"></a>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="{{route('auth.stats')}}" class="{{ Route::is('auth.stats') ? 'active' : '' }}" >Статистика</a>
                </li>
                <li>
                    <a href="{{route('auth.post.index')}}" class="{{ Route::is('auth.post*') ? 'active' : '' }}">Посты</a>
                </li>
                <li>
                    <a href="#" class="{{ Route::is('dashboard.countries*') ? 'active' : '' }}" >Сообщения</a>
                </li>
                <li>
                    <a href="{{ route('auth.settings.show' , auth()->user()->name) }}" class="{{ Route::is('auth.settings*') ? 'active' : '' }}" >Настройки</a>
                </li>
            </ul>
        </nav>
    </nav>
</div>
