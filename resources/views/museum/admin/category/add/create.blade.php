<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Category $item*/ @endphp
    <form method="POST" action="{{ route('museum.admin.categories.store') }}">
        @csrf
        <div class="container">
            @php /** @var \Illuminate\Support\ViewErrorBag $errors*/ @endphp
            @if($errors->any())
                <div class="row justify-content-center notification-block">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" onclick="deleteErrorsBlock()">x</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="row justify-content-center notification-block">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" onclick="deleteErrorsBlock()">x</span>
                            </button>
                            <div>{{ session()->get('success') }}</div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('museum.admin.category.includes.add.item_add_main_col')
                </div>
                <div class="col-md-3">
                    @include('museum.admin.category.includes.add.item_add_sub_col')
                </div>
            </div>
        </div>
    </form>
@endsection




<script>

    function deleteErrorsBlock() {
        $("div.notification-block").remove();
    }

</script>