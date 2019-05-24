<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic|Comfortaa:400,700&subset=latin,cyrillic">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


</head>


@extends('layouts.app')

@section('content')
    <body>


    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">

                    @php /** @var \Illuminate\Support\ViewErrorBag $errors*/ @endphp
                    @if($errors->any())
                        <div class="row justify-content-center notification-block">
                            <div class="col-md-11">
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="row justify-content-center success-block">
                            <div class="col-md-11">
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                    <div>{{ session()->get('success') }}</div>
                                </div>
                            </div>
                        </div>
                    @endif


                    <form id="contact-form" role="form" action="{{ route('send.issue') }}" method="POST">
                        @csrf

                        <div class="section-title">
                            <h2 style="float: left; font-family: Comfortaa,Didact Gothic;">{{$item->title}} <small style="float: left; font-size: 20.3px">{{$item->subtitle}}</small></h2>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" placeholder="Введите ваш логин" name="name" required="">

                            <input type="email" class="form-control" placeholder="Введите ваш email" name="email" required="">

                            <textarea class="form-control" rows="6" placeholder="Напишите ваше сообщение" name="message" required=""></textarea>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <input type="submit" class="form-control" name="send message" value="Отправить">
                        </div>

                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                        <img src="images/bg_2.jpg" width="650px" height="450px" class="img-responsive" alt="Museum">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer" class="contact-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Наши соц. сети</h2>
                        </div>
                        <address>
                            <p>Вместе с 2019 года,<br> подписывайтесь на нас</p>
                        </address>

                        <ul class="social-icon">
                            <li style="margin-left: 7px"><a class="a-contact" href="{{$item->facebook}}" ><i class="fab fa-facebook-f fa-2x"></i></a></li>
                            <li style="margin-left: 7px"><a class="a-contact" href="{{$item->twitter}}" ><i class="fab fa-twitter fa-2x"></i></a></li>
                            <li style="margin-left: 7px"><a class="a-contact" href="{{$item->instagram}}" ><i class="fab fa-instagram fa-2x"></i></a></li>
                        </ul>

                        <div class="copyright-text">
                            <p>Copyright &copy; 2019 SSAU</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Контактная информация</h2>
                        </div>
                        <address>
                            <p>{{$item->phone1}}, {{$item->phone2}}</p>
                            <p><a class="a-contact" href="mailto:youremail.co">{{$item->email}}</a></p>
                        </address>

                        <div class="footer_menu">
                            <h2>Наши партнеры</h2>
                            <ul>
                                @foreach($partners as $partner)
                                    <li><a class="a-contact" href="{{$partner->link}}">{{ $partner->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="footer-info newsletter-form">
                        <div class="section-title">
                            <h2>Newsletter Signup</h2>
                        </div>
                        <div>
                            <div class="form-group">
                                <form action="{{route('send.issue')}}" method="get">
                                    @csrf
                                    <input type="email" class="form-control" placeholder="Введите ваш email" name="email" id="email" required="">
                                    <input type="submit" class="form-control" name="submit" id="form-submit" value="Подписаться">
                                </form>
                                <span><sup>*</sup> Заполните для получения уведомлений.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>




    <script src="{{asset('js/smoothscroll.js')}}"></script>


    </body>
</html>


@endsection

<script>



    $(document).ready(function () {
        $('.success-block').fadeIn(2000).fadeOut(2000, function(){$(this).remove()});
    });


</script>