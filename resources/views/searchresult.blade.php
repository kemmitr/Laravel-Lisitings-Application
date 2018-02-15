@extends('layouts.app')
@section('content')
    @foreach($listing as $list)
        <a href="/listings/{{$list->id}}">{{ $list->address }}</a>
    @endforeach
@endsection