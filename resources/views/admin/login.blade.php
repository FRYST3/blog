<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/css/admin.css">

    <script src="/assets/js/components/jquery.min.js"></script>
    <script src="/assets/js/admin.js"></script>

    <title>ADMIN || FRYST</title>
</head>
<body>
<div class="header__container">
    <div class="header__blog_name">AdminBlog</div>
    <div class="header__nav_menu">
        <a href="/" class="header__nav_item">Blog</a>
        <a href="/admin" class="header__nav_item">Administration</a>
    </div>
</div>
<div class="main__container">
    <form action="/admin/login" method="POST" class="article__review_new">
        <div class="article__review_input_wr">
            <div class="article__review_input_label">Username</div>
            <input class="article__review_input" type="text" placeholder="Username">
        </div>
        <div class="article__review_input_wr">
            <div class="article__review_input_label">Password</div>
            <input class="article__review_input" type="password" placeholder="Password">
        </div>
        <div class="article__review_addbtn">
            <div class="article__review_btn">Auth</div>
        </div>
    </form>
</div>
</body>
</html>
