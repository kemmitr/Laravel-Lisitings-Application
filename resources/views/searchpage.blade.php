@extends('layouts.app')
@section('content')
    <form action="{{URL::to('/search')}}" method="POST" role="search" class="form-group">
        {{ csrf_field() }}
        <input class="form-control" type="text" name="q" placeholder="Search">
<button type="submit" class="btn btn-default">Search</button>
    </form>

    @endsection