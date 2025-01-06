@extends('layouts.app')

@section('content')
    <h1>Contacts Page</h1>
    <p>This is Contact Page</p>

    @if(count($services) > 0)
        <ul>
            @foreach($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif

@endsection