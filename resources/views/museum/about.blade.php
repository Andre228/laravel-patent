<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic|Comfortaa:400,700&subset=latin,cyrillic">


    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>




</head>


@extends('layouts.app')

@section('content')
    <body>
         <h1>Мы открылись</h1>






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


</script>