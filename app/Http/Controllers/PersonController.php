<?php

namespace App\Http\Controllers;

use App\Tasktwo;
use App\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function name(){

            $task = Tasktwo::selectRaw('select * from listings');

        return view('test')->with('task', $task);
    }
}
