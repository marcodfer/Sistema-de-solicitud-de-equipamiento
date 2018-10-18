<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ticketSoporte extends Controller
{
    public function detalleS(Request $Request){
    	return view('detalle-soporte');
    }
}
