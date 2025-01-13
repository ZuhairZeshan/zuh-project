@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-primary">Go Back</a>

<h1>{{$post->title}}</h1>
<hr>
<p>{{$post->body}}</p>
<hr>
<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
    <i class="bi bi-pencil"></i> Edit
</a>
@endsection