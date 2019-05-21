<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/Museum/PostsUser/postsuserimages.css') }}" rel="stylesheet">


</head>


@extends('layouts.app')

@section('content')


        <div class="container col-md-10 justify-content-center">
            <div class="card mb-3">
                @if(!empty($alias[0]))

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                            @for($i = 0; $i < count($alias); $i++)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active" style="background-color: #5a6268"></li>
                            @endfor
                        </ol>

                        <div class="carousel-inner gallery3">

                            @if(count($alias) > 0)
                                @for($i = 0; $i < count($alias); $i++)
                                    <div class="carousel-item @if($i == 0) active @endif ramka" >
                                        <img  class="d-block w-100 h-100" src="{{asset('/storage/' . $alias[$i]['alias'])}}" alt="Second slide">
                                    </div>
                                @endfor
                            @endif

                        </div>

                        <a  class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a  class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @else
                    <h3 style="margin-left: 35%; margin-top: 5%"><span class="text-muted">Здесь пока что нет картинок :(</span></h3>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$post['title']}}</h5>
                    <p class="card-text">{{$post['content_raw']}}</p>
                    <p class="card-text"><small class="text-muted">{{$post['updated_at']}}</small></p>
                    @if( Auth::user()->role === 'admin')
                        <small class="text-muted">Так как вы администратор, вы можете прямо сейчас отредактировать запись
                            <a href="{{ route('museum.admin.posts.edit',$post['id'] ) }}">Править</a>
                        </small>
                    @endif
                </div>
            </div>
        </div>


@endsection

<script>


</script>