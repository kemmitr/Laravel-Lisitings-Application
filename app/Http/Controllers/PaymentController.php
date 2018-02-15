<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function purchase($id)
    {
        $listing = Listing::find($id);

        return view('checkout')->with('listing', $listing);

    }


}

