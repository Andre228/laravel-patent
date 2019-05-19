<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;*/
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="{{asset('js/app.js')}}" defer></script>
        <link href="{{ asset('css/Museum/Welcome/welcomeposts.css') }}" rel="stylesheet">
    </head>
    <body>

    @extends('layouts.app')

    @section('content')

            <div class="content col-md-12 justify-content-center">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                   @if(Auth::check())
                        <a href="/museum/posts">Экспонаты</a>
                   @endif
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>

                </div>

                <div class="col">
                    @for($i = 0; $i < count($listwelcomeposts); $i++)
                    <div  class="row welcome-posts justify-content-center">
                        <div class="col-md-5 text-pull-right">
                           <a href="#" style="color: white">
                                <h2 class="title-welcome">{{$listwelcomeposts[$i]['title']}}
                                    {{--<span class="text-muted">It'll blow your mind.</span>--}}
                                </h2>
                           </a>
                            <p class="lead excerpt-animation ">{{$listwelcomeposts[$i]['excerpt']}}</p>
                        </div>
                        @if(!empty($aliasfiltred[$i]['alias']))
                            <div class="col-md-5">
                                <img  class="image-welcome-right"  width="400px" height="300px" src="{{asset('/storage/' . $aliasfiltred[$i]['alias'])}}" alt="500x500">
                            </div>

                        @else
                            <div class="col-md-5" style="font-size: 30px">
                                <span class="text-muted"> Здесь нет картинок :( </span>
                            </div>
                        @endif
                    </div>
                        <hr class="col-md-10">

                <?php $i++ ?>
                    <div  class="row justify-content-center welcome-posts ">
                        @if(!empty($aliasfiltred[$i]['alias']))
                            <div class="col-md-5">
                                <img class="image-welcome-left"  width="400px" height="300px" src="{{asset('/storage/' . $aliasfiltred[$i]['alias'])}}" alt="500x500">
                            </div>

                        @else
                            <div class="col-md-5" style="font-size: 30px">
                               <span class="text-muted"> Здесь нет картинок :( </span>
                            </div>
                        @endif
                        <div class="col-md-5 text-pull-left block-image-left ">
                            <a href="#" style="color: white">
                                <h2 class="title-welcome">{{$listwelcomeposts[$i]['title']}}
                                    {{--<span class="text-muted">It'll blow your mind.</span>--}}
                                </h2>
                            </a>
                            <p class="lead excerpt">{{$listwelcomeposts[$i]['excerpt']}}</p>
                        </div>
                    </div>
                        <hr class="col-md-10">
                    @endfor


                    <footer class="col-md-10">
                        <p class="pull-right">
                            <a href="#">Наверх</a>
                        </p>

                        <p class="pull-left">
                            © 2019 Company, Inc. ·
                            <a href="#">Privacy</a>
                            ·
                            <a href="#">Terms</a>
                        </p>
                    </footer>
                </div>
            </div>


    @endsection
    </body>
</html>


<script>


</script>
