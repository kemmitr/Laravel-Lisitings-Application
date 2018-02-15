@extends('layouts.app')
@section('content')
    <h1>Add Bank Info</h1>
    <form action="/bank" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Title" name="title">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Body" name="body">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@endsection