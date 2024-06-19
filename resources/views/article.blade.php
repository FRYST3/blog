@extends('layout')

@section('content')
    <div class="article__page">
        <div class="article__page_main">
            <div class="article__name">Grid system for better Design User Interface</div>
            <img src="/assets/images/articles/article.png" class="article__photo">
            <div class="article__fulltext">
                A grid system is a design tool used to arrange content on a webpage. It is a series of vertical and horizontal lines that create a matrix of intersecting points, which can be used to align and organize page elements. Grid systems are used to create a consistent look and feel across a website, and can help to make the layout more visually appealing and easier to navigate.
                <br>
                If you’ve been to New York City and have walked the streets, it is easy to figure out how to get from one place to another because of the grid system that the city is built on. Just as the predictability of a city grid helps locals and tourists get around easily, so do webpage grids provide a structure that guides users and designers alike. Because of their consistent reference point, grids improve page readability and scannability and allow people to quickly get where they need to go.
            </div>
            <div class="article__date">Sunday , 1 Jan 2023</div>
        </div>
        <div class="article__reviews">
            <div class="article__review_new">
                <div class="article__review_input_wr">
                    <div class="article__review_input_label">Username</div>
                    <input class="article__review_input" type="text" placeholder="Enter username">
                </div>
                <div class="article__review_input_wr">
                    <div class="article__review_input_label">Feedback</div>
                    <textarea class="article__review_input feedback" placeholder="Enter feedback"></textarea>
                </div>
                <div class="article__review_addbtn">
                    <div class="article__review_btn">Send</div>
                </div>
            </div>
            <div class="article__review">
                <div class="article__review_name">FRYST</div>
                <div class="article__review_text">
                    A grid system is a design tool used to arrange content on a webpage. It is a series of vertical and horizontal lines that create a matrix of intersecting points, which can be used to align and organize page elements.
                </div>
            </div>
        </div>
    </div>
@endsection
