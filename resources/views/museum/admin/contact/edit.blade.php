<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/Museum/AdminBlocks/blocks.css') }}" rel="stylesheet">
</head>





@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Contact $item*/ @endphp
    <div class="container">
        @include('museum.admin.contact.includes.result_messages')

        <form method="POST" action="{{route('museum.admin.contact.update', 1)}}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">

                <div class="col-md-8">
                    @include('museum.admin.contact.includes.contact_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.contact.includes.contact_edit_add_col')
                </div>

            </div>
        </form>


    </div>

@endsection




<script>

</script>