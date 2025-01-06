@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-primary">Go Back</a>

<h1>{{$post->title}}</h1>
<hr>
<p>{{$post->body}}</p>

@endsection