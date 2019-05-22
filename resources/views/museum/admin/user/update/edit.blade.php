<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/Museum/AdminBlocks/blocks.css') }}" rel="stylesheet">
</head>





@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Post $item*/ @endphp
    <div class="container">
        @include('museum.admin.user.includes.result_messages')

        <form method="POST" action="{{ route('museum.admin.users.destroy', $item->id) }}" style="margin-bottom: 10px; margin-left: 50px">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-dark">Удалить</button>
        </form>

        <form method="POST" action="{{route('museum.admin.users.update', $item->id)}}">
            @method('PUT')
            @csrf
            <div class="row justify-content-center">

                <div class="col-md-8">
                    @include('museum.admin.user.includes.edit.user_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.user.includes.edit.user_edit_add_col')
                </div>

            </div>
        </form>

    </div>

@endsection




<script>

</script>