<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ asset('css/Museum/UsersPostsView/viewposts.css') }}" rel="stylesheet">

</head>


@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <div class="jumbotron bg-dark text-white">
                    <h1>Это статьи.</h1>
                    <p>Здесь представлены все статьи, вы можете зайти, почитать описание и посмотреть картинки.</p>
                    <p class="lead">
                        <a class="btn btn-dark btn-lg" href="#" role="button">Узнать больше</a>
                    </p>
                </div>
                <div class="row">
                @foreach($paginator as $post)

                        @if($post->published_at)
                            <div class="card text-white bg-dark mb-3" style="max-width: 265px; width:265px; margin-left: 15px">
                                <div class="card-header">Дата: {{$post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d.M.Y H:i'):''}}</div>

                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->excerpt}}</p>
                                </div>
                            <p><a class="btn btn-dark" href="#" role="button">Посмотреть детали</a></p>
                            </div>
                        @endif

                @endforeach
                </div>
            </div>

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <div class="list-group">
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                    <a href="#" class="list-group-item bg-dark text-white">Link</a>
                </div>
                <form method="GET" action="{{route('museum.show.count')}}">
                    @csrf
                    <div class="slidecontainer" style="margin: 7px">
                        <input type="range" min="3" max="50" value="9" class="slider" id="myRange" oninput="fun2()">
                        <input id="count" type="text" value="" name="countpaginate" hidden>
                        <p id="two"></p>
                    </div>
                    <button class="btn btn-dark btn-lg" type="submit">Вывести</button>
                </form>
            </div>

            @if($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-content-center" style="margin-left: 1px">
                    <div class="col-md-12">
                        <div class="card bg-dark">
                            <div class="card-body">
                                {{ $paginator->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection

<script>

   function fun2() {
       var slider = document.getElementById("myRange");
       var output = document.getElementById("two");
       var count = document.getElementById("count");
        output.innerHTML = slider.value;
        count.value = slider.value;
    }
</script>