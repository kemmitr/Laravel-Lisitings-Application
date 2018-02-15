@extends('layouts.app')

@section('content')


            <div class="panel panel-default">
                <div class="panel-heading text-center">Latest Listings</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($listings))
                        <div class="row">

                            @foreach($listings as  $listing)
                                        <div class="col-lg-3 col-sm-3">
                                        <img style="height:50px; width: 50px" src="/storage/pictures/{{$listing->picture}}">
                                        </div>
                                    <div class="col-lg-5 col-sm-5">
                                    <h3><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></h3>
                                    </div>
                                <div class="col-lg-4 col-sm-4">
                                    <h3><a href="/listings/{{$listing->id}}">{{$listing->price}}</a></h3>
                                </div>
                            @endforeach

                        </div>

                        @else
                            <p>No Listings Found.</p>
                    @endif

                </div>

            </div>


@endsection
