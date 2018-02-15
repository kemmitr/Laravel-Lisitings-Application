@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><a href="/" class="pull-left btn btn-primary btn-xs">Back</a>Edit Listing</div>
                <div class="panel-body">
                    {!! Form::open(['action' => ['ListingsController@update', $listing->id], 'method' => 'POST',  'enctype' => 'multipart/form-data', 'files'=>'true']) !!}
                    {{Form::bsText('name', $listing->name,['placeholder' => 'Company Name'])}}
                    {{Form::bsText('email', $listing->email,['placeholder' => 'Contact Email'])}}
                    {{Form::bsText('website', $listing->website,['placeholder' => 'Contact Email'])}}
                    {{Form::bsText('phone', $listing->phone,['placeholder' => 'Contact Phone'])}}
                    {{Form::bsText('price', $listing->price,['placeholder' => 'price'])}}
                    {{Form::bsText('address', $listing->address,['placeholder' => 'Contact Address'])}}
                    {{Form::bsTextArea('bio', $listing->bio,['placeholder' => 'About the Business'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    <div class="form-group">
                        <label for="pic">Update Image</label>
                        {{Form::file('picture'),['id' => 'pic']}}
                    </div>
                    <div class="form-group">
                        <label for="docufile">Update Associated Documentation</label>
                        {{Form::file('docufile'),['id' => 'docufile']}}
                    </div>
                    <h3 class="text-center">Current Image</h3>
                    <img style="width: 100%" src="/storage/pictures/{{$listing->picture}}">

                    {{Form::bsSubmit('update', ['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>




@endsection