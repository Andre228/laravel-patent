@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                  <a class="btn btn-dark" href="{{route('museum.admin.categories.create')}}">Добавить</a>
              </nav>
              <div class="card admin-card-field">
                  <div class="card-body">
                      <table class="table table-hover">
                          <thead>
                            <tr>
                                <th>ID</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                          </thead>
                          <tbody class="admin-table-text">
                                @foreach($paginator as $item)
                                    @php /** @var \App\Models\Category $item*/ @endphp
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td class="admin-table-text">
                                            <a style="color: white" href="{{route('museum.admin.categories.edit', $item->id)}}">
                                                {{$item->title}}
                                            </a>
                                        </td>
                                        <td @if(in_array($item->parent_id, [0,1])) style="color:#ccc" @endif>
                                            {{$item->parent_id}}  {{-- {{$item->parentCategory->title}} --}}
                                        </td>
                                    </tr>
                                @endforeach
                          </tbody>
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
                            {{$paginator->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
  </div>
@endsection