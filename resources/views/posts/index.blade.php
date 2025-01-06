@extends('layouts.app')

@section('content')

<h1>Posts</h1>
@foreach ($posts as $post)
    <div class="container card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
                <p>{{ $post->body }}</p>
            </li>
        </ul>
    </div>
@endforeach

@endsection