<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/Museum/darth vader.css')}}">




</head>





@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Сброс пароля') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email адрес') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Сбросить пароль') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div id="container">
                <div id="tail"></div>
                <div id="tail-mask"></div>
                <div id="tail-end"></div>

                <div id="body">
                    <div class="ear" id="ear-left">
                        <div class="ear-inner" id="ear-inner-left"></div>
                    </div>
                    <div class="ear" id="ear-right">
                        <div class="ear-inner" id="ear-inner-right"></div>
                    </div>

                    <div id="mask"></div>

                    <div id="patch">
                        <div class="fur"></div>
                        <div class="fur"></div>
                        <div class="fur"></div>
                    </div>

                    <div id="eyes">
                        <div class="eye" id="eye-left">
                            <div class="shine" id="shine-left"></div>
                        </div>
                        <div class="eye" id="eye-right">
                            <div class="shine" id="shine-right"></div>
                        </div>
                    </div>

                    <div id="whisk-left">
                        <div class="whisker" id="whisk-one"></div>
                        <div class="whisker"></div>
                        <div class="whisker" id="whisk-three"></div>
                    </div>

                    <div id="nose"></div>

                    <div id="whisk-right">
                        <div class="whisker" id="whisk-four"></div>
                        <div class="whisker"></div>
                        <div class="whisker" id="whisk-six"></div>
                    </div>

                    <div id="smile">
                        <div id="smile-left-align">
                            <div id="smile-left"></div>
                            <div id="mask-left"></div>
                        </div>

                        <div id="smile-right-align">
                            <div id="smile-right"></div>
                            <div id="mask-right"></div>
                        </div>
                    </div>

                    <div id="tongue"></div>
                    <div id="tummy"></div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
