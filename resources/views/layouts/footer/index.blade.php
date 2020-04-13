<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="logo">
                    <a href="/">
                        <img class="w-100"
                             src="https://hyperhost.ua/info/wp-content/themes/bootstrap-basic4/assets/img/logo-go-to-blog.png"
                             alt="">
                    </a>
                </div>
                <div class="footer-text">
                    <p>Мой блог - это амбициозная мультимедийная попытка изучить, как технологии изменят жизнь в будущем
                        для широкой массовой аудитории. Наша оригинальная редакционная идея заключалась в том, что
                        технологии перенесли..</p>
                </div>
                <div class="footer-social">
                    <ul class="d-flex">
                        <li><a href="https://twitter.com/ruvisha11" class="twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/ruvimshokun/" class="instagram"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100017412188026" class="facebook"><i
                                    class="fab fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-7">
                <div class="subscribe-box">
                    <div class="subscribe-text">Подпишись</div>
                    <div class="subscribe-dop"><p>Получайте лучшие истории в свой почтовый ящик! Оставайтесь всегда на
                            связи!</p>
                    </div>
                    <form action="{{ route('feedback.store') }}" method="post" id="my_captcha_form">
                        {!! NoCaptcha::display() !!}
                        @csrf
                        <input name="email" type="email" required placeholder="Ваш маил" class="sub-mail d-block">
                        <button type="submit" class="btn btn-success mt-3">Отпарвить</button>
                        <small>*Не волнуйтесь, мы не спамим</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
