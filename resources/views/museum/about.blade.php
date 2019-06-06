<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic|Comfortaa:400,700&subset=latin,cyrillic">


    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Museum/About/about.css')}}">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




</head>


@extends('layouts.app')

@section('content')
    <body class="backgrnd">

         <div class="container">
             <div class="col-md-10 col-md-offset-1">
                 <div class="col-sm-12 col-sm-offset-1 about-card" >
                     <h1>{{ $abouts->bigtitle }}</h1>
                     <div class="media">
                         <div class="media-body">
                             <h5 class="mt-0 mb-1">{{ $abouts->title1 }}</h5>
                             <p>{{ $abouts->description1 }}</p>
                         </div>

                     </div>
                     <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">Бабочка Морфо</button>

                     <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl">
                             <div class="modal-content">
                                 <img src="images/Mofro.jpg" >
                             </div>
                         </div>
                     </div>

                     <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-x2">Волнянка ивовая</button>

                     <div class="modal fade bd-example-modal-x2" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl">
                             <div class="modal-content">
                                 <img src="images/Volnyanka.jpg" >
                             </div>
                         </div>
                     </div>

                     <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-x3">Пестрянка</button>

                     <div class="modal fade bd-example-modal-x3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-xl">
                             <div class="modal-content">
                                 <img src="images/Pestryanka.jpg" >
                             </div>
                         </div>
                     </div>
                     <hr>
                     <br>

                     <h5 class="mt-0 mb-1">{{ $abouts->title2 }}</h5>
                     <p>{{ $abouts->description2 }}</p>
                     <ul>
                         <li> {{ $abouts->feature1 }}</li>
                         <li> {{ $abouts->feature2 }}</li>
                         <li> {{ $abouts->feature3 }}</li>
                     </ul>
                     <br>

                     <p>{{ $abouts->description3 }}</p>

                     @if( Auth::user()->role === 'admin')
                         <small class="text-muted">Так как вы администратор, вы можете прямо сейчас отредактировать запись
                             <a href="{{ route('museum.admin.about.edit',1 ) }}">Править</a>
                         </small>
                     @endif

                 </div>
             </div>
         </div>


    </body>
</html>


@endsection

<script>


</script>