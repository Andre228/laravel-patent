<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="{{asset('css/Museum/tour/tour.css')}}">


</head>


@extends('layouts.app')

@section('content')



    <body class="backgrnd">


    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-sm-12 col-sm-offset-1 about-card" >
                <h1>{{  $item->title }} <span class="badge badge-secondary"></span></h1>
                <div class="media">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{  $item->topic }}</h5>
                    </div>
                </div>

                <div class="accordion" id="accordionExample">

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                   Что вас ждёт?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                {{$item->description}}
                            </div>
                            <hr>
                            <h5 style="margin-left: 25px"> Цена руб. - <span class="badge badge-primary">{{$item->cost}}</span></h5>
                            <div class="row">
                                <h4 style="margin-left: 40px"> Дата начала - <span class="badge badge-secondary">{{$item->start_date}}</span></h4>
                                <h4 style="margin-left: 40px"> Дата конца - <span class="badge badge-secondary">{{$item->end_date}}</span></h4>
                            </div>
                            <div class="divider"></div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>



    </body>


@endsection
</html>





