<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ asset('css/Museum/UsersPostsView/viewposts.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic|Comfortaa:400,700&subset=latin,cyrillic">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/smoothscroll.js')}}"></script>


</head>


@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
            <div class="row">
                @foreach($paginator as $tour)
                    <a class="tour-card-link" href="{{route('museum.tours.show', $tour->id)}}">
                        <div class="card mb-3 example-shadow-3" style="max-width: 265px; height: 150px; width:265px; margin-left: 15px">
                                <div class="row no-gutters">
                                    <div class="col-md-4" style=" padding-top: 25px; padding-left: 30px">
                                        <i class="fas fa-atlas fa-4x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$tour->title}}</h5>
                                            <p class="card-text">{{$tour->topic}}</p>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                @if(( \Carbon\Carbon::parse($tour->start_date)->format('Y-m-d') < \Carbon\Carbon::now()->format('Y-m-d'))
                                                   && \Carbon\Carbon::parse($tour->end_date)->format('Y-m-d') > \Carbon\Carbon::now()->format('Y-m-d'))
                                                        Текущая
                                                    @else
                                                        Прошедшая, ожидаемая
                                                    @endif
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>



        <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
            <div class="list-group">
                <form method="GET" action="{{route('museum.tours.old')}}">
                    <button type="submit" class="btn btn-light text-center" style="width: 250px">Прошедшие</button>
                    <input id="countOld" type="text" value="31" name="countpaginate" hidden>
                </form>
                <form method="GET" action="{{route('museum.tours.current')}}">
                    <button type="submit" class="btn btn-light text-center" style="width: 250px">Текущие</button>
                    <input id="countCurrent" type="text" value="31" name="countpaginate" hidden>
                </form>
                <form method="GET" action="{{route('museum.tours.future')}}">
                    <button type="submit" class="btn btn-light text-center" style="width: 250px">Ожидаемые</button>
                    <input id="countFuture" type="text" value="31" name="countpaginate" hidden>
                </form>
            </div>
            <form method="GET" action="{{route('museum.tours.count')}}">
                @csrf
                <div class="slidecontainer" style="margin: 7px">
                    <input type="range" min="3" max="50" value="9" class="slider" id="myRange" oninput="fun2()">
                    <input  id="count" type="text" value="31" name="countpaginate" hidden>
                    <p id="two"></p>
                </div>
                <input style="margin-top: 10px; margin-bottom: 10px" name="search" class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-dark btn-lg" type="submit">Вывести</button>
            </form>
        </div>
    </div>

    @if($paginator->total() > $paginator->count())
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif



</div>

@endsection
</html>


<script>

    function fun2() {
        var slider = document.getElementById("myRange");
        var output = document.getElementById("two");
        var count = document.getElementById("count");
        var countOld = document.getElementById("countOld");
        var countCurrent = document.getElementById("countCurrent");
        var countFuture = document.getElementById("countFuture");
        countFuture.value = slider.value;
        countOld.value = slider.value;
        countCurrent.value = slider.value;
        output.innerHTML = slider.value;
        count.value = slider.value;
    }

</script>


<style>

    .tour-card-link {
        color: #5a6268;
        list-style: none;
        line-height: 1;
        display: inline-block;
        text-decoration:none;
        cursor: pointer;
    }

    .tour-card-link:hover {
        list-style: none;
        line-height: 1;
        display: inline-block;
        text-decoration:none;
        cursor: pointer;
        color: #a0a2a5;
    }

    .example-shadow-3:hover {
        transition: 0.3s;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        padding: 10px;
        width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


</style>