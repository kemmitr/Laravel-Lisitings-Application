<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
//        this variable will return the current users id
    $user_id = auth()->user()->id;
//        Find user id in database, notice how we are using the User model/table object below, to use this we must import this above.
    $user = User::find($user_id);

    return view('dashboard')->with('listings', $user->listings);
}


}
