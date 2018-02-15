@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><a href="/" class="pull-left btn btn-primary btn-xs">Back</a>{{$listing->name}} Listing</div>
                <div class="panel-body">
                   <ul class="list-group">
                       <li class="list-group-item ">Name: {{$listing->name}}</li>
                       <li class="list-group-item">Email: {{$listing->email}}</li>
                       <li class="list-group-item ">Website: {{$listing->website}}</li>
                       <li class="list-group-item ">Address: {{$listing->address}}</li>
                       <li class="list-group-item ">Phone: {{$listing->phone}}</li>
                       <li class="list-group-item ">Bio: {{$listing->bio}}</li>
                       <li class="list-group-item ">Price: {{$listing->price}}</li>
                   </ul>
                    <a href="/storage/documentation/{{$listing->docufile}}" download="{{$listing->docufile}}" class="downloadIt"><button class="pull-left">Download Docs</button></a>

                    <a href="/payment/{{$listing->id}}"><button class="pull-right btn btn-success">Purchase</button></a>

                    <img src="/storage/pictures/{{$listing->picture}}" class="img-responsive" style="width: 100%">

                </div>
            </div>
        </div>
    </div>




@endsection