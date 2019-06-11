<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>





@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">

            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
               <a class="btn btn-dark" href="{{route('museum.admin.posts.create')}}">Добавить</a>
               <input  id="checkbox" type="checkbox"  onchange="changeText()">
               <label class="deftext" style="margin-right: 850px; margin-top: 7px">Изменить тему</label>
            </nav>
            <div class="card admin-theme admin-card-field">
               <div class="card-body">
                  <table class="table table-hover">
                     <thead>
                     <tr>
                        <th>ID</th>
                        <th>Автор</th>
                        <th>Категория</th>
                        <th>Заголовок</th>
                        <th>Дата публикации</th>
                     </tr>
                     </thead>
                     <tbody class=" admin-theme admin-table-text">
                     @foreach( $paginator as $post)
                        @php
                           /** @var \App\Models\Post $post*/
                        @endphp
                        <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                           <td> {{ $post->id }} </td>
                           <td> {{ $post->user->name }} </td>
                           <td> {{ $post->category->title }} </td>
                           <td>
                              <a class="link-title" style="" href="{{route('museum.admin.posts.edit',$post->id)}}"> {{$post->title}}</a>
                           </td>
                           <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M.Y H:i'):'' }}</td>
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot></tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
      @if($paginator->total() > $paginator->count())
         <br>
         <div class="row justify-content-center">
            <div class="col-md-12">
               <div id="count-pages" class="card">
                  <div class="card-body">
                     {{ $paginator->links() }}
                  </div>
               </div>
            </div>
         </div>
      @endif
   </div>
@endsection


<script>

    var checkbox = $("#checkbox");

    $(document).ready(function(){
        checkbox =  !$("#checkbox").prop('checked', true);
        setCheckbox();
    });

    function changeText() {
        setCheckbox();
    }

    function setCheckbox() {
        if(checkbox) {
            $('.admin-theme').addClass('admin-card-field');
            $('.admin-theme').addClass('admin-table-text');
            $('#count-pages').css({'background-color':'#5a6268'});
            $('.link-title').css({'color':'white'});
        }
        else {
            $('.admin-theme').removeClass('admin-card-field');
            $('.admin-theme').removeClass('admin-table-text');
            $('#count-pages').css({'background-color':'white'});
            $('.link-title').css({'color':'black'});
        }
        checkbox = !checkbox;
    }

</script>