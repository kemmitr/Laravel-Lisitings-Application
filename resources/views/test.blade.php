@extends('layouts.app')
@section('content')
    @foreach($task as $t)
    <h1 class="text-center">Journal Entry: {{ $t->title}}</h1>
    @endforeach
    @endsection