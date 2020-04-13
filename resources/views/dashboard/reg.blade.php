<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--<form action="{{ route('api.reg') }}" method="post">--}}
{{--    <label for="">Имя</label>--}}
{{--    <input type="text" name="name">--}}
{{--    <br>--}}
{{--    <label for="email"></label>--}}
{{--    <input type="text" name="email">--}}
{{--    <br>--}}
{{--    <label for="">Пароль</label>--}}
{{--    <input type="password">--}}

{{--    <button type="submit">reg</button>--}}

{{--    <h2>Vxod</h2>--}}


    <form action="{{  route('api.auth') }}" method="post">

        <input type="name">
        <label for="">Имя</label>
        <input type="text" name="username">
        <br>
        <br>
        <label for="">Пароль</label>
        <input type="password">

        <button type="submit">reg</button>
    </form>
</form>
</body>
</html>
