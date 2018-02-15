<?php

use Illuminate\Http\Request;
use App\Listing;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/checkout/{id}', function ($id){

        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_SQQo6CxhBBhBMJsHSuDfToOm");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
            $listing = Listing::find($id);
// Charge the user's card:
        $charge = \Stripe\Charge::create(array(
            "amount" => $listing->price,
            "currency" => "usd",
            "description" => "Example charge",
            "source" => $token,
        ));
        return redirect('/')->with('success', 'Listing Created successfully');


});