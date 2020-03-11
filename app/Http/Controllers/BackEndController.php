<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function dashBoard(){
        return view('backEnd.dashboard.dashboard');
    }
}
