@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($listings))
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($listings as  $listing)
                                <tr>
                                    <td>{{$listing->name}}</td>
                                    <td><a class="btn btn-default btn-xs" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                        </table>


                        @endif

                </div>
                <div>
                <a class="btn btn-primary pull-left btn-xs" href="listings/create">Add Listing</a>
                </div>
            </div>
        </div>
    </div>

@endsection
