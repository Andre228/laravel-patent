@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                </nav>
                <div class="card admin-card-field">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Логин</th>
                                <th>Email</th>
                                <th>Дата регистрации</th>
                            </tr>
                            </thead>
                            <tbody class="admin-table-text">
                            @foreach( $users as $user)
                                @php
                                    /** @var \App\User $user*/
                                @endphp
                                @if($user->role == 'user')
                                    <tr  >
                                        <td> {{ $user->id }} </td>
                                        <td> {{ $user->name }} </td>
                                        <td>
                                            <a style="color: white" href="{{route('museum.admin.users.edit',$user->id)}}"> {{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d.M.Y H:i'):'' }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($users->total() > $users->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card admin-count-pages">
                        <div class="card-body">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection