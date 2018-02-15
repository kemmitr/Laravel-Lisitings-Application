@extends('layouts.app')
@section('content')

    <h3 class="text-center">Contact Us!</h3>

    {!! Form::open(['action' => 'ContactController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::text('email','', ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::text('phone','', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>
    <div class="form-group">
        {{Form::textarea('message','', ['class' => 'form-control'])}}
    </div>
    <div >
        {{Form::submit('Submit', ['class' => 'btn btn-success'])}}
    </div>
    {!! Form::close() !!}

    @endsection