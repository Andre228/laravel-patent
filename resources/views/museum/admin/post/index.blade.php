@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
               <a class="btn btn-dark" href="{{route('museum.admin.posts.create')}}">Создать</a>
            </nav>
            <div class="card admin-card-field">
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
                     <tbody class="admin-table-text">
                     @foreach( $paginator as $post)
                        @php
                           /** @var \App\Models\Post $post*/
                        @endphp
                        <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                           <td> {{ $post->id }} </td>
                           <td> {{ $post->user->name }} </td>
                           <td> {{ $post->category->title }} </td>
                           <td>
                              <a style="color: white" href="{{route('museum.admin.posts.edit',$post->id)}}"> {{$post->title}} </a>
                           </td>
                           <td> {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M.Y H:i'):'' }} </td>
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
               <div class="card admin-count-pages">
                  <div class="card-body">
                     {{ $paginator->links() }}
                  </div>
               </div>
            </div>
         </div>
      @endif
   </div>
@endsection