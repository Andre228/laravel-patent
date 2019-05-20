<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>


@extends('layouts.app')

@section('content')


        <div class="container col-md-10 justify-content-center">
            <div class="card mb-3">
                @if(!empty($alias[0]['alias']))
                    <img src="{{ asset('/storage/' . $alias[0]['alias']) }}" class="card-img-top" alt="...">
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