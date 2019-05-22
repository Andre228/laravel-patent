@extends('layouts.app')

@section('content')
    <div class="container">
        @include('museum.admin.partner.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-dark" href="{{route('museum.admin.partners.create')}}">Добавить</a>
                </nav>
                <div class="card admin-card-field">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Ссылка</th>
                                <th>Дата создания</th>
                            </tr>
                            </thead>
                            <tbody class="admin-table-text">
                            @foreach( $paginator as $partner)

                                <tr>
                                    <td> {{ $partner->id }} </td>
                                    <td> {{ $partner->name }} </td>
                                    <td>
                                        <a style="color: white" href="{{route('museum.admin.partners.edit',$partner->id)}}"> {{ $partner->link }}</a>
                                    </td>
                                    <td>{{ $partner->created_at ? \Carbon\Carbon::parse($partner->created_at)->format('d.M.Y H:i'):'' }}</td>
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