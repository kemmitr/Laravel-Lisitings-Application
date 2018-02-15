<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        $bank = Bank::all();
        return view('bank')->with('bank', $bank);;
    }
    public function create(){
            return view('createbank');
    }
    public function store(Request $request){
        $this->validate($request, [
          'title'=> 'required',
            'body' => 'required'
        ]);
        $banks = new Bank;
        $banks->title = $request->input('title');
        $banks->body = $request->input('body');
        $banks->save();
       return redirect('/bank')->with('success', 'success');
    }
    public function show($id)
    {
        $b = Bank::find($id);
        return view('showbank')->with('b', $b);
    }

}
