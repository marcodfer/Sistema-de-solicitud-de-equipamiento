<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class layoutA extends Controller
{
    public function inicio(Request $Request){
    	return view('layout');
    }

    public function ticket(Request $Request){
    	return view('ticket');
    }
}
