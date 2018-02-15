@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">New Listing</div>
                <div class="panel-body">
                    {{--'enctype' => 'multipart/data' will give us a file upload button--}}
                    {!! Form::open(['action' => 'ListingsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>'true']) !!}
                        {{Form::bsText('name', '',['placeholder' => 'Company Name'])}}
                        {{Form::bsText('email', '',['placeholder' => 'Contact Email'])}}
                        {{Form::bsText('website', '',['placeholder' => 'Contact Email'])}}
                        {{Form::bsText('phone', '',['placeholder' => 'Contact Phone'])}}
                        {{Form::bsText('address', '',['placeholder' => 'Contact Address'])}}
                        {{Form::bsText('price', '',['placeholder' => 'Enter Amount you would like to post'])}}
                        {{Form::bsTextArea('bio', '',['placeholder' => 'About the Business'])}}

                        <div class="form-group">
                            <label for="pic">Upload Image</label>
                            {{Form::file('picture'),['id' => 'pic']}}
                        </div>
                    <div class="form-group">
                        <label for="docufile">Upload Associated Documentation</label>
                        {{Form::file('docufile'),['id' => 'docufile']}}
                    </div>




                    <br>
                        {{Form::bsSubmit('submit', ['class' => 'btn btn-success'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>




@endsection