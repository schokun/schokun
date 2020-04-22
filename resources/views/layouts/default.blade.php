<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@600;700;800;900&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://miro.medium.com/max/280/1*SRDmSFOon3H_fEL7t7EEYw.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href=" {{  mix('/css/app.css')  }} ">
</head>
<body>

@include('layouts.header.index')
@yield('content')
@include('layouts.footer.index')


@stack('scripts')
<script src=" {{ mix('/js/app.js')  }} "></script>
</body>
</html>
