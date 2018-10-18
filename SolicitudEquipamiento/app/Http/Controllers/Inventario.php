<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventario extends Controller
{
     public function detalleEquipo(Request $Request){
    	return view('detalleEquipo');
    }
}
