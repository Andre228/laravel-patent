<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

</head>





@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Post $item*/ @endphp
    <div class="container">
        @include('museum.admin.post.includes.result_messages')

        <form method="POST" action="{{route('museum.admin.posts.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('museum.admin.post.includes.edit.post_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.post.includes.edit.post_edit_add_col')
                </div>
                <div class="col-md-10">
                    @include('museum.admin.post.includes.carousel_with_images')
                </div>
            </div>
        </form>

        @if($item->exists)
            <br>
            <form method="POST" action="{{ route('museum.admin.posts.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-block admin-card-field">
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