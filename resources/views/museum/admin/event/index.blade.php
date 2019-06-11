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
                    <a class="btn btn-dark" href="{{route('museum.admin.event.create')}}">Добавить</a>
                    <input  id="checkbox" type="checkbox"  onchange="changeText()">
                    <label class="deftext" style="margin-right: 850px; margin-top: 7px">Изменить тему</label>
                </nav>
                <div class="card admin-theme admin-card-field">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Дата начала</th>
                                <th>Дата окончания</th>
                            </tr>
                            </thead>
                            <tbody class=" admin-theme admin-table-text">
                            @foreach($paginator as $item)
                                @php /** @var \App\Models\Category $item*/ @endphp
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td class= "admin-table-text">
                                        <a class="link-title" href="{{route('museum.admin.event.edit',$item->id)}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td @if(( \Carbon\Carbon::parse($item->start_date) > \Carbon\Carbon::now() && $item->end_date == null) || \Carbon\Carbon::parse($item->end_date) < \Carbon\Carbon::now()  ) style="color:#ccc" @endif>
                                        {{ $item->start_date ? \Carbon\Carbon::parse($item->start_date)->format('d.M.Y H:i'):'' }}
                                    </td>

                                    @if( $item->end_date != null )
                                        <td @if(\Carbon\Carbon::parse($item->end_date) < \Carbon\Carbon::now() ) style="color:#ccc"   @endif>
                                            {{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('d.M.Y H:i'):'-' }}
                                        </td>
                                    @endif
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
                    <div class="card admin-theme admin-count-pages">
                        <div class="card-body">
                            {{$paginator->links()}}
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