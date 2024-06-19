@extends('layout')

@section('content')
    <div class="article__page">
        <div class="article__page_main">
            <div class="article__name">{{$article->title}}</div>
            <img src="{{$article->image}}" alt="{{$article->title}}" class="article__photo">
            <div class="article__fulltext">
                {{$article->text}}
            </div>
            <div class="article__date">{{$article->created_at->format('d.m.Y H:i')}}</div>
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
            @foreach($comments as $comment)
                <div class="article__review">
                    <div class="article__review_name">{{$comment->name}}</div>
                    <div class="article__review_text">
                        {{$comment->review}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
