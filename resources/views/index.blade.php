@extends('layout')

@section('content')
    <div class="main__cards">
        @foreach($articles as $article)
            <a href="/article" class="articles__card">
                <img src="{{$article->image}}" alt="{{$article->title}}" class="article__img">
                <div class="article__created">{{$article->created_at->format('d.m.Y H:i')}}</div>
                <div class="article__title">{{$article->title}}</div>
                <div class="article__description">
                    {{$article->description}}
                </div>
            </a>
        @endforeach
    </div>
@endsection
