<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/Museum/AdminBlocks/blocks.css') }}" rel="stylesheet">
</head>



@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Post $item*/ @endphp
    <div class="container">
        @include('museum.admin.post.includes.result_messages')

        <form method="POST" action="{{route('museum.admin.posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('museum.admin.post.includes.edit.post_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.post.includes.edit.post_edit_add_col')
                </div>
                <div class="col-md-8 image-content">
                    {{--@include('museum.admin.post.includes.carousel_with_images')--}}
                </div>
            </div>
        </form>

    </div>

@endsection




<script>

</script>