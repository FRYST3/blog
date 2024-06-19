<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/assets/css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/notifyme.css">

    <script src="/assets/js/components/jquery.min.js"></script>
    <script src="/assets/js/components/notifyme.min.js"></script>
    <script src="/assets/js/admin.js"></script>

    <title>Blog || FRYST</title>
</head>
<body>
<div class="header__container">
    <div class="header__blog_name">BlogName</div>
    <div class="header__nav_menu">
        <a href="/admin" class="header__nav_item">Articles</a>
    </div>
</div>
<div class="main__container">
    <a href="/admin/article/new" class="article__new">
        Add Article
    </a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main__cards">
        @foreach($articles as $article)
            <div class="articles__card" data-id="{{$article->id}}">
                <img src="{{$article->image}}" alt="{{$article->title}}" class="article__img">
                <div class="article__created">{{$article->created_at->format('d.m.Y H:i')}}</div>
                <div class="article__title">{{$article->title}}</div>
                <div class="article__description">
                    {{$article->description}}
                </div>
                <div class="article__crud_menu">
                    <a href="/admin/article/edit/{{$article->id}}" class="article__edit">
                        <i class='bx bxs-edit' ></i>
                    </a>
                    <div data-id="{{$article->id}}" class="article__delete">
                        <i class='bx bxs-trash'></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
