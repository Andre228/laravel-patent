
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{{ asset('css/Museum/Profile/user.css') }}" rel="stylesheet">
</head>



@extends('layouts.app')

@section('content')

<div class="container emp-profile">
    <form method="POST" action="{{route('dashboard.edit', $user['id'])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">

            <div class="col-md-6" style="height: 110px">
                <div class="profile-head">
                    <h5>
                        {{$user['name']}}
                    </h5>
                    <h6 style="margin-top: 20px; margin-bottom: 20px">
                         Ваш профиль
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Информация</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Сохранить"/>
            </div>


            <div class="col-md-4">
                <div class="profile-work">
                    <p>Вы зарегестрированы {{$user['created_at'] ? \Carbon\Carbon::parse($user['created_at'])->format('d.M.Y'):''}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" style="margin-top: 40px">Логин</label>
                            </div>
                            <div class="col-md-6">
                                <p>

                                <div class="page">
                                    <div class="page__demo">
                                        <label class="field a-field a-field_a1 page__field">
                                            <input onfocus="loginUp()" id="login" class="field__input a-field__input" name="name" value="{{old('name',$user['name'])}}" placeholder="Ваш логин"  required>
                                            <span class="a-field__label-wrap">
                                                <span id="login_up" class="a-field__label">Введите ваш логин</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" style="margin-top: 40px">Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>

                                    <label class="field a-field a-field_a3 page__field">
                                        <input onfocus="emailUp()" id="email" name="email" value="{{old('email', $user['email'])}}" class="field__input a-field__input" placeholder="Ваш email" required>
                                        <span class="a-field__label-wrap">
                                            <span id="email_up" class="a-field__label">Email</span>
                                        </span>
                                    </label>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($alias->alias))
            <div class="col-md-4" style="margin-left: 130px">
                <div class="profile-img">
                    <img height="265px" width="350px" src="{{asset('/storage/' . $alias->alias)}}" alt=""/>
                    <div class="file btn btn-lg btn-primary">
                        Изменить
                        <input type="file" name="file"/>
                    </div>
                </div>
            </div>
            @else
                <div class="col-md-4" style="margin-left: 130px">

                    <div class="profile-img">
                        Здесь пока что нет фото :(
                        <div class="file btn btn-lg btn-primary" style="margin-top: 50px">
                                Добавить
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </form>
    @include('museum.admin.post.includes.result_messages')
</div>


@endsection



<script>

function loginUp() {
    var login_up  = document.getElementById('login_up');
    var login  = document.getElementById('login');

    login_up.innerHTML = login.value;
}

function emailUp() {
    var email_up  = document.getElementById('email_up');
    var email  = document.getElementById('email');

    email_up.innerHTML = email.value;
}


</script>