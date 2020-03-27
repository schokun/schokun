<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{  mix('/css/app.css')  }} ">
    <title>Document</title>
</head>
<body class="p-2">
<div>
    <strong>Author</strong> - {{  $post->user->name }}
    <br>
    <strong>Post:</strong> {{  $post->text  }}
</div>
<div class="mt-5">
    <strong>Отзывы</strong>
    <br>
    @foreach($post->reviews as $review)
        Имя: {{ $review->name  }}
        <br>
        Сам отзыв {{ $review->text  }}
        <br>
        <hr>
    @endforeach
</div>
</body>
</html>
