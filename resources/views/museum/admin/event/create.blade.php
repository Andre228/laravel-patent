<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/Museum/AdminBlocks/blocks.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>





@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Post $item*/ @endphp
    <div class="container">
        @include('museum.admin.event.includes.result_messages')

        <form method="POST" action="{{route('museum.admin.event.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">

                <div class="col-md-8">
                    @include('museum.admin.event.add.event_add_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.event.add.event_add_add_col')
                </div>

            </div>
        </form>

    </div>

@endsection




<script>

</script>