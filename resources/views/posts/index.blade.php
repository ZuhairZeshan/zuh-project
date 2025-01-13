@extends('layouts.app')

@section('content')

<h1>Posts</h1>

<!-- Display success message -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Display error message -->
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@foreach ($posts as $post)
    <div class="container card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="/posts/{{$post->id}}">{{ $post->title }}</a>
                <p>{{ $post->body }}</p>
                <!-- Edit button -->
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>

                <!-- Delete button -->
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>

            </li>
        </ul>
    </div>
@endforeach

@endsection