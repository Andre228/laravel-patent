@extends('layouts.app')

@section('content')
        @foreach($posts as $post)


            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$post->created_at}}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->excerpt}}</p>
                </div>
            </div>

        @endforeach
@endsection