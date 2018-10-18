<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ticket extends Controller
{
    public function detalle(Request $Request){
    	return view('detalle');
    }
}
