@extends('layouts.app')
@section('content')

    @foreach($bank as $b)
       <a href="/bank/{{$b->id}}/"><p>{{ $b->body }}</p></a>
    @endforeach
    <a class="btn btn-default" href="/bank/create">Add Data</a>
    @endsection