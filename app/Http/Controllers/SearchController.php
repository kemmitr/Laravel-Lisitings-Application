<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index(){
        return view('searchpage');
    }
    public function search(){
       $q = Input::get('q');
       if($q != ''){
           $listing = Listing::where('name', 'LIKE', '%' . $q . '%')->get();
           if(count($listing) > 0){
               return view('searchresult')->with('listing', $listing);
           }
       }
       return "no data found";


    }
}
