<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/notifyme.css">

    <script src="/assets/js/components/jquery.min.js"></script>
    <script src="/assets/js/components/notifyme.min.js"></script>
    <script src="/assets/js/app.js"></script>

    <title>Blog || FRYST</title>
</head>
<body>
<div class="header__container">
    <div class="header__blog_name">BlogName</div>
    <div class="header__nav_menu">
        <a href="/" class="header__nav_item">Blog</a>
        <a href="/admin" class="header__nav_item">Administration</a>
    </div>
</div>
<div class="main__container">
    @yield('content')
</div>
</body>
</html>
