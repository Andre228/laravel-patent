<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/Museum/AdminBlocks/blocks.css') }}" rel="stylesheet">
</head>



@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Post $item*/ @endphp
    <div class="container">
        @include('museum.admin.partner.includes.result_messages')

        <form method="POST" action="{{route('museum.admin.partners.store')}}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('museum.admin.partner.includes.partner_edit_main_col')
                </div>

                <div class="col-md-3">
                    @include('museum.admin.partner.includes.partner_edit_add_col')
                </div>

            </div>
        </form>

    </div>

@endsection




<script>

</script>