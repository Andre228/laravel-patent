
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>



@extends('layouts.app')

@section('content')


<div class="container text-center">
    <h2>Подтвердить регистрацию</h2>
    <form method="POST" action="{{route('send.confirmation.email',$user)}}">
        @csrf
        <input type="hidden" value="{{ $user->email }}" name="email">
        <input type="submit"  class="btn btn-dark" value="Отправить">
    </form>
</div>

@endsection



<script>


</script>