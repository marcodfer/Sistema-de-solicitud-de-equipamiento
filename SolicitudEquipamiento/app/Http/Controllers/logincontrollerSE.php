<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontrollerSE extends Controller
{
    public function layout(Request $Request){
    	return view('layout');
    }

    public function layoutAdm(Request $Request){
    	return view('layoutAdm');
    }

    public function vista(){
    	return view('welcome');
    }
}
