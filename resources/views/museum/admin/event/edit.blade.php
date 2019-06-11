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

        <form method="POST" action="{{route('museum.admin.event.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">

                <div class="col-md-8">
                    @include('museum.admin.event.includes.event_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.event.includes.event_edit_add_col')
                </div>

            </div>
        </form>

        {{--<div class=" image-content">--}}
            {{--@include('museum.admin.post.includes.carousel_with_images')--}}
        {{--</div>--}}



        @if($item->exists)
            <br>
            <form method="POST" action="{{ route('museum.admin.event.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-block admin-theme admin-card-field">
                            <div class="card-body ml-auto">
                                <button type="submit" class="btn btn-dark">Удалить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
        @endif
    </div>

@endsection




<script>

</script>