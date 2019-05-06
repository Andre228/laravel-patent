@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\Category $item*/ @endphp
    <form method="POST" action="{{ route('museum.admin.categories.edit', $item->id) }}">
        @method('PATCH')
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('museum.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('museum.admin.category.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection