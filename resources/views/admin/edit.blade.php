<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/assets/css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="/assets/js/components/jquery.min.js"></script>
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
        <div class="article__page">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="article__page_main">
                <form method="POST" action="/admin/article/save/{{$article->id}}">
                    @csrf
                    <div class="article__review_input_wr">
                        <div class="article__review_input_label">Title</div>
                        <input class="article__review_input" type="text" value="{{$article->title}}" name="title" required>
                    </div>
                    <div class="article__review_input_wr">
                        <div class="article__review_input_label">Link Photo</div>
                        <input class="article__review_input" type="text" value="{{$article->image}}" name="img" required>
                    </div>
                    <div class="article__review_input_wr">
                        <div class="article__review_input_label">Description</div>
                        <textarea class="article__review_input" name="desc" style="min-height: 200px; max-width: 100%;" required>{{$article->description}}</textarea>
                    </div>
                    <div class="article__review_input_wr">
                        <div class="article__review_input_label">Text</div>
                        <textarea class="article__review_input" name="text" style="min-height: 300px; max-width: 100%;" required>{{$article->text}}</textarea>
                    </div>
                    <div class="article__review_addbtn" style="justify-content: flex-start">
                        <button type="submit" class="article__review_btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
