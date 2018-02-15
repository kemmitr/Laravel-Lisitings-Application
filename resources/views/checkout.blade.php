@extends('layouts.app')
@section('content')
    <form action="/api/checkout/{{$listing->id}}" method="post" id="payment-form">
        <div class="form-row">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
                <input>
            </div>

            <!-- Used to display Element errors -->
            <div id="card-errors" role="alert"></div>
        </div>
        <div>

            <p class="text-center">Total: {{ $listing->price }}</p>

        </div>

        <button>Submit Payment</button>
    </form>
    @endsection